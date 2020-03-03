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

    /*public function store(Request $request)
    {
        $events = new Appsetting();

        $events->title = $request->input('title');
        $events->description = $request->input('day');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/appsetting/', $filename);

//see above line.. path is set.(uploads/appsetting/..)->which goes to public->then create
//a folder->upload and appsetting, and it wil store the images in your file.

            $events->image = $filename;
        } else {
            return $request;
            $events->image = '';
        }
        $events->save();

        return redirect('pagesurl')->with('success', 'App Setting Added');
    }*/
}
