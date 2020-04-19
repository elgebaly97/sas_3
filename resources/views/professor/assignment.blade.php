@extends('professor.layouts.layout')

@section('content')
    <form class="view-std" action="assignment" method="post">
        @csrf

        <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

            {{--<input required type="text" list="faculty" class="form-control" placeholder="Select faculty">
            <datalist id="faculty">
                <option value="law"></option>
                <option value="engineering"></option>
                <option value="medicine"></option>
                <option value="commerce"></option>
                <option value="kindergatren"></option>
            </datalist>--}}


            {{--<input required type="text" list="department" class="form-control" placeholder="Select department">
            <datalist id="department">
                <option value="leorem"></option>
                <option value="ipsum"></option>
                <option value="ipsum leorem"></option>
                <option value="leorem ipsuum"></option>
                <option value="leorem leorem"></option>
            </datalist>--}}


            {{--<input required type="number" class="form-control" min="0" max="7" placeholder="Select grade">--}}

            <input required type="text" class="form-control" name="title" placeholder="Title">

            <input required type="text" class="form-control" name="path" placeholder="Path">

            <input type="submit" class="btn btn-lg form-control" value="Add">
        </div>

    </form>
@endsection
