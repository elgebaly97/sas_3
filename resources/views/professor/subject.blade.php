@extends('professor.layouts.layout')

@section('content')
    <section class="tables-sec col-sm-push-2 col-xs-8">
        <div class="">
            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapse-1"
                    aria-expanded="false" aria-controls="collapse-1">
                <strong>ASSIGNMENTS</strong>
            </button>
            <div class="collapse inner-tables" id="collapse-1">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Professor</th>
                        <th>Title</th>
                        <th>Path</th>
                        <th>Created_at</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($subjected->assignments as $assignment)
                        <tr>

                            <td>DR : {{$assignment->professor->name}}</td>
                            <td>{{$assignment->title}}</td>
                            <td><a href="{{$assignment->path}}">link</a></td>
                            <td>{{$assignment->created_at}}</td>
                        </tr>
                    @endforeach


                    </tbody>

                </table>
                <a class="btn btn-warning" href="{{route('add.assignments',$subjected)}}">Add Assignment</a>
            </div>
        </div>
        <div class="">
            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapse-2"
                    aria-expanded="false" aria-controls="collapse-2">
                <strong>SOURCES</strong>
            </button>
            <div class="collapse inner-tables" id="collapse-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Professor</th>
                        <th>Title</th>
                        <th>Path</th>
                        <th>Created_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subjected->sources as $source)
                        <tr>

                            <td>DR : {{$source->professor->name}}</td>
                            <td>{{$source->title}}</td>
                            <td><a href="{{$source->path}}">link</a></td>
                            <td>{{$source->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a class="btn btn-warning" href="{{route('add.sources',$subjected)}}">Add Source</a>
            </div>
        </div>

        <div class="">
            <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapse-3"
                    aria-expanded="false" aria-controls="collapse-3">
                <strong>MARKS</strong>
            </button>
            <div class="collapse inner-tables" id="collapse-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Attendance</th>
                        <th>Work</th>
                        <th>Midterm</th>
                        <th>Semester</th>
                        {{--<th>Edit</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        {{--{{dd($student->marks()->where('subject_id',request('subject_id'))->first()->work)}}--}}
                        <tr>
                                <input type="hidden" name="student_id" value="{{$student->id}}" />
                                <td>{{$student->name}}</td>
                                <td>{{$student->marks()->where('subject_id', $subjected->id)->value('attendance')}}</td>
                                <td>{{$student->marks()->where('subject_id', $subjected->id)->value('work')}}</td>
                                <td>{{$student->marks()->where('subject_id', $subjected->id)->value('midterm')}}</td>
                                <td>{{$student->marks()->where('subject_id', $subjected->id)->value('semester')}}</td>
                                {{--<td><input class="form-control" type="text" name="attendance" value="{{$student->marks()->where('subject_id', $subjected->id)->value('attendance')}}" style="background: none; width: 50px; height: 30px;"></td>
                                <td><input class="form-control" type="text" name="work" value="{{$student->marks()->where('subject_id', $subjected->id)->value('work')}}" style="background: none; width: 50px; height: 30px;"></td>
                                <td><input class="form-control" type="text" name="midterm" value="{{$student->marks()->where('subject_id', $subjected->id)->value('midterm')}}" style="background: none; width: 50px; height: 30px;"></td>
                                <td><input class="form-control" type="text" name="semester" value="{{$student->marks()->where('subject_id', $subjected->id)->value('semester')}}" style="background: none; width: 50px; height: 30px;"></td>--}}
                                {{--<td><input class="form-control" type="number" name="attendance" value="{{old('attendance')}}"></td>--}}
                                {{--<td><a class="btn btn-info" href="{{route('edit.marks')}}">Edit</a></td>--}}

                        </tr>


                    @endforeach
                    </tbody>
                </table>
                <a class="btn btn-warning" href="{{route('add.marks',$subjected)}}">Add Mark</a>
            </div>
        </div>

    </section>
@endsection
