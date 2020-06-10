<?php

namespace App\Model\v1\role;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name'
    ];

    public function users()
    {
        $this->hasMany('App\User');
    }

    public function permissions()
    {
        $this->hasMany('App\Model\v1\permission\Permission');
    }
}
