<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentGrade extends Model 
{

    protected $table = 'department_grade';
    public $timestamps = true;
    protected $fillable = array('department_id', 'grade_id');

}