<?php

namespace App\Http\Resources\v1\truck;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TruckCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
