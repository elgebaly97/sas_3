@extends('admin.layouts.app')

@section('content')



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














@endsection