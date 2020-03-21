@extends('student.layouts.layout')



@section('content')

    {{--

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

--}}



    <!-- start sidebar -->

    <div class="container">
        <div class="row">

            <!-- sidebar -->
            <nav class="sidenav col-xs-2">
                <ul class="mcd-menu">
                    <li>
                        <a href="{{route('student.dashboard')}}" class="active">
                            <img src="{{asset('asset/images/photo icon.svg')}}" class="profile">
                            <strong>Profile</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('student.group')}}" class="">
                            <img src="{{asset('asset/images/group icon.svg')}}">
                            <strong>Group</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('student.subjects')}}">
                            <img src="{{asset('asset/images/subj icon.svg')}}">
                            <strong>Subjects</strong>
                        </a>
                        <ul class="list-unstyled">
                            @foreach($subjects = Auth::user()->grade->subjects as $subject)
                                <li><a href="{{route('student.subject', $subject)}}">{{$subject->name}}</a>
                                    <ul class="list-unstyled">
                                        <li><a href="#">Data</a></li>
                                        <li><a href="#">Sources</a></li>
                                        <li><a href="#">Results</a></li>
                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                    <li>
                        <a href="{{route('student.assignments')}}" class="">
                            <img src="{{asset('asset/images/assign icon.svg')}}">
                            <strong>Assignments</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('student.tables')}}">
                            <img src="{{asset('asset/images/table icon.svg')}}">
                            <strong>Table</strong>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="#">Lectures Table</a></li>
                            <li><a href="#">Midterms Table</a></li>
                            <li><a href="#">Finals Table</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('student.events')}}">
                            <img src="{{asset('asset/images/event icon.svg')}}">
                            <strong>Events</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('student.auth.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="{{asset('asset/images/power-icon.svg')}}">
                            <strong>Logout</strong>
                        </a>

                        <form id="logout-form" action="{{ route('student.auth.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </nav>

            <!--tables section-->
            <section class="tables-sec col-sm-push-2 col-xs-8">
                <div class="">
                    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapse-1"
                            aria-expanded="false" aria-controls="collapse-1">
                        <strong>ASSIGNMENTS</strong>
                    </button>
                    <div class="collapse inner-tables" id="collapse-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Professor</th>
                                <th>Title</th>
                                <th>Path</th>
                                <th>Created_at</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($subjected->assignments as $assignment)
                            <tr>

                                    <td>DR : {{$assignment->professor->name}}</td>
                                    <td>{{$assignment->title}}</td>
                                    <td><a href="{{$assignment->path}}">link</a></td>
                                    <td>{{$assignment->created_at}}</td>
                            </tr>
                            @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapse-2"
                            aria-expanded="false" aria-controls="collapse-2">
                        <strong>SOURCES</strong>
                    </button>
                    <div class="collapse inner-tables" id="collapse-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Professor</th>
                                <th>Title</th>
                                <th>Path</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjected->sources as $source)
                                <tr>

                                    <td>DR : {{$source->professor->name}}</td>
                                    <td>{{$source->title}}</td>
                                    <td><a href="{{$source->path}}">link</a></td>
                                    <td>{{$source->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapse-3"
                            aria-expanded="false" aria-controls="collapse-3">
                        <strong>MARKS</strong>
                    </button>
                    <div class="collapse inner-tables" id="collapse-3">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Attendance</th>
                                <th>Work</th>
                                <th>Midterm</th>
                                <th>Semester</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($marks as $mark)
                            <tr>
                                    <td>{{$mark->attendance}}</td>
                                    <td>{{$mark->work}}</td>
                                    <td>{{$mark->midterm}}</td>
                                    <td>{{$mark->semester}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>











@endsection