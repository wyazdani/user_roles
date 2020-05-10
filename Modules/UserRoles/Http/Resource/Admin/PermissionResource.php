<?php

namespace Modules\UserRoles\Http\Resource\Admin;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
