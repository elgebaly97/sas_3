@extends('student.layouts.layout')

@section('content')

    {{--
    <h1>Events</h1>


    @foreach($events as $event)

        <h2>{{$event->title}}</h2>
        <p>{{$event->image}}</p>
        <p>{{$event->day}}</p>




    @endforeach

--}}

    <!-- start navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-9 navbar-left">
                    <img src="{{asset('asset/images/badge.png')}}" class="img img-responsive navbar-brand"
                         alt="Mansoura university badge" />
                    <span><a href="{{route('whome')}}" style="color: white;text-decoration: none">Student administration system</a></span>
                </div>
            </div>
        </div>
    </nav>

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

            <!-- Event Section  -->



            <div class="col-sm-push-2 col-xs-8 text-center">
                <div class="row">
                    @foreach($events as $event)
                    <div class="col-md-5 col-xs-12">
                        <div class="card">
                            <img class="img-responsive" src="{{asset('asset/images')}}/{{$event->image}}" alt="pic" style="width:100%">
                            <div class="card-info">
                                <h4><b>{{$event->title}}</b></h4>
                                <p>Leorem ipsum Leorem ipsum Leorem ipsum Leorem ipsum</p>
                                <strong>{{$event->day}}</strong>
                                <button class="btn btn-block">Read More</button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms & conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-xs-12">
                    <ul class="list-unstyled">
                        <li><a href="#"><img src="{{asset('asset/images/web-icon.svg')}}" /></a></li>
                        <li><a href="#"><img src="{{asset('asset/images/face-icon.svg')}}" /></a></li>
                        <li><a href="#"><img src="{{asset('asset/images/insta-icon.svg')}}" /></a></li>
                        <li><a href="#"><img src="{{asset('asset/images/twitter-icon.svg')}}" /></a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-xs-12">
                    <p><bdi>جميع الحقوق محفوظة &copy; مركز تقنية المعلومات - جامعة المنصورة</bdi>
                    </p>
                </div>
            </div>
        </div>
    </footer>




@endsection