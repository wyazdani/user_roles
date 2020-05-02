<?php

namespace Modules\UserRoles\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\UserRoles\Entities\Role;

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
                Role::create([
                    'name'  =>  $role,
                    'description'   =>  $role
                ]);
            }
        }
    }
}
