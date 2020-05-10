<?php

namespace Modules\UserRoles\Entities;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table    =   'permission_role';
    protected $fillable = ['role_id','permission_id'];
}
