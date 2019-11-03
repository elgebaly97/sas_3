<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model 
{

    protected $table = 'assignments';
    public $timestamps = true;
    protected $fillable = array('professor_id', 'grade_id');

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

}