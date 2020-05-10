<?php

namespace Modules\UserRoles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserRoles\Entities\Permission;
use Modules\UserRoles\Http\Requests\PermissionRequest;


class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $permissions  =   Permission::paginate(20);
        return view('userroles::permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('userroles::permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param PermissionRequest $request
     * @return Response
     */
    public function store(PermissionRequest $request)
    {

        Permission::create([
            'name'  =>  $request->name,
            'for'   =>  $request->for
        ]);

        return redirect()->route('permissions.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('userroles::permissions.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $permission   = Permission::find(decrypt($id));
        return view('userroles::permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     * @param PermissionRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $role   =   Permission::find($id);
        $role->update([
            'name'  =>  $request->name,
            'for'   =>  $request->for
        ]);
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
