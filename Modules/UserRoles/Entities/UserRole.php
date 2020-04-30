<?php

namespace Modules\UserRoles\Entities;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['user_id','role_id'];
}
