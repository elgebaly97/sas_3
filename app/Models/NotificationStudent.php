<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationStudent extends Model 
{

    protected $table = 'notification_student';
    public $timestamps = true;
    protected $fillable = array('notification_id', 'student_id');

}