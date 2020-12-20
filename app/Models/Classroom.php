<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{

    protected $guarded = ['id'];

    public function teacher()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\User','classroom_students');
    }
}
