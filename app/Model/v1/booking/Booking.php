<?php

namespace App\Model\v1\booking;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'start_date','end_date','trucks_id'
    ];
}
