<?php

namespace App\Model\v1\permission;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function role()
    {
        $this->belongsToMany('App\Model\v1\permission\Permission');
    }
}
