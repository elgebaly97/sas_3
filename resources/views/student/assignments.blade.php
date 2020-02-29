@extends('student.layouts.layout')

@section('content')

    <h1>Assignments</h1>


    @foreach($assignments as $assignment)

        <h3>{{$assignment->title}}</h3>
        <a>{{$assignment->path}}</a>



    @endforeach



@endsection