<?php

namespace Modules\UserRoles\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\UserRoles\Entities\Permission;
use Modules\UserRoles\Entities\Role;
use Modules\UserRoles\Entities\RolePermission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $roles  =   ['admin','manager'];
        foreach ($roles as $role)
        {
            $check_role =   Role::where('name',$role)->first();
            if (!$check_role){
                $check_role = Role::create([
                    'name'  =>  $role,
                    'description'   =>  $role
                ]);
            }
            if ($check_role->name=='admin'){
                $permissions    =   Permission::get();
                foreach ($permissions as   $permission){
                    $permission_data        =   RolePermission::where('role_id','=',$check_role->id)
                        ->where('permission_id','=',$permission->id)->first();

                    if ($permission_data){
                        $permission_data->update([
                            'role_id'   =>  $check_role->id,
                            'permission_id' =>  $permission->id
                        ]);
                    }
                    else
                    {
                        RolePermission::create([
                            'role_id'    =>  $check_role->id,
                            'permission_id'  =>  $permission->id
                        ]);
                    }

                }
            }
        }
    }
}
