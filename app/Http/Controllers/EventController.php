<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class EventController extends Controller
{
    public function index(){
        $events = Event::all()->where('department_id', Auth::user()->department->id);
        return view('student.events', compact('events'));

    }
}
