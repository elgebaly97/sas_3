<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Group extends Model 
{
    use Notifiable;

    protected $table = 'groups';
    public $timestamps = true;
    protected $fillable = array('name', 'grade_id');

    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function professors()
    {
        return $this->belongsToMany('App\Models\Professor');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

}