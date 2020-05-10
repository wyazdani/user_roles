<?php

namespace Modules\UserRoles\Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\UserRoles\Entities\UserRole;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user   =   User::find(1);
        if (!$user){
            $user =  User::create([
                 'name' =>  'admin',
                'email' =>  'admin@admin.com',
                'password'  =>  Hash::make('12345678'),
                'role_id'   =>  1
            ]);
            UserRole::create([
                'role_id'   =>  1,
                'user_id'   =>  $user->id
            ]);

        }
    }
}
