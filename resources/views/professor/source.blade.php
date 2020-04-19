@extends('professor.layouts.layout')

@section('content')
    <form class="view-std" action="source" method="post">
        @csrf

        <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

            <input required type="text" class="form-control" name="title" placeholder="Title">

            <input required type="text" class="form-control" name="path" placeholder="Path">

            <input type="submit" class="btn btn-lg form-control" value="Add">
        </div>

    </form>
@endsection
