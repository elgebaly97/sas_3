@extends('professor.layouts.layout')

@section('content')

    <!-- Group Section -->
    {{--<main class="col-sm-push-2 col-sm-8 col-xs-9" id="posts-box">
        --}}{{--<div class="create-post">
            <form action="group/posts" method="post">
                @csrf
                <input type="text" name="post-content">
                <input type="hidden" name="group_id" />
                <input type="submit" class="" value="Post">
            </form>
        </div>--}}{{--
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
            <form action="posts" method="post">
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
                            --}}{{--@foreach($comment->replies as $reply)
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
                            @endforeach--}}{{--
                        @endforeach
                    </div>
                </div>
            </section>
        @endforeach






    </main>--}}



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
                    <input name="post-content" id="addPost" type="text" class="input-lg" placeholder="Say Something ...">
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
                        {{--<h3 class='media-heading'>{{$post->student->name}}</h3>--}}
                        {{--<h6></h6>--}}
                        <h3 class='media-heading'>{{$post->student['name']}}</h3>
                        <h3 class='media-heading'>{{$post->professor['name']}}</h3>
                    </div>
                    <div class='post-divs'>
                        <p>{{$post->body}}</p>
                    </div>
                    <div class='post-btns post-divs'>
                        <button class='btn'>Like</button>
                        <button id="cmt-btn" class='btn' data-toggle="collapse" data-target="#collapseExample{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">Comments</button>
                    </div>


                    <div class="coollapse" id="collapseExample{{$post->id}}">
                        <div class='post-divs cmt-field'>
                            <form action="group/posts/{post}/comments" method="post">
                                @csrf
                                <input type="text" name="body" id='bodyText' class='input-lg' placeholder='Write a comment ...' required>
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                <input type='submit' id='addComment' class='input-lg btn' value='Comment'>
                            </form>
                        </div>
                        @foreach($post->comments as $comment)
                            <div class="comment" id='cmts' style="border-radius: 20px;">
                                <div class='media-left'>
                                    <img class='media-object' src="{{asset('asset/images/user-pic.svg')}}" alt='...'style='width: 35px; height: 35px;'>
                                </div>
                                <div class='media-body'>
                                    <h4 class='media-heading'>{{$comment->student['name']}}</h4>
                                </div>
                                <div class='post-divs'>
                                    <p>{{$comment->body}}</p>
                                </div>
                            </div>
                            @foreach($comment->replies as $reply)
                                <div>
                                    <div class="reply" style="border-radius: 30px; padding-left: 20px; width: 80%;">
                                        <div class='media-left'>
                                            <img class='media-object' src="{{asset('asset/images/user-pic.svg')}}" alt='...'style='width: 25px; height: 25px;'>
                                        </div>
                                        <div class='media-body'>
                                            <h6 class='media-heading'>{{$reply->student['name']}}</h6>
                                        </div>
                                        <div class='post-divs'>
                                            <p>{{$reply->body}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class='post-divs cmt-field'>
                                <form action="group/posts/{post}/comments/{comment}" method="post">
                                    @csrf
                                    <input type="text" name="reply" id='bodyText' class='input-sm' placeholder='Reply ...' required>
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                    <input type='submit' id='addComment' class='input-sm btn' value='Reply'>
                                </form>
                            </div>
                            {{--@foreach($comment->replies as $reply)
                                <div class="reply">
                                    <div class='media-left'>
                                        <img class='media-object' src="{{asset('asset/images/user-pic.svg')}}" alt='...'style='width: 15px; height: 15px;'>
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

@endsection
