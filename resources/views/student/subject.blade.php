@extends('student.layouts.layout')



@section('content')

    <h1>{{$subject->name}}</h1>



    <h2>Assignments</h2>

    <ul>
        @foreach($subject->assignments as $assignment)
            <li>{{$assignment->title}}</li>

        @endforeach
    </ul>

    <h2>Sources</h2>

    <ul>
        @foreach($subject->sources as $source)
            <li>{{$source->title}}</li>

        @endforeach
    </ul>

    <h2>Year Work</h2>

    <table>
        <tr>
            <th>Attendance</th>
            <th>Work</th>
            <th>Midterm</th>
            <th>Semester</th>
        </tr>
        <tr>

            @foreach($marks as $mark)

                <td>{{$mark->attendance}}</td>
                <td>{{$mark->work}}</td>
                <td>{{$mark->midterm}}</td>
                <td>{{$mark->semester}}</td>



            @endforeach


        </tr>
    </table>













@endsection