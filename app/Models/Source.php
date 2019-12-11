<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';
    public $timestamps = true;
    protected $fillable = array('professor_id', 'grade_id', 'subject_id','title', 'path');

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }
}
