@extends('admin.layouts.layout')

@section('content')

    {{--

    <div class="container">
        <form method="post" action="view-professors">
            @csrf

            <div class="form-group">
                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;" value="0" {{ old('department_id', request('department_id')) == 0 ? 'selected' : '' }}>Department</option>
                    <option value="1" {{ old('department_id', request('department_id')) == 1 ? 'selected' : '' }}>Communications</option>
                    <option value="2" {{ old('department_id', request('department_id')) == 2 ? 'selected' : '' }}>Electrical</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">View Professors</button>
        </form>
    </div>

    <div class="container">
        @foreach($professors as $professor)

            <h3>{{$professor->name}}</h3>
            <h6>{{$professor->email}}</h6>


        @endforeach
    </div>
    --}}


    <!--form section-->
    <form class="view-std" method="post" action="view-professors">
        @csrf

        <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

            <select name="department_id" class="form-control">
                <option style="color: #ced4da;" value="0" {{ old('department_id', request('department_id')) == 0 ? 'selected' : '' }}>Department</option>
                <option value="1" {{ old('department_id', request('department_id')) == 1 ? 'selected' : '' }}>Communications</option>
                <option value="2" {{ old('department_id', request('department_id')) == 2 ? 'selected' : '' }}>Electrical</option>
            </select>

            <button type="submit" class="btn btn-warning">View Professors</button>


        </div>

    </form>


    <div class="col-sm-push-2 col-xs-8">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>ID</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            </thead>
            <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td>{{$professor->name}}</td>
                    <td>{{$professor->email}}</td>
                    <td>{{$professor->faculty_id}}</td>
                    <td>{{$professor->address}}</td>
                    <td><a class="btn btn-info">Edit</a></td>
                    <td><a class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>













@endsection