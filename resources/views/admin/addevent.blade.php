@extends('admin.layouts.app')

@section('content')

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










@endsection
