@extends('admin.layouts.app')

@section('content')



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














@endsection