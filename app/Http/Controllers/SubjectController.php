<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Group;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student/subject');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subjected = Subject::find($id);
        $marks = Auth::user()->marks->where('subject_id', $subjected->id);
        return view('student/subject', compact('subjected', 'marks'));
        //$marks = Auth::user()->marks->where('subject_id', $subject->id);
        //return $mark;


    }

    public function subjectProf($id)
    {
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        $subjected = Subject::find($id);
        $students = Student::where('department_id', $subjected->department_id)->where('grade_id', $subjected->grade_id)->get();
        //dd($students);
        return view('professor/subject', compact('subjected','groups','subjects','students'));
        //$marks = Auth::user()->marks->where('subject_id', $subject->id);
        //return $mark;


    }

    public function addAssignment($id){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        return view('professor/assignment', compact('groups', 'subjects'));
    }

    public function storeAssignment($id){
        $assignment = request()->validate([
            'title' => 'required',
            'path' => 'required',
        ]);
        $assignment['professor_id'] = auth()->user()->id;
        $subjected = Subject::find($id);
        $assignment['grade_id'] = $subjected->grade->id;
        $assignment['subject_id'] = $subjected->id;

        //::create($validator);
        Assignment::create($assignment);
        return redirect()->route('professor.subject', $subjected);
    }

    public function addSource($id){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        return view('professor/source', compact('groups', 'subjects'));
    }

    public function storeSource($id){
        $source = request()->validate([
            'title' => 'required',
            'path' => 'required',
        ]);
        $source['professor_id'] = auth()->user()->id;
        $subjected = Subject::find($id);
        $source['grade_id'] = $subjected->grade->id;
        $source['subject_id'] = $subjected->id;

        //::create($validator);
        Source::create($source);
        return redirect()->route('professor.subject', $subjected);
    }

    public function addMark($id){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        $subjected = Subject::find($id);
        $students = Student::where('department_id', $subjected->department_id)->where('grade_id', $subjected->grade_id)->get();
        return view('professor/mark', compact('groups', 'subjects','students'));
    }

    public function storeMark($id){
        $mark = request()->validate([
            'attendance' => 'required',
            'work' => 'required',
            'midterm' => 'required',
            'semester' => 'required',
        ]);
        $subjected = Subject::find($id);
        $mark['student_id'] = request('student_id');
        $mark['subject_id'] = $subjected->id;

        //::create($validator);
        Mark::create($mark);
        return redirect()->route('professor.subject', $subjected);
        //return 'done';
    }

    public function editMark($id){
        $groups = Group::all()->where('department_id', auth()->user()->department_id);
        $subjects = Subject::all()->where('professor_id', auth()->user()->id);
        //$subjected = Subject::find($id);
        $mark = Mark::find($id);
        return view('professor/editmark', compact('mark', 'groups', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
