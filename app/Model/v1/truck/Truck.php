<?php

namespace App\Model\v1\truck;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{

    protected $fillable = [
      'manufacturer','fuel','capacity','tonnage','price','transmission'
    ];
}
