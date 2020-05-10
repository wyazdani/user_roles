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

        return $this->checkPermission($user,1);

    }

    public function update(User $user){

        return $this->checkPermission($user,7);

    }

    public function dashboard(User $user){

        return $this->checkPermission($user,11);

    }
    protected function checkPermission($user,$p_id){

        foreach ($user->allroles as $role)
        {

            foreach ($role->permissions as $permission)
            {
                if($permission->id == $p_id)
                {

                    return true;
                }
            }
        }
        return false;
    }
}
