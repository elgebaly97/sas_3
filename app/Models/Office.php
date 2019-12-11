<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'offices';
    public $timestamps = true;
    protected $fillable = array('day', 'hours', 'professor_id');


    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }
}
