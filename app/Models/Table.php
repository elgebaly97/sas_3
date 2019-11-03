<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model 
{

    protected $table = 'tables';
    public $timestamps = true;
    protected $fillable = array('image', 'grade_id');

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

}