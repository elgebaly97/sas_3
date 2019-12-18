<?php

namespace App\Http\Controllers\Api;

use App\Models\Assignment;
use App\Models\Department;
use App\Models\Event;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Result;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Table;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    private function apiResponse($status, $message, $data=null){
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data

        ];
        return response()->json($response);
    }

    // ************* API For Students ******************

    public function students(){
        $students = Student::all();
        return $this->apiResponse(1, '', $students);
    }

    public function subjects(Request $request){
        //$subjects = Subject::all();
        //return $this->apiResponse(1, '', $subjects);
        $subjects = Subject::where(function($query) use($request){
            if(($request->has('department_id')) and ($request->has('grade_id'))){
                $query->where('department_id', $request->department_id)->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $subjects);
    }

    public function assignments(Request $request){
        $assignments = Assignment::where(function($query) use($request){
            if($request->has('subject_id')){
                $query->where('subject_id', $request->subject_id);
            }
            else if(($request->has('department_id')) and ($request->has('grade_id'))){
                $query->where('department_id', $request->department_id)->where('grade_id', $request->grade_id);
            }
        })->get()->load('professor','subject','grade.departments');

        return $this->apiResponse(1, '', $assignments);
    }

    public function sources(Request $request){
        $sources = Source::where(function($query) use($request){
            if($request->has('subject_id')){
                $query->where('subject_id', $request->subject_id);
            }
        })->get()->load('professor','subject','subject.grade.departments');

        return $this->apiResponse(1, '', $sources);
    }

    public function marks(Request $request){
        $mark = Mark::where(function($query) use($request){
            if(($request->has('subject_id')) and ($request->has('student_id'))){
                $query->where('subject_id', $request->subject_id)->where('student_id', $request->student_id);
            }
        })->get()->load('subject');

        return $this->apiResponse(1, '', $mark);
    }


    public function events(Request $request){
        $event = Event::where(function($query) use($request){
            if($request->has('department_id')){
                $query->where('department_id', $request->department_id);
            }
        })->get();
        return $this->apiResponse(1, '', $event);
    }

    public function tables(Request $request){
        $table = Table::where(function($query) use($request){
            if($request->has('grade_id')){
                $query->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $table);
    }

    public function result(Request $request){
        $result = Department::where('id', $request->id)->with(['grades.subjects.results' => function($query) use($request){
            if($request->has('student_id')){
                $query->where('student_id', $request->student_id);
            }
        }])->get();
        return $this->apiResponse(1, '', $result);
    }


    public function grade(Request $request){
        $grade = Grade::with(['subjects.results' => function($query) use($request){
            $query->where('student_id', $request->student_id);
        }])->get();
        return $this->apiResponse(1, '', $grade);
    }




    // ********************* API For Professors *********************

    public function addSource(Request $request){
        $validator = validator()->make($request->all(), [
            'department_id' => 'required',
            //'grade_id' => 'required',
            'subject_id' => 'required',
            'title' => 'required',
            'path' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $newSource = $request->user()->sources()->create($request->all());
        return $this->apiResponse(1, 'Done', $newSource);
    }

    // Api for Dropdown List

    public function departments(){
        $departmnets = Department::all();
        return $this->apiResponse(1, '', $departmnets);
    }

    public function grades(){
        $grades = Grade::all();
        return $this->apiResponse(1, '', $grades);
    }

    public function addAssignment(Request $request){
        $validator = validator()->make($request->all(), [
            'department_id' => 'required',
            'grade_id' => 'required',
            'subject_id' => 'required',
            'title' => 'required',
            'path' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $newAssignment = $request->user()->assignments()->create($request->all());
        return $this->apiResponse(1, '', $newAssignment);
    }

    public function studentsGrade(Request $request){
        $students = Student::where(function($query) use($request){
            if($request->has('grade_id')){
                $query->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $students);
    }

    public function addMarks(Request $request){
        $validator = validator()->make($request->all(), [
            'student_id' => 'required',
            'subject_id' => 'required',
            'attendance' => 'required',
            'work' => 'required',
            'midterm' => 'required',
            'semester' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $newMark = Mark::create($request->all());
        return $this->apiResponse(1, '', $newMark);
    }

}
