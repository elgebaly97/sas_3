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

@extends('admin.layouts.app')

@section('content')


    <div class="container text-center">
        <h1>Hello Admin !</h1>
        <h2>{{Auth::user()->name}}</h2>
        <h3>{{Auth::user()->email}}</h3>
    </div>




@endsection
