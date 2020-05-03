<?php

namespace Modules\UserRoles\Entities;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['user_id','role_id'];

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }
}
