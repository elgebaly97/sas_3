<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{

    protected $table = 'professors';
    public $timestamps = true;
    protected $fillable = array('name', 'email','password', 'national_id', 'faculty_id', 'department_id', 'grade_id', 'api_token');

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group');
    }

    public function tokens()
    {
        return $this->hasMany('App\Token');
    }

    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    public function sources()
    {
        return $this->hasMany('App\Models\Source');
    }

    public function offices()
    {
        return $this->hasMany('App\Models\Office');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Projects');
    }

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

}