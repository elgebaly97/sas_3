@extends('admin.layouts.layout')

@section('content')


{{--
    <div class="container">
        <form method="post" action="view-events">
            @csrf

            <div class="form-group">
                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;" value="0" {{ old('department_id', request('department_id')) == 0 ? 'selected' : '' }}>Department</option>
                    <option value="1" {{ old('department_id', request('department_id')) == 1 ? 'selected' : '' }}>Communications</option>
                    <option value="2" {{ old('department_id', request('department_id')) == 2 ? 'selected' : '' }}>Electrical</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">View Events</button>
        </form>
    </div>

    <div class="container">
        @foreach($events as $event)

            <h3>{{$event->title}}</h3>
            <h6>{{$event->day}}</h6>


        @endforeach
    </div>

--}}

<!--form section-->
<form class="view-std" method="post" action="view-events">
    @csrf

    <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

        <select name="department_id" class="form-control">
            <option style="color: #ced4da;" value="0" {{ old('department_id', request('department_id')) == 0 ? 'selected' : '' }}>Department</option>
            <option value="1" {{ old('department_id', request('department_id')) == 1 ? 'selected' : '' }}>Communications</option>
            <option value="2" {{ old('department_id', request('department_id')) == 2 ? 'selected' : '' }}>Electrical</option>
        </select>

        <input type="submit" class="btn btn-lg form-control" value="View Events">


    </div>

</form>


    <div class="col-sm-push-2 col-xs-8 text-center">
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-5 col-xs-12">
                    <div class="card">
                        <img class="img-uresponsive" width="200" height="150" src="{{asset('asset/images')}}/{{$event->image}}" alt="pic" style="width:100%">
                        <div class="card-info">
                            <h4><b>{{$event->title}}</b></h4>
                            <p>Leorem ipsum Leorem ipsum Leorem ipsum Leorem ipsum</p>
                            <strong>{{$event->day}}</strong>
                            <button class="btn btn-block">Read More</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>











@endsection