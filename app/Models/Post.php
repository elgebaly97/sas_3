<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('student_id', 'professor_id', 'title', 'body');

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}