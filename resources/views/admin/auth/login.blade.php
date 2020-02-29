{{--
@extends('admin.layouts.app')

@section('title', 'login here')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Admin Login</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.auth.loginAdmin') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    <hr>


--}}



                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a> --}}


                            {{--    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}


@extends('admin.layouts.layout')



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
                    <img src="{{asset('asset/images/circle.svg')}}" width="60" height="60">
                    <h2>First login?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisifwcing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore roipi magna aliqua. Ut enim ad minim veeniam.</p>
                </div>
            </header>
            <form method="POST" action="{{ route('admin.auth.loginAdmin') }}">

            {{ csrf_field() }}

            <!-- identity selection -->
                <div class="form-group text-center col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <a class="btn btn-default btn-lg text-center" href="#" role="button">Admin</a>
                </div>
                <!-- input part -->
                <!--username field-->

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1"><img src="{{asset('asset/images/user-alt.svg')}}" width="16"
                                                                            height="20" /></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail Address" aria-describedby="sizing-addon1" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>


                <!--password field-->

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon2"><img src="{{asset('asset/images/lock-icon.svg')}}" width="16"
                                                                            height="20" /> </span>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" aria-describedby="sizing-addon2" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <!--login button-->
                <div class="form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <button class="btn btn-default btn-lg btn-block" type="submit">LOGIN</button>
                </div>
                <!--checkbox + forget password-->
                <div
                        class="checkbox form-group col-sm-push-3 col-sm-6 col-xs-push-2 col-xs-8 input-group input-group-lg">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
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

