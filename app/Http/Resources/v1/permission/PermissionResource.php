<?php

namespace App\Http\Resources\v1\permission;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
