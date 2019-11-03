<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model 
{

    protected $table = 'marks';
    public $timestamps = true;
    protected $fillable = array('subject_id', 'attendance', 'midterm', 'semester');

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}