@extends('student.layouts.layout')

@section('content')

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
                        <a href="{{route('student.dashboard')}}" class="">
                            <img src="{{asset('asset/images/photo icon.svg')}}" class="profile">
                            <strong>Profile</strong>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('student.group')}}" class="active">
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

            <!-- Group Section -->
            <div class="col-sm-push-2 col-xs-8">
                <div class="create-post">
                    <form action="group/posts" method="post">
                        @csrf
                        <input type="text" name="post-content">
                        <input type="hidden" name="group_id" />
                        <input type="submit" class="" value="Post">
                    </form>
                </div>
                <div class="post">
                    @foreach($posts as $post)
                        <div style="border:1px solid red;">
                    <h2>{{$post->student->name}}</h2>
                    <img src="" width="100" height="100" alt="not there">
                    <p>{{$post->body}}</p>

                        <div class="create-comment">
                            <form action="group/posts/{post}/comments" method="post">
                                @csrf
                                <input type="text" name="body">
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type="submit" class="" value="Comment">
                            </form>
                        </div>
                        @foreach($post->comments as $comment)
                            <div class="comment">

                                <h4>{{$comment->student['name']}}</h4>
                                <p>{{$comment->body}}</p>
                            </div>
                            <form action="group/posts/{post}/comments/{comment}" method="post">
                                @csrf
                                <input type="text" name="reply">
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                <input type="submit" class="" value="Reply">
                            </form>
                                @foreach($comment->replies as $reply)
                                    <div class="reply">
                                        <h6>{{$reply->student['name']}}</h6>
                                        <h6>{{$reply->body}}</h6>
                                    </div>
                                @endforeach
                        @endforeach
                    @endforeach
                        </div>


                </div>

                {{--<div class="create-comment">
                    <form action="group/posts/comments" method="post">
                        @csrf
                        <input type="text" name="comment-content">
                        <input type="submit" class="" value="Comment">
                    </form>
                </div>
                <div class="comment">
                    <h4>Comment writer</h4>
                    <p>Comment Content</p>
                </div>--}}
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
