<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Group;
use App\Models\Post;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorGroupController extends Controller
{
    public function show(Group $group){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        $posts = Post::orderBy('created_at', 'desc')->get()->where('group_id', $group->id);
        $comments = Comment::all()->load('student');
        //dd($comments);
        return view('./professor/group', compact('posts', 'comments','groups','subjects'));
    }
}
