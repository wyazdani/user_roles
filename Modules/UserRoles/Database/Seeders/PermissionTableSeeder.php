<?php

namespace Modules\UserRoles\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
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
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $keys => $route) {
            if (search_auth($route->action['middleware'], 'auth')) {
                if (!empty($route->getName())) {
                    $permission = Permission::where('name', '=', $route->getName())->first();
                    if ($permission) {
                        $permission->update(['name' => $route->getName()]);
                    } else {
                        Permission::create([
                            'name' => $route->getName(),
                            'for' => $route->getName(),
                        ]);
                    }
                }
            }
        }
    }
}
