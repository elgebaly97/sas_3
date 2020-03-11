@extends('admin.layouts.layout')

@section('content')

    {{--

    <div class="container">
        <div class="text-center">
            <h2>Add Event</h2>
        </div>



        <form method="post" action="store-event">
            @csrf

            <div class="form-group">
                <input type="text" name="title" class="form-control" id="" placeholder="Title">
            </div>

            <div class="form-group">
                <input type="text" name="image" class="form-control" id="" placeholder="Image">
            </div>

            <div class="form-group">
                <input type="date" name="day" class="form-control" id="" placeholder="Day">
            </div>

            <div class="form-group">
                <input type="text" name="owner" class="form-control" id="" placeholder="Owner">
            </div>


            <div class="form-group">
                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;">Department</option>
                    <option value="1">Communications</option>
                    <option value="2">Electrical</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Add Event</button>

        </form>






    </div>

--}}



        <form class="view-std" method="post" action="store-event">
            @csrf
            <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

                <input type="text" name="title" class="form-control" id="" placeholder="Title">

                <input type="text" name="image" class="form-control" id="" placeholder="Image">

                <input type="date" name="day" class="form-control orange-color" id="" placeholder="Day">

                <input type="text" name="owner" class="form-control" id="" placeholder="Owner">


                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;">Department</option>
                    <option value="1">Communications</option>
                    <option value="2">Electrical</option>
                </select>



            <input type="submit" class="btn btn-lg form-control" value="Add Events">
            </div>

        </form>
    </div>








@endsection
