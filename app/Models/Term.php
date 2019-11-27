<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';
    public $timestamps = true;
    protected $fillable = array('name');

    public function grades(){
        return $this->belongsToMany('App\Models\Grade');
    }

    public function subjects(){
        return $this->hasMany('App\Models\Subject');
    }
}
