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

        return $this->checkPermission($user,9);

    }

    public function update(User $user){

        return $this->checkPermission($user,10);

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
