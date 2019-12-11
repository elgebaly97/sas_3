<?php

namespace App\Http\Controllers\Api;

//use App\Mail\ResetPassword;
use App\Token;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Professor;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    private function apiResponse($status, $message, $data=null){
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data

        ];
        return response()->json($response);
    }


    // Register For Student //

    public function registerStudent(Request $request){
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:students',
            'national_id' => 'required',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);

        $student = Student::create($request->all());
        $student->api_token = Str::random(60);
        $student->save();
        return $this->apiResponse(1, 'تم الاضافه بنجاح', [
            'api_token' => $student->api_token,
            'student' => $student
        ]);
    }



    // Login For Student //

    public function loginStudent(Request $request){
        $validator = validator()->make($request->all(),[

            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $student = Student::where('email', $request->email)->first();

        if($student){
            if(Hash::check($request->password, $student->password)){
                return $this->apiResponse(1, 'Login Successfuly', [
                    'api_token' => $student->api_token,
                    'student' => $student
                ]);
            } else{
                return $this->apiResponse(2, 'Login Failed');
            }
        }
        return $this->apiResponse(2, 'Login Failed');
    }



    // Register For Professor //

    public function registerProfessor(Request $request){
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:professors',
            'national_id' => 'required',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);

        $professor = Professor::create($request->all());
        $professor->api_token = Str::random(60);
        $professor->save();
        return $this->apiResponse(1, 'تم الاضافه بنجاح', [
            'api_token' => $professor->api_token,
            'professor' => $professor
        ]);
    }



    // Login For Professor //

    public function loginProfessor(Request $request){
        $validator = validator()->make($request->all(),[

            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $professor = Professor::where('email', $request->email)->first();

        if($professor){
            if(Hash::check($request->password, $professor->password)){
                return $this->apiResponse(1, 'Login Successfuly', [
                    'api_token' => $professor->api_token,
                    'professor' => $professor
                ]);
            } else{
                return $this->apiResponse(2, 'Login Failed');
            }
        }
        return $this->apiResponse(2, 'Login Failed');
    }


    public function profileStudent(Request $request){
        $student = $request->user();

        return $this->apiResponse(1, '', $student);
    }

    public function profileProfessor(Request $request){
        $professor = $request->user()->load('department','offices','projects');

        return $this->apiResponse(1, '', $professor);
    }





}
