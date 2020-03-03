<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Professor;

class AssignmentController extends Controller
{
    public function index(){
        $assignments = Assignment::all()->where('grade_id', Auth::user()->grade->id)->load('subject','professor');
        //dd($assignments);
        return view('student/assignments', compact('assignments'));
    }
}
