@extends('professor.layouts.layout')

@section('content')
    <form class="view-std" action="mark" method="post">
        @csrf

        <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

            <select name="student_id" class="form-control">
                <option style="color: #ced4da;" value="0" {{ old('student_id', request('student_id')) == 0 ? 'selected' : '' }}>Student</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}" {{ old('student_id', request('student_id')) == $student->id ? 'selected' : '' }}>{{$student->name}}</option>
                @endforeach
            </select>

            <input required type="text" class="form-control" name="attendance" placeholder="Attendance">

            <input required type="text" class="form-control" name="work" placeholder="Work">

            <input required type="text" class="form-control" name="midterm" placeholder="Midterm">

            <input required type="text" class="form-control" name="semester" placeholder="Semester">

            <input type="submit" class="btn btn-lg form-control" value="Add">
        </div>

    </form>

@endsection
