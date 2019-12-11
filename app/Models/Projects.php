<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    public $timestamps = true;
    protected $fillable = array('name', 'category', 'year', 'professor_id');


    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }
}
