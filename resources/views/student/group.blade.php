@extends('student.layouts.layout')

@section('content')



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
            <main class="col-sm-push-2 col-sm-8 col-xs-9" id="posts-box">
                {{--<div class="create-post">
                    <form action="group/posts" method="post">
                        @csrf
                        <input type="text" name="post-content">
                        <input type="hidden" name="group_id" />
                        <input type="submit" class="" value="Post">
                    </form>
                </div>--}}
                <section class="post">
                    <div class="post-divs">
                        <div class="media-left">
                            <img class="media-object" src="{{asset('asset/images/user-pic.svg')}}" alt="..."
                                 style="width: 55px; height: 55px;">
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading">{{auth()->user()->name}}</h2>
                        </div>
                    </div>
                    <form action="group/posts" method="post">
                        @csrf
                        <div class="post-divs">
                            <input name="post-content" id="addPost" type="text" class="input-lg" placeholder="Ask ..." required>
                            <input type="hidden" name="group_id" />
                        </div>
                        <div class="post-btns post-divs">
                            <button class="btn">Add photo</button>
                            <button class="btn">Add video</button>
                            <button class="btn">Creat poll</button>
                            <button class="btn" id="addPostBtn" type="submit">Post</button>
                        </div>
                    </form>
                </section>
                @foreach($posts as $post)
                <section class="post">

                        <div class="mb-5" style="margin: 20px;">
                        <div class='media-left'>
                            <img class='media-object' src="{{asset('asset/images/user-pic.svg')}}" alt='...'style='width: 55px; height: 55px;'>
                        </div>
                        <div class='media-body'>
                            <h3 class='media-heading'>{{$post->student->name}}</h3>
                        </div>
                        <div class='post-divs'>
                            <p>{{$post->body}}</p>
                        </div>
                        <div class='post-btns post-divs'>
                            <button class='btn'>Like</button>
                            <button id="" class='btn' data-toggle="collapse" data-target="#collapseExample{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">Comments</button>
                        </div>


                        <div class="collapse" id="collapseExample{{$post->id}}">
                        <div class='post-divs'id='cmt-field'>
                            <form action="group/posts/{post}/comments" method="post">
                                @csrf
                                <input type="text" name="body" id='bodyText' class='input-lg' placeholder='Write a comment ...' required>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type='submit' id='addComment' class='input-lg btn' value='Comment'>
                            </form>
                        </div>
                        @foreach($post->comments as $comment)
                            <div class="comment" id='cmts'>
                                <div class='media-left'>
                                    <img class='media-object' src='{{asset('asset/images/user-pic.svg')}}' alt='...'style='width: 35px; height: 35px;'>
                                </div>
                                <div class='media-body'>
                                    <h4 class='media-heading'>{{$comment->student['name']}}</h4>
                                </div>
                                <div class='post-divs'>
                                    <p>{{$comment->body}}</p>
                                </div>
                            </div>
                                @foreach($comment->replies as $reply)
                                    <div class="reply">
                                        <div class='media-left'>
                                            <img class='media-object' src='{{asset('asset/images/user-pic.svg')}}' alt='...'style='width: 15px; height: 15px;'>
                                        </div>
                                        <div class='media-body'>
                                            <h6 class='media-heading'>{{$reply->student['name']}}</h6>
                                        </div>
                                        <div class='post-divs'>
                                            <p>{{$reply->body}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <div class='post-divs'>
                                    <form action="group/posts/{post}/comments/{comment}" method="post">
                                        @csrf
                                        <input type="text" name="reply" class='input-sm' placeholder='Reply ...' required>
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                        <input type='submit' id='' class='input-sm btn' value='Reply'>
                                    </form>
                                </div>
                                {{--@foreach($comment->replies as $reply)
                                    <div class="reply">
                                        <div class='media-left'>
                                            <img class='media-object' src='{{asset('asset/images/user-pic.svg')}}' alt='...'style='width: 15px; height: 15px;'>
                                        </div>
                                        <div class='media-body'>
                                            <h6 class='media-heading'>{{$reply->student['name']}}</h6>
                                        </div>
                                        <div class='post-divs'>
                                            <p>{{$reply->body}}</p>
                                        </div>
                                    </div>
                                @endforeach--}}
                        @endforeach
                        </div>
                        </div>
                </section>
                    @endforeach






            </main>

        </div>
    </div>


@endsection

<!--
<section class='post' id='post-sec'>
    <div class='post-divs'>
        <div class='media-left'>
            <img class='media-object' src='media/user-pic.svg' alt='...'style='width: 55px; height: 55px;'>
        </div>
        <div class='media-body'>
            <h2 class='media-heading'>Name Surname</h2>
        </div>
    </div>

    <div class='post-divs'>
        <p>" + content.postContent + "</p>
    </div>
    <div class='post-btns post-divs'>
        <button class='btn'>Like</button>
        <button class='btn' onclick='showComments()'>Comments</button>
        <button class='btn'>Repost</button>
    </div>

    <div class='post-divs'id='cmt-field' style='display:none;'>
        <input type='text' id='bodyText' class='input-lg' placeholder='Write a comment ...'>
        <input type='submit' id='addComment' class='input-lg btn' onclick='showComments()' value='Add'>
    </div>
</section>

<div id='cmts'>
    <div class='media-left'>
        <img class='media-object' src='media/user-pic.svg' alt='...'style='width: 35px; height: 35px;'>
    </div>
    <div class='media-body'>
        <h4 class='media-heading'>Name Surname</h4>
    </div>
    <div class='post-divs'>
        <p>" + data.body + "</p>
    </div>
</div>
-->
