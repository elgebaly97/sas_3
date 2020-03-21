<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function search(){
        $q = Input::get('q');
        $student = Student::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        //$msg = 'No Details found. Try to search again !';
        //$professor = Professor::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        //dd($student);
        if(count($student) > 0)
            return view ('search')->withDetails($student)->withQuery($q);
        else
            return view('search')->withMessage('No Details found. Try to search again !');

        //dd($professors);
        /*if(count($professor) > 0)
            return view ('search')->withDetails($professor)->withQuery($q);
        else
            return view('search')->withMessage('No Details found. Try to search again !');*/
    }

    /*public function search(){
        $q = Input::get('q');
        $students = Student::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        $msg = 'No Details found. Try to search again !';
        //dd($student);
        if(count($students) > 0)
            return view ('search',compact('students'));//->withDetails($student)->withQuery($q);
        else
            return view('search')->withMessage('No Details found. Try to search again !');
    }*/


    public function searchProf(){
        $q = Input::get('q');
        $professor = Professor::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        //dd($student);
        if(count($professor) > 0)
            return view ('searchprof')->withDetails($professor)->withQuery($q);
        else
            return view('searchprof')->withMessage('No Details found. Try to search again !');
    }
}
