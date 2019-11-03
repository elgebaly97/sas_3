<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />

    <title>Login</title>
</head>

<body>

<!-- start navbar -->
<nav class="navbar">
    <div class="container">
        <div class="row">
            <!-- LOGO div -->
            <div class="col-md-6 col-xs-9 navbar-left">
                <img src="{{asset('media/badge.png')}}" class="img img-responsive navbar-brand"
                     alt="Mansoura university badge" />
                <span>Student administration system</span>
            </div>

            <!-- LOGIN div
            <div class="col-md-6 col-xs-3 navbar-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="35.547" height="35.546" viewBox="0 0 35.547 35.546">
                    <defs>
                        <style>
                            .a {
                                fill: #fb9854;
                                stroke: #fb9854;
                                stroke-linecap: round;
                            }
                        </style>
                    </defs>
                    <path class="a"
                        d="M0,34.546V30.229c0-4.751,7.773-8.638,17.273-8.638s17.273,3.886,17.273,8.638v4.318ZM8.636,8.638a8.637,8.637,0,1,1,8.638,8.636A8.637,8.637,0,0,1,8.636,8.638Z"
                        transform="translate(0.5 0.5)" />
                </svg>
                <span>login</span>
            </div>
        -->
        </div>
    </div>
</nav>


<!-- FORM section -->
<section class="content">
    <div class="container">

        <!-- Circle icon by two divs

    <div class="cir1">
        <div class="cir2"></div>
    </div>
        -->

        <!-- FIRST LOGIN? part -->
        <header class="row">
            <div class="col-md-push-2 col-xs-push-1 col-xs-9">
                <img src="{{asset('media/circle.svg')}}" width="60" height="60">
                <h2>First login?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisifwcing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore roipi magna aliqua. Ut enim ad minim veeniam.</p>
            </div>
        </header>
        <form method="POST" action="{{ route('student.auth.loginStudent') }}">
        {{ csrf_field() }}

            <!-- identity selection -->
            <div class="form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                <a class="btn btn-default btn-lg" href="#" role="button">Student</a>
                <a class="btn btn-default btn-lg" href="#" role="button">Lecturer</a>
                <a class="btn btn-default btn-lg" href="#" role="button">Admin</a>
            </div>
            <!-- input part -->
            <!--username field-->

            <div class="form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><img src="{{asset('media/user-alt.svg')}}" width="16"
                                                                            height="20" /></span>
                <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
            </div>
            <!--password field-->
            <div class="form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon2"><img src="{{asset('media/lock-icon.svg')}}" width="16"
                                                                            height="20" /> </span>
                <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
            </div>
            <!--login button-->
            <div class="form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                <button class="btn btn-default btn-lg btn-block" type="submit">LOGIN</button>
            </div>
            <!--checkbox + forget password-->
            <div
                    class="checkbox form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#">Forget password</a>
            </div>

        </form>
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
                    <li><a href="#"><img src="media/web-icon.svg" /></a></li>
                    <li><a href="#"><img src="media/face-icon.svg" /></a></li>
                    <li><a href="#"><img src="media/insta-icon.svg" /></a></li>
                    <li><a href="#"><img src="media/twitter-icon.svg" /></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-12">
                <p><bdi>جميع الحقوق محفوظة &copy; مركز تقنية المعلومات - جامعة المنصورة</bdi>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>