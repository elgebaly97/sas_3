<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
use App\Models\Student;
use App\Notifications\MakePost;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return compact($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $post = new Post();
        $post->student_id = Auth::user()->id;
        $post->body = request('post-content');
        $post->group_id = Auth::user()->group_id;
        $post->save();
        /*$validator = request()->validate([
            'post-content' => 'required',
        ]);
             Post::create($validator);*/

        //$post->group->notify(new MakePost($post));
        $students = Student::all()->where('group_id', $post->group_id);
        Notification::send($students, new MakePost($post));
        return 'Post created';
    }

    public function storeProf(Group $group)
    {
        $post = new Post();
        $post->professor_id = Auth::user()->id;
        $post->body = request('post-content');
        $post->group_id = $group->id;
        $post->save();
        dd($post->professor->name);
        /*$validator = request()->validate([
            'post-content' => 'required',
        ]);
             Post::create($validator);*/

        //$post->group->notify(new MakePost($post));
        $students = Student::all()->where('group_id', $post->group_id);
        Notification::send($students, new MakePost($post));
        return 'Post created';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
