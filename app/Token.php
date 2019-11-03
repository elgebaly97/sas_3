<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    //
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function professor()
    {
        return $this->belongsTo('App\Models\Professor');
    }
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
