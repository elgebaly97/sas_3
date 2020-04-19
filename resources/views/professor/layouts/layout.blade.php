<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />

    <title>SAS</title>

    <style>
        ::placeholder {
            color: #FB9854 !important;
        }

        select.form-control{
            color: #FB9854 !important;
        }
    </style>
</head>

<body>
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

<!--Profile contents -->

<div class="container">
    <div class="row">

        <!-- sidebar -->
        <nav class="sidenav col-xs-2">
            <ul class="mcd-menu">
                <li>
                    <a href="{{route('professor.dashboard')}}" class="">
                        <img src="{{asset('asset/images/photo icon.svg')}}" class="profile">
                        <strong>Profile</strong>
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="{{asset('asset/images/group icon.svg')}}">
                        <strong>Groups</strong>
                    </a>
                    <ul class="list-unstyled">
                        @foreach($groups as $group)
                            <li>
                                <a href="/sas_3/public/professor/groups/{{$group->id}}">{{$group->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="">
                        <img src="{{asset('asset/images/subj icon.svg')}}">
                        <strong>SUBJECTS</strong>
                    </a>
                    <ul class="list-unstyled">
                        @foreach($subjects as $subject)
                            <li>
                                <a href="{{route('professor.subject', $subject)}}">{{$subject->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="{{route('professor.marks')}}" class="">
                        <img src="{{asset('asset/images/final result icon.svg')}}">
                        <strong>Term grades</strong>
                    </a>
                </li>

                <li>
                    <a href="{{route('professor.events')}}">
                        <img src="{{asset('asset/images/event icon.svg')}}">
                        <strong>View Events</strong>
                    </a>
                </li>

                <li>
                    <a href="{{ route('professor.auth.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <img src="{{asset('asset/images/power-icon.svg')}}">
                        <strong>Logout</strong>
                    </a>

                    <form id="logout-form" action="{{ route('professor.auth.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>

        <!--profile info -->

        @yield('content')


    </div>
</div>


<!-- profile datails
<div class="container">
    <div class="row"> -->

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


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/js.js')}}"></script>
</body>

</html>
