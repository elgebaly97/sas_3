<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{

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

    public function result()
    {
        return $this->hasOne('App\Models\Result');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
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

}