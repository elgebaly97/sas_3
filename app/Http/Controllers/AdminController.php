<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['only' => 'index', 'edit']);
    }

    public function index(){
        return view('admin.dashboard');
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


}
