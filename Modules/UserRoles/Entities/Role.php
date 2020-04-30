<?php

namespace Modules\UserRoles\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description'];
}
