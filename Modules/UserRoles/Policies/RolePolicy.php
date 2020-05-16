<?php

namespace Modules\UserRoles\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user){

        return $this->checkPermission($user,'roles.create');

    }

    public function index(User $user){

        return $this->checkPermission($user,'roles.index');

    }
    
    public function update(User $user){

        return $this->checkPermission($user,'roles.edit');

    }

    protected function checkPermission($user,$name){
        foreach ($user->role->permissions as $permission)
        {
            if($permission->name == $name)
            {

                return true;
            }
        }
        return false;
    }
}
