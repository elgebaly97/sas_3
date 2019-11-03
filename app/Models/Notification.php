<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'assignment_id', 'result_id', 'content', 'post_id', 'mark_id');

    public function assignment()
    {
        return $this->belongsTo('App\Models\Assignment');
    }

    public function result()
    {
        return $this->belongsTo('App\Models\Result');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function mark()
    {
        return $this->belongsTo('App\Models\Mark');
    }

}