<?php

namespace App\Http\Resources\v1\booking;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookingCollection extends Resource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
