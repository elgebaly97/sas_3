<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model 
{

    protected $table = 'grades';
    public $timestamps = true;
    protected $fillable = array('name');

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function departments()
    {
        return $this->belongsToMany('App\Models\Department');
    }

    public function table()
    {
        return $this->hasOne('App\Models\Table');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }


    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    public function terms()
    {
        return $this->belongsToMany('App\Models\Term');
    }
}