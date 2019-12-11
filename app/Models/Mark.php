<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model 
{

    protected $table = 'marks';
    public $timestamps = true;
    protected $fillable = array('subject_id', 'attendance','work', 'midterm', 'semester','student_id');

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

}