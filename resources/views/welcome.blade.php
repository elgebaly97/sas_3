{{--<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">



            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="{{route('student.auth.login')}}">Login Student</a>
                    <a href="{{route('professor.auth.login')}}">Login Professor</a>
                    <a href="{{route('admin.auth.login')}}">Login Admin</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />

    <title>Home</title>
</head>

<body>
<!-- start navbar -->
<nav class="navbar">
    <div class="container">
        <div class="row">
            <!-- LOGO div -->
            <div class="col-md-6 col-xs-8 navbar-left">
                <img src="{{asset('asset/images/badge.png')}}" class="img img-responsive navbar-brand"
                     alt="Mansoura university badge" />
                <a href="#"><span>Student administration system</span></a>
            </div>
            <!--login div -->
            <div class="col-md-6 col-xs-4 navbar-right">
                <a href="{{route('student.auth.login')}}" style="margin-right: 20px;"><img width="30" height="45" src="{{asset('asset/images/login icon.svg')}}"><span>Student</span></a>
                <a href="{{route('professor.auth.login')}}" style="margin-right: 20px;"><img width="30" height="45" src="{{asset('asset/images/login icon.svg')}}"><span>Professor</span></a>
                <a href="{{route('admin.auth.login')}}" style="margin-right: 20px;"><img width="30" height="45" src="{{asset('asset/images/login icon.svg')}}"><span>Admin</span></a>
            </div>
        </div>
    </div>
</nav>
<!-- home content -->
<section class="home-content">
    <div class="container">
        <div class="row">
            <!-- website pic. -->
            <div class="col-md-6 col-xs-12">
                <img src="{{asset('asset/images/main image.png')}}" class="img-responsive"
                     style="border: 15px solid #002942; margin-bottom: 35px;">
            </div>
            <!-- website info. -->
            <div class="col-md-6 col-xs-12">
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="{{asset('asset/images/circle.svg')}}" alt="..."
                             style="width: 55px; height: 55px;">
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading">leorem</h2>
                        <p class="">leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum
                            leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum</p>
                        <p class="">leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum
                            leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum</p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="{{asset('asset/images/circle.svg')}}" alt="..."
                             style="width: 55px; height: 55px;">
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading">leorem ipsum leorem</h2>
                        <p class="">leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum
                            leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem
                            ipsum leorem ipsum leorem ipsum leorem ipsum</p>

                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="{{asset('asset/images/circle.svg')}}" alt="..."
                             style="width: 55px; height: 55px;">
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading">leorem ipsum</h2>
                        <p class="">leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum
                            leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum</p>
                        <p class="">leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum
                            leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum</p>
                        <p class="">leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum
                            leorem ipsum leorem ipsum leorem ipsum leorem ipsum leorem ipsum</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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
