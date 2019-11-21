<?php

namespace App\Http\Controllers\Api;

use App\Models\Assignment;
use App\Models\Mark;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
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

    public function students(){
        $students = Student::all();
        return $this->apiResponse(1, '', $students);
    }

    public function subjects(Request $request){
        //$subjects = Subject::all();
        //return $this->apiResponse(1, '', $subjects);
        $subjects = Subject::where(function($query) use($request){
            if($request->has('grade_id')){
                $query->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $subjects);
    }

    public function assignments(Request $request){
        $assignments = Assignment::where(function($query) use($request){
            if($request->has('subject_id')){
                $query->where('subject_id', $request->subject_id);
            }
        })->get();

        return $this->apiResponse(1, '', $assignments);
    }

    public function sources(Request $request){
        $sources = Source::where(function($query) use($request){
            if($request->has('subject_id')){
                $query->where('subject_id', $request->subject_id);
            }
        })->get();

        return $this->apiResponse(1, '', $sources);
    }

    public function marks(Request $request){
        $mark = Mark::where(function($query) use($request){
            if(($request->has('subject_id')) and ($request->has('student_id'))){
                $query->where('subject_id', $request->subject_id)->where('student_id', $request->student_id);
            }
        })->get();

        return $this->apiResponse(1, '', $mark);
    }
}
