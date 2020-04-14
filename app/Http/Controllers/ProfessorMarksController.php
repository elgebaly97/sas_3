<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorMarksController extends Controller
{
    public function index(Group $group){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        $studentss = Student::all()->where('department_id', request('department_id'));
        $students = $studentss->where('grade_id', request('grade_id'));
        //where('professor_id', auth()->user()->id)->
        return view('professor.marks', compact('groups','subjects','students'));

    }

    public function viewStudents(Group $group){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        $studentss = Student::all()->where('department_id', request('department_id'));
        $students = $studentss->where('grade_id', request('grade_id'));
        //$subject =
        //$markss = $students->mark;
        //$marks = $markss->where('subject_id',request('subject_id'));
        return view('professor.marks', compact('students','groups','subjects'));
        //dd($students);
    }

    public function saveMarks(){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        $studentss = Student::all()->where('department_id', request('department_id'));
        $students = $studentss->where('grade_id', request('grade_id'));
        $validator = request()->validate([
            'attendance' => 'required',
            'work' => 'required',
            'midterm' => 'required',
            'semester' => 'required',
        ]);
        $validator['student_id'] = request('student_id');
        $validator['subject_id'] = request('subject_id');
        Mark::create($validator);

        return view('professor.marks', compact('groups','subjects','students'));
    }
}
