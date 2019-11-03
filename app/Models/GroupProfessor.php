<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupProfessor extends Model 
{

    protected $table = 'group_professor';
    public $timestamps = true;
    protected $fillable = array('professor_id', 'group_id');

}