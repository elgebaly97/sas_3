@extends('admin.layouts.layout')

@section('content')






        <form class="view-std" method="post" action="store-professor">
            @csrf
            <div class="input-group col-sm-push-3 col-sm-6 col-xs-9">

                <input type="text" name="name" class="form-control" id="" placeholder="Name">

                <input type="email" name="email" class="form-control" id="" placeholder="Email">

                <input type="password" name="password" class="form-control" id="" placeholder="Password">

                <input type="text" name="faculty" class="form-control" id="" placeholder="Faculty">

                <input type="number" name="national_id" class="form-control" id="" placeholder="National_id">

                <input type="number" name="faculty_id" class="form-control" id="" placeholder="Faculty_id">

                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;">Department</option>
                    <option value="1">Communications</option>
                    <option value="2">Electrical</option>
                </select>

                <select name="grade_id" class="form-control">
                    <option style="color: #ced4da;">Grade</option>
                    <option value="1">First</option>
                    <option value="2">Second</option>
                    <option value="3">Third</option>
                    <option value="4">Fourth</option>
                </select>


                <input type="submit" class="btn btn-lg form-control" value="Add Professor">
            </div>

        </form>






    {{--

    <div class="col-xs-2 space-shift"></div>
    <div class="col-xs-6">
        <form method="post" action="store-professor">
            @csrf

            <div class="form-group">
                <input type="text" name="name" class="form-control" id="" placeholder="Name">
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" id="" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" id="" placeholder="Password">
            </div>

            <div class="form-group">
                <input type="text" name="faculty" class="form-control" id="" placeholder="Faculty">
            </div>

            <div class="form-group">
                <input type="number" name="national_id" class="form-control" id="" placeholder="National_id">
            </div>

            <div class="form-group">
                <input type="number" name="faculty_id" class="form-control" id="" placeholder="Faculty_id">
            </div>

            <div class="form-group">
                <select name="department_id" class="form-control">
                    <option style="color: #ced4da;">Department</option>
                    <option value="1">Communications</option>
                    <option value="2">Electrical</option>
                </select>
            </div>

            <div class="form-group">
                <select name="grade_id" class="form-control">
                    <option style="color: #ced4da;">Grade</option>
                    <option value="1">First</option>
                    <option value="2">Second</option>
                    <option value="3">Third</option>
                    <option value="4">Fourth</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning form-control">Add Professor</button>

        </form>
    </div>


--}}







@endsection
