<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeTerm extends Model
{
    protected $table = 'grade_term';
    public $timestamps = true;
    protected $fillable = array('term_id', 'grade_id');

}
