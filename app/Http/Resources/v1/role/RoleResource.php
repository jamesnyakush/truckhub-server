<?php

namespace App\Http\Resources\v1\role;

use App\Http\Resources\v1\permission\PermissionResource;
use App\Http\Resources\v1\user\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'role_id' => $this->id,
            'role_name' => $this->role_name,
            'users' => UserResource::collection($this->users),
            // 'permissions' => PermissionResource::collection($this->permissions)
        ];
    }
}
