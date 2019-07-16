<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['dept'];

    public function department()
    {
        return $this->belongsToMany('App\User');
    }
}
