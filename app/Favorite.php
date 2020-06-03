<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    public $timestamps = true;
    protected $fillable = array('student_id', 'post_id', 'favorite');

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
