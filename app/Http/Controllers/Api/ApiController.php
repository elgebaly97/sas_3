<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
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
}
