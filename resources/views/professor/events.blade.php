@extends('professor.layouts.layout')

@section('content')

    {{--
    <h1>Events</h1>


    @foreach($events as $event)

        <h2>{{$event->title}}</h2>
        <p>{{$event->image}}</p>
        <p>{{$event->day}}</p>




    @endforeach

--}}




            <!-- Event Section  -->



            <div class="col-sm-push-2 col-xs-8 text-center">
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-md-5 col-xs-12">
                            <div class="card">
                                <img class="img-responsive" src="{{asset('asset/images')}}/{{$event->image}}" alt="pic" style="width:100%">
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
