{{--@extends('professor.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Professor's</strong> Dashboard</div>

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
@extends('professor.layouts.layout')



@section('content')

    <!--profile info -->

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
                <h2 style="color:#003b5f;">{{auth()->user()->name}}</h2>
            </div>
            <div class="clearfix"></div>
            <hr style="box-shadow: 0 0 10px 1px #f96805;">

            <div class="student-info">
                <p class="col-xs-6">Faculty:</p>
                <p class="col-xs-6">Engineering</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Id:</p>
                <p class="col-xs-6">{{auth()->user()->faculty_id}}</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Department:</p>
                <p class="col-xs-6">{{auth()->user()->department->name}}</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Projects in progress:</p>
                <p class="col-xs-6">-SAS<br>-Blood Bank</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Office's hours:</p>
                <p class="col-xs-6">Monday 10:00 to 12:00<br>Tuesday 1:30 to 3:00</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Address:</p>
                <p class="col-xs-6">Mansoura</p>
                <div class="clearfix"></div>
            </div>
            <div class="student-info">
                <p class="col-xs-6">Email:</p>
                <p class="col-xs-6">{{auth()->user()->email}}</p>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>












@endsection




