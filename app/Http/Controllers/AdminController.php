<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['only' => 'index', 'edit']);
    }

    public function index(){
        $admin = Auth::user();
        return view('admin.dashboard', compact('admin'));
        //dd($admin);
    }

    public function create(){
        return view('admin.auth.register');
    }

    public function store(Request $request){
        // Validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // Store in Database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = bcrypt($request->password);

        $admins->save();

        return redirect()->route('admin.auth.login');


    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function delete($id){

    }


    public function viewStudents(){
        $studentss = Student::all()->where('department_id', request('department_id'));
        $students = $studentss->where('grade_id', request('grade_id'));
        return view('admin/viewstudents', compact('students'));
        //dd($students);
    }

    public function viewProfessors(){
        $professors = Professor::all()->where('department_id', request('department_id'));
        return view('admin/viewprofessors', compact('professors'));
        //dd($students);
    }

    public function viewEvents(){
        $events = Event::all()->where('department_id', request('department_id'));
        return view('admin/viewevents', compact('events'));

    }


    public function addStudent(){
        return view('admin/addstudent');
    }

    public function storeStudent(){
        $password = Hash::make(request('password'));
        $validator = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'faculty' => 'required',
            'national_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'grade_id' => 'required',
        ]);

        $validator['password'] = $password;
        //'api_token' => Str::random(60),
        $validator['api_token'] = Str::random(60);

        Student::create($validator);

        return redirect('admin/view-students');
    }


    public function addprofessor(){
        return view('admin/addprofessor');
    }

    public function storeProfessor(){
        $password = Hash::make(request('password'));
        $validator = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'faculty' => 'required',
            'national_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'grade_id' => 'required',
        ]);

        $validator['password'] = $password;
        $validator['api_token'] = Str::random(60);

        Professor::create($validator);

        return redirect('admin/view-professors');
    }



    public function addEvent(){
        return view('admin/addevent');
    }

    public function storeEvent(){
        $validator = request()->validate([
            'title' => 'required',
            'department_id' => 'required',
            'day' => 'required',
            'owner' => 'required',
            'image' => 'required'
        ]);

        Event::create($validator);

        return redirect('admin/view-events');
    }


}
