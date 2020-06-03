<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table = 'students';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'national_id','address','image','score','api_token', 'faculty_id', 'department_id', 'grade_id', 'group_id');

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }


    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function tokens()
    {
        return $this->hasMany('App\Token');
    }

    public function marks()
    {
        return $this->hasMany('App\Models\Mark');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\CommentReply');
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.Student.'.$this->id;
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

}
