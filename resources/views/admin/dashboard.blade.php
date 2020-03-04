{{--@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Admin's</strong> Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome Mr./Mst : <strong>{{Auth::user()->name}}</strong></p>
                        <p>Your Joined : {{ Auth::user()->created_at->diffForHumans() }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}


{{--
@extends('admin.layouts.app')

@section('content')


    <div class="container text-center">
        <h1>Hello Admin !</h1>
        <h2>{{Auth::user()->name}}</h2>
        <h3>{{Auth::user()->email}}</h3>
    </div>




@endsection
--}}
@extends('admin.layouts.layout')

@section('content')

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
                <p class="col-xs-6">job describtion:</p>
                <p class="col-xs-6">Responsible for managing the site</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Faculty:</p>
                <p class="col-xs-6">Engineering</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Address:</p>
                <p class="col-xs-6">Mansoura</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">phone number:</p>
                <p class="col-xs-6">252525363</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">National ID:</p>
                <p class="col-xs-6">28558574865</p>
                <div class="clearfix"></div>
            </div>


        </div>
    </div>






@endsection
