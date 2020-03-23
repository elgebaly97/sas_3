<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model 
{

    protected $table = 'comment_replies';
    public $timestamps = true;
    protected $fillable = array('comment_id', 'body', 'email','student_id');

    public function comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

}