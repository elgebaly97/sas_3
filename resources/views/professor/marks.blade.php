@extends('professor.layouts.layout')

@section('content')

    <form class="view-std" method="post" action="students-marks">
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

            <select name="subject_id" class="form-control">
                <option style="color: #ced4da;" value="0" {{ old('subject_id', request('subject_id')) == 0 ? 'selected' : '' }}>Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{$subject->id}}" {{ old('subject_id', request('subject_id')) == $subject->id ? 'selected' : '' }}>{{$subject->name}}</option>
                @endforeach
            </select>


            <input type="submit" class="btn btn-lg form-control" value="View Students">


        </div>

    </form>


    <div class="col-sm-push-2 col-xs-8">

            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Attendance</th>
                    <th>Work</th>
                    <th>Midterm</th>
                    <th>Semester</th>
                    <th>Save</th>
                    <th>Edit</th>
                </tr>

                </thead>
                <tbody>
                @foreach($students as $student)
                    {{--{{dd($student->marks()->where('subject_id',request('subject_id'))->first()->work)}}--}}
                    <tr>
                        <form method="post" action="mark">
                            @csrf
                        <input type="hidden" name="student_id" value="{{$student->id}}" />
                        <input type="hidden" name="subject_id" value="{{request('subject_id')}}" />
                        <td>{{$student->name}}</td>
                        <td><input class="form-control" type="text" name="attendance" value="{{old('attendance')}}" style="background: none; width: 50px; height: 30px;"></td>
                        <td><input class="form-control" type="text" name="work" value="{{old('work')}}" style="background: none; width: 50px; height: 30px;"></td>
                        <td><input class="form-control" type="text" name="midterm" value="{{old('midterm')}}" style="background: none; width: 50px; height: 30px;"></td>
                        <td><input class="form-control" type="text" name="semester" value="{{old('semester')}}" style="background: none; width: 50px; height: 30px;"></td>
                        {{--<td><input class="form-control" type="number" name="attendance" value="{{old('attendance')}}"></td>--}}
                        <td><input type="submit" class="btn btn-primary" value="Save"></td>
                        <td><a class="btn btn-info">Edit</a></td>
                        </form>
                    </tr>


                @endforeach
                </tbody>
            </table>


    </div>


@endsection
