@extends('admin.layouts.layout')

@section('content')


{{--
    <div class="container">
        <form method="post" action="view-students">
            @csrf

            <div class="form-group">
                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;" value="0" {{ old('department_id', request('department_id')) == 0 ? 'selected' : '' }}>Department</option>
                    <option value="1" {{ old('department_id', request('department_id')) == 1 ? 'selected' : '' }}>Communications</option>
                    <option value="2" {{ old('department_id', request('department_id')) == 2 ? 'selected' : '' }}>Electrical</option>
                </select>
            </div>

            <div class="form-group">
                <select name="grade_id" class="form-control">
                    <option style="color: #ced4da;" value="0" {{ old('grade_id', request('grade_id')) == 0 ? 'selected' : '' }}>Grade</option>
                    <option value="1" {{ old('grade_id', request('grade_id')) == 1 ? 'selected' : '' }}>First</option>
                    <option value="2" {{ old('grade_id', request('grade_id')) == 2 ? 'selected' : '' }}>Second</option>
                    <option value="3" {{ old('grade_id', request('grade_id')) == 3 ? 'selected' : '' }}>Third</option>
                    <option value="4" {{ old('grade_id', request('grade_id')) == 4 ? 'selected' : '' }}>Fourth</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">View Students</button>
        </form>
    </div>


    <div class="container">
        @foreach($students as $student)

            <h3>{{$student->name}}</h3>
            <h6>{{$student->email}}</h6>


        @endforeach
    </div>

--}}

<!--form section-->
<form class="view-std" method="post" action="view-students">
    @csrf

    <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

        <select name="department_id" class="form-control">
            <option style="color: #ced4da;" value="0" {{ old('department_id', request('department_id')) == 0 ? 'selected' : '' }}>Department</option>
            <option value="1" {{ old('department_id', request('department_id')) == 1 ? 'selected' : '' }}>Communications</option>
            <option value="2" {{ old('department_id', request('department_id')) == 2 ? 'selected' : '' }}>Electrical</option>
        </select>

        <select name="grade_id" class="form-control">
            <option style="color: #ced4da;" value="0" {{ old('grade_id', request('grade_id')) == 0 ? 'selected' : '' }}>Grade</option>
            <option value="1" {{ old('grade_id', request('grade_id')) == 1 ? 'selected' : '' }}>First</option>
            <option value="2" {{ old('grade_id', request('grade_id')) == 2 ? 'selected' : '' }}>Second</option>
            <option value="3" {{ old('grade_id', request('grade_id')) == 3 ? 'selected' : '' }}>Third</option>
            <option value="4" {{ old('grade_id', request('grade_id')) == 4 ? 'selected' : '' }}>Fourth</option>
        </select>


        <input type="submit" class="btn btn-lg form-control" value="View Students">


    </div>

</form>


<div class="col-sm-push-2 col-xs-8">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>ID</th>
            <th>Score</th>
            <th>Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->faculty_id}}</td>
            <td>{{$student->score}}</td>
            <td>{{$student->address}}</td>
            <td><a class="btn btn-info">Edit</a></td>
            <td><a class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>












@endsection