<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model 
{

    protected $table = 'departments';
    public $timestamps = true;
    protected $fillable = array('name');

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function grades()
    {
        return $this->belongsToMany('App\Models\Grade');
    }

    public function professors()
    {
        return $this->hasMany('App\Models\Professor');
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

}