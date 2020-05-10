<?php

namespace Modules\UserRoles\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

        return $this->checkPermission($user,'users.create');

    }
    public function index(User $user){

        return $this->checkPermission($user,'users.index');

    }

    public function update(User $user){

        return $this->checkPermission($user,'users.update');

    }

    public function edit(User $user){
        return $this->checkPermission($user,'users.edit');
    }

    public function dashboard(User $user){

        return $this->checkPermission($user,'dashboard.index');

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
