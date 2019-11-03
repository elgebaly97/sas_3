<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model 
{

    protected $table = 'conversations';
    public $timestamps = true;
    protected $fillable = array('student_id', 'professor_id', 'group_id', 'message');

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

}