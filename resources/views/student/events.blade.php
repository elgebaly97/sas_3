@extends('student.layouts.layout')

@section('content')

    <h1>Events</h1>


    @foreach($events as $event)

        <h2>{{$event->title}}</h2>
        <p>{{$event->image}}</p>
        <p>{{$event->day}}</p>




    @endforeach






@endsection