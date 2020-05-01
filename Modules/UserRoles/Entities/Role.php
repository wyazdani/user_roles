<?php

namespace Modules\UserRoles\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','description'];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
