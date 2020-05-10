<?php

namespace Modules\UserRoles\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\UserRoles\Entities\Role;
use Modules\UserRoles\Entities\UserRole;
use Modules\UserRoles\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users  =   User::paginate(20);
        return view('userroles::users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->can('users.create')) {
            $roles  =   Role::get();
            return view('userroles::users.create',compact('roles'));
        }
        return redirect('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  Hash::make($request->password),
            'role_id'   =>  !empty($request->roles)?$request->roles[0]:2
        ]);

        foreach ($request->roles as $role){
            UserRole::create([
               'user_id'    =>  $user->id,
               'role_id'    =>  $role
            ]);
        }

        return redirect()->route('users.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('userroles::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('users.update')) {
            $user = User::find(decrypt($id));
            $roles = Role::get();
            return view('userroles::users.edit', compact('user', 'roles'));
        }
            return  redirect('dashboard');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {

        $user   =   User::find($id);
        $user->update([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  Hash::make($request->password),
            'role_id'   =>  !empty($request->roles)?$request->roles[0]:2
        ]);
        $userroles  = UserRole::where('user_id',$user->id)->get();
        foreach ($userroles as $role_id){
            $role_id->delete();
        }
        foreach ($request->roles as $role){
            UserRole::create([
                'user_id'    =>  $user->id,
                'role_id'    =>  $role
            ]);
        }

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
