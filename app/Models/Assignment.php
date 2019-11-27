<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model 
{

    protected $table = 'assignments';
    public $timestamps = true;
    protected $fillable = array('professor_id', 'grade_id', 'subject_id');

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

}