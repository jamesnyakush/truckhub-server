<?php

namespace App\Model\v1\role;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions()
    {
        $this->belongsToMany('App\Model\v1\permission\Permission');
    }
}
