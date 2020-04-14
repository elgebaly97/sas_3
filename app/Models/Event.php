<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    public $timestamps = true;
    protected $fillable = array('title', 'department_id', 'day', 'image','owner');

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
