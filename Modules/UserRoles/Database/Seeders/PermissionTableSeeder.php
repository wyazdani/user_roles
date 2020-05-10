<?php

namespace Modules\UserRoles\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\UserRoles\Entities\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $permissions = [
         [
        'id' => '1',
        'name' =>'user_create',
        'for' => 'user'
         ],
         [
             'id' => '2',
             'name' =>'user_delete',
             'for' => 'user'
         ],
         [
             'id' => '3',
             'name' =>'post_create',
             'for' => 'post'
         ],
         [
             'id' => '4',
             'name' =>'post_delete',
             'for' => 'post'
         ],
         [
             'id' => '5',
             'name' =>'tags_crud',
             'for' => 'other'
         ],
         [
             'id' => '6',
             'name' =>'category_crud',
             'for' => 'other'
         ],
         [
            'id' => '7',
            'name' =>'user_edit',
            'for' => 'user'
        ],
         [
             'id' => '8',
             'name' =>'post_edit',
             'for' => 'post'
         ],

        [
            'id' => '9',
            'name' =>'role_create',
            'for' => 'role'
        ],
        [
            'id' => '10',
            'name' =>'role_edit',
            'for' => 'role'
        ],
         [
             'id' => '11',
             'name' =>'dashboard',
             'for' => 'user'
         ],
        [
        'id' => '12',
        'name' =>'role_delete',
        'for' => 'role'
        ],

    ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }
        // $this->call("OthersTableSeeder");
    }
}
