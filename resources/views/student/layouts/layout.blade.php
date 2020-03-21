<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />

    <title>SAS</title>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
<div id="app">

<!-- start navbar -->
<nav class="navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 navbar-left">
                <img src="{{asset('asset/images/badge.png')}}" class="img img-responsive navbar-brand"
                     alt="Mansoura university badge" />
                <span><a href="{{route('whome')}}" style="color: white;text-decoration: none">Student administration system</a></span>
                <!-- Search Field -->

                @if(Auth::guest())
                    <span></span>
                @else
                    {{--Search--}}
                    <form class="" action="search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search Students"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button></span>
                        </div>
                    </form>
                    <form action="searchprof" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search Professors"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button></span>
                        </div>
                    </form>
                    {{--notification--}}
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')"><span class="glyphicon glyphicon-globe"></span>
                            <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span></button>
                        <ul class="dropdown-menu">
                            <li>
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    @include('notification.'.snake_case(class_basename($notification->type)))
                                @endforeach
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>




@yield('content')



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

</div>

<script>
    function markNotificationAsRead(notificationCount) {
        if(notificationCount !== '0'){
            $.get('markAsRead');
        }
    }
</script>




<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
</body>

</html>