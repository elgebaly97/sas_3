<?php

namespace App\Http\Controllers\Api;

use App\Favorite;
use App\Models\Assignment;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Department;
use App\Models\Event;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Mark;
use App\Models\Post;
use App\Models\Result;
use App\Models\Source;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Table;
use App\Notifications\CommentOnPost;
use App\Notifications\MakePost;
use Illuminate\Notifications\Console\NotificationTableCommand;
use Illuminate\Support\Facades\Notification;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    private function apiResponse($status, $message, $data=null){
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data

        ];
        return response()->json($response);
    }

    // ************* API For Students ******************

    public function students(){
        $students = Student::all();
        return $this->apiResponse(1, '', $students);
    }

    public function subjects(Request $request){
        //$subjects = Subject::all();
        //return $this->apiResponse(1, '', $subjects);
        $subjects = Subject::where(function($query) use($request){
            if(($request->has('department_id')) and ($request->has('grade_id'))){
                $query->where('department_id', $request->department_id)->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $subjects);
    }

    public function assignments(Request $request){
        $assignments = Assignment::where(function($query) use($request){
            if($request->has('subject_id')){
                $query->where('subject_id', $request->subject_id);
            }
            elseif(($request->has('department_id')) and ($request->has('grade_id'))){
                $query->where('department_id', $request->department_id)->where('grade_id', $request->grade_id);
            }
        })->get()->load('professor','subject');

        return $this->apiResponse(1, '', $assignments);
    }

    public function sources(Request $request){
        $sources = Source::where(function($query) use($request){
            if($request->has('subject_id')){
                $query->where('subject_id', $request->subject_id);
            }
        })->get()->load('professor','subject','subject.grade.departments');

        return $this->apiResponse(1, '', $sources);
    }

    public function marks(Request $request){
        /*$mark = Mark::where(function($query) use($request){
            if(($request->has('subject_id')) and ($request->has('student_id'))){
                $query->where('subject_id', $request->subject_id)->where('student_id', $request->student_id);
            }
        })->get()->load('subject');*/
        //dd(gettype($mark));
        $mark = Mark::where('subject_id', request('subject_id'))->where('student_id', request('student_id'))->first()->load('student');

        return $this->apiResponse(1, '', $mark);
    }


    public function events(Request $request){
        $event = Event::where(function($query) use($request){
            if($request->has('department_id')){
                $query->where('department_id', $request->department_id);
            }
        })->get();
        return $this->apiResponse(1, '', $event);
    }

    public function tables(Request $request){
        $table = Table::where(function($query) use($request){
            if($request->has('grade_id')){
                $query->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $table);
    }

    public function result(Request $request){
        $result = Department::where('id', $request->id)->with(['grades.subjects.results' => function($query) use($request){
            if($request->has('student_id')){
                $query->where('student_id', $request->student_id);
            }
        }])->get();
        return $this->apiResponse(1, '', $result);
    }
    /*public function result(Request $request){
        $result = Result::where( function($query) use($request){
            if($request->has('student_id')){
                $query->where('student_id', $request->student_id);
            }
        })->get()->load('subject');
        return $this->apiResponse(1, '', $result);
    }*/

    public function grade(Request $request){
        $grade = Grade::with(['subjects.results' => function($query) use($request){
            $query->where('student_id', $request->student_id);
        }])->get();
        return $this->apiResponse(1, '', $grade);
    }




    // ********************* API For Professors *********************

    public function addSource(Request $request){
        $validator = validator()->make($request->all(), [
            'department_id' => 'required',
            //'grade_id' => 'required',
            'subject_id' => 'required',
            'title' => 'required',
            'path' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $newSource = $request->user()->sources()->create($request->all());
        return $this->apiResponse(1, 'Done', $newSource);
    }

    // Api for Dropdown List

    public function departments(){
        $departmnets = Department::all();
        return $this->apiResponse(1, '', $departmnets);
    }

    public function grades(){
        $grades = Grade::all();
        return $this->apiResponse(1, '', $grades);
    }

    public function addAssignment(Request $request){
        $validator = validator()->make($request->all(), [
            'department_id' => 'required',
            'grade_id' => 'required',
            'subject_id' => 'required',
            'title' => 'required',
            'path' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $newAssignment = $request->user()->assignments()->create($request->all());
        return $this->apiResponse(1, '', $newAssignment);
    }

    public function studentsGrade(Request $request){
        $students = Student::where(function($query) use($request){
            if(($request->has('department_id')) and ($request->has('grade_id'))){
                $query->where('department_id', $request->department_id)->where('grade_id', $request->grade_id);
            }
        })->get()->load('marks.subject');
        return $this->apiResponse(1, '', $students);
    }

    public function studentsByGrade(Request $request){
        $students = Student::where(function($query) use($request){
            if(($request->has('department_id')) and ($request->has('grade_id'))){
                $query->where('department_id', $request->department_id)->where('grade_id', $request->grade_id);
            }
        })->get();
        return $this->apiResponse(1, '', $students);
    }

    public function addMarks(Request $request){
        $validator = validator()->make($request->all(), [
            'student_id' => 'required',
            'subject_id' => 'required',
            'attendance' => 'required',
            'work' => 'required',
            'midterm' => 'required',
            'semester' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $newMark = Mark::create($request->all());
        return $this->apiResponse(1, '', $newMark);
    }

    public function assignProf(){
        $assigns = auth()->user()->assignments->load('subject','grade','professor.department');
        return $this->apiResponse(1, '', $assigns);
    }


    public function sourceProf(){
        $source = auth()->user()->sources->load('subject','grade','professor.department');
        return $this->apiResponse(1, '', $source);
    }

    public function allDepartments(){
        $departments = Department::all();
        return $this->apiResponse(1,'',$departments);
    }

    public function allGrades(){
        $grades = Grade::all();
        return $this->apiResponse(1,'',$grades);
    }

    public function groupsProf(){
        $groups = Group::where('department_id', auth()->user()->department_id)->get();
        return $this->apiResponse(1,'',$groups);
    }

    public function groupForProf(){
        $posts = Post::where('group_id', request('group_id'))->orderBy('updated_at','desc')->get()->load('professor', 'student', 'comments.student','comments.replies.student');
        return $this->apiResponse(1,'',$posts);
        //return response()->json($object);
    }

    public function makePostForProf(Request $request){
        $validator = validator()->make($request->all(), [
            'body' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }
        //$validator->group_id = auth()->user()->group_id;
        $post = new Post();
        $post = $post->create($request->all());
        $post->group_id = request('group_id');
        $post->professor_id = auth()->user()->id;
        $post->save();
        return $this->apiResponse(1, 'Done', $post->load('professor'));
    }



    // ********************* API For Groups *********************

    public function posts(){
        $posts = Post::where('group_id', auth()->user()->group_id)->orderBy('updated_at','desc')->get()->load('professor', 'student', 'comments.student','comments.replies.student');
        //dd($posts->first()->comments()->count());
        //$comments = Comment::all();

        return $this->apiResponse(1,'',$posts);
        //return response()->json($object);
    }

    public function makePost(Request $request){
        $validator = validator()->make($request->all(), [
            'body' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }
        //$validator->group_id = auth()->user()->group_id;
        $post = new Post();
        $post = $post->create($request->all());
        $post->group_id = auth()->user()->group_id;
        $post->student_id = auth()->user()->id;
        $post->save();
        //$studentsIds = $newPost->group->students()->pluck('students.id')->toArray();
        //dd($studentsIds);
        return $this->apiResponse(1, 'Done', $post->load('student'));
        /*$students = Student::all()->where('group_id', $post->group_id);
        Notification::send($students, new MakePost($post));
        $notificationPost = auth()->user()->unreadNotifications;
        return $this->apiResponse(1, 'Done', $notificationPost);*/

//        dd(auth()->user()->unreadNotifications);
    }

    public function makeComment(Request $request){
        $validator = validator()->make($request->all(), [
            'body' => 'required',
            'post_id' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $comment = new Comment();
        $newComment = $comment->create($request->all());
        $newComment->student_id = auth()->user()->id;
        $newComment->save();
        return $this->apiResponse(1, 'Done', $newComment->load('student'));
    }

    public function post($id){
        $post = Post::find($id);
        return $this->apiResponse(1, 'Done', $post);

    }

    public function comments(){
        //$post = Post::find($id);
        $comments = Comment::where('post_id', request('post_id'))->get()->load('student', 'replies');
        return $this->apiResponse(1, 'Done', $comments);

    }

    public function makeReply(Request $request){
        $validator = validator()->make($request->all(), [
            'body' => 'required',
            'comment_id' => 'required'
        ]);

        if ($validator->fails()){
            return $this->apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $reply = new CommentReply();
        $newReply = $reply->create($request->all());
        $newReply->student_id = auth()->user()->id;
        $newReply->save();
        return $this->apiResponse(1, 'Done', $newReply->load('student'));
    }

    public function replies(){
        $replies = CommentReply::where('comment_id', request('comment_id'))->get()->load('student');
        //dd(gettype($replies));
        return $this->apiResponse(1, 'Done', $replies);
    }

    public function favorite(Request $request){
        $favorite = new Favorite();
        $favorite->student_id = auth()->user()->id;
        $favorite->post_id = $request->post_id;
        $favorite->favorite = !($favorite->favorite);
        $favorite->save();
        return $this->apiResponse(1, 'Done', $favorite);
    }


}
