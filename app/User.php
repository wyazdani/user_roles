<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\UserRoles\Entities\Permission;
use Modules\UserRoles\Entities\Role;
use Modules\UserRoles\Entities\UserRole;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function allroles()
    {
        return $this->hasManyThrough(Role::class,UserRole::class,'role_id','id','id','id');
    }
    public function user_roles()
    {
        return $this->hasMany(UserRole::class);
    }
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();


        if($this->have_role->name == 'Root') {
            return true;
        }

        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }
    private function getUserRole()
    {
        return $this->role()->getResults();
    }
    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
    }
    public function hasAnyRole($roles)
    {
        $this->have_roles = $this->getUserRoles();


        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasAnyRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasAnyRole($roles);
        }
        return false;
    }
    private function getUserRoles()
    {
        /*return $this->role()->getResults();*/
        return $this->allroles()->getResults();
    }

    private function checkIfUserHasAnyRole($need_role)
    {
        foreach ($this->have_roles as $have_role){

            return (strtolower($need_role)==strtolower($have_role->name)) ? true : false;
        }

    }

    public function hasPermission($roles,$routeName)
    {
        $this->have_role = $this->getUserRole();

        if($this->have_role->name == 'Root') {
            return true;
        }
        foreach ($this->have_role->permissions as $permission_key=>$permission){
            if ($permission->name ==$routeName){
                return [
                    'success'       =>  true,
                    'role'          =>  $this->have_role,
                    'permission'    =>  $permission,
                    'routeName'     =>  $routeName
                ];
            }
        }
        $permission =   Permission::where('name','=',$routeName)->first();
        return [
            'success'       =>  false,
            'role'          =>  $this->have_role,
            'permission'    =>  $permission,
            'routeName'     =>  $routeName
        ];
        return false;
    }


}
