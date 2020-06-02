<?php

namespace App\Http\Resources\v1\user;

use App\Http\Resources\v1\role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'email'   => $this->email,
            'roles'   => RoleResource::collection($this->role)

        ];
    }
}
