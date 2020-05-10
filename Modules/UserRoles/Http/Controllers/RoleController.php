<?php

namespace Modules\UserRoles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserRoles\Entities\Permission;
use Modules\UserRoles\Entities\Role;
use Modules\UserRoles\Entities\RolePermission;
use Modules\UserRoles\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $roles  =   Role::paginate(20);
        return view('userroles::roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('userroles::roles.create')->with(compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
      $role =  Role::create([
            'name'  =>  $request->name,
            'description'   =>  $request->description
        ]);
        /*$role->permissions()->sync($request->permission);*/

        return redirect()->route('roles.index');
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
        $role   =   Role::find(decrypt($id));
        $permissions = Permission::get();
        return view('userroles::roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param RoleRequest $request
     * @param int $id
     * @return Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role   =   Role::find($id);
        $role->update([
            'name'  =>  $request->name,
            'description'   =>  $request->description
        ]);
        $role->permissions()->sync($request->permission);

        return redirect()->route('roles.index');
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
