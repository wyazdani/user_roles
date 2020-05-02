<?php


namespace Modules\UserRoles\Helper;


class HasRole
{
    public static function hasrole($role)
    {
        dd(auth()->user()->hasRole($role));

    }
}
