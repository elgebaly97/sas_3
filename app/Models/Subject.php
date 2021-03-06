<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model 
{

    protected $table = 'subjects';
    public $timestamps = true;
    protected $fillable = array('name', 'grade_id', 'subject_id','term_id','department_id');

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function mark()
    {
        return $this->hasOne('App\Models\Mark');
    }


    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    public function sources()
    {
        return $this->hasMany('App\Models\Source');
    }

    public function term()
    {
        return $this->belongsTo('App\Models\Term');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}