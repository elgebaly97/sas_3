<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model 
{

    protected $table = 'results';
    public $timestamps = true;
    protected $fillable = array('image', 'student_id', 'subject_id');

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

}