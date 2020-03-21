@extends('student.layouts.layout')



@section('content')




    <!--Profile contents -->

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

            <!--profile info -->

            <div class="col-sm-push-2 col-xs-8">

                <!-- panel-heading
                    <div class="panel-heading">
                        <h4>User Profile</h4>
                    </div> -->
                <div class="panel">

                    <!--user pic -->
                    <div class="col-sm-3">
                        <img alt="User Pic" src="{{asset('asset/images/user-pic.svg')}}" class="img-responsive">
                    </div>
                    <!--use name -->
                    <div class="col-sm-8 text-center">
                        <h2 style="color:#003b5f;">{{Auth::user()->name}}</h2>
                    </div>
                    <div class="clearfix"></div>
                    <hr style="box-shadow: 0 0 10px 1px #f96805;">

                    <div class="student-info">
                        <p class="col-xs-6">Faculty:</p>
                        <p class="col-xs-6">Engineering Faculty</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="student-info">
                        <p class="col-xs-6">Department:</p>
                        <p class="col-xs-6">{{Auth::user()->department->name}}</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="student-info">
                        <p class="col-xs-6">Year:</p>
                        <p class="col-xs-6">{{Auth::user()->grade->name}}</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="student-info">
                        <p class="col-xs-6">Score:</p>
                        <p class="col-xs-6">{{Auth::user()->score}}</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="student-info">
                        <p class="col-xs-6">Date of birth:</p>
                        <p class="col-xs-6">4 jun 1997</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="student-info">
                        <p class="col-xs-6">Address:</p>
                        <p class="col-xs-6">{{Auth::user()->address}}</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="student-info">
                        <p class="col-xs-6">phone number:</p>
                        <p class="col-xs-6">123456789</p>
                        <div class="clearfix"></div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- profile datails
    <div class="container">
        <div class="row"> -->






@endsection




