<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return View::make('comments.index')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('name', 'id');
        $posts = Post::all()->pluck('content', 'id');

        return View::make('comments.create')
                ->with('users', $users)
                ->with('posts', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        $validated = $request->validated();

        $comment = new Comment;
        $comment->id = Input::get('id') . Input::get('post_id');
        $comment->content = Input::get('content');
        $comment->post_id = Input::get('post_id');
        $comment->user_id = Input::get('user_id');
        $comment->save();

        // redirect
        Session::flash('message', 'Successfully created comment');
        return Redirect::to('comments');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return View::make('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        $users = User::all()->pluck('name', 'id');
        $posts = Post::all()->pluck('content', 'id');

        return View::make('comments.edit')
                ->with('comment', $comment)
                ->with('posts', $posts)
                ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request, $id)
    {
        $validated = $request->validated();

        $comment = Comment::find($id);
        $comment->id = Input::get('id');
        $comment->content = Input::get('content');
        $comment->post_id = Input::get('post_id');
        $comment->user_id = Input::get('user_id');
        $comment->save();

        // redirect
        Session::flash('message', 'Successfully created comment');
        return Redirect::to('comments');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        Session::flash('message', 'Successfully deleted Comment');
        return Redirect::to('comments');
    }

    public function commentGivenPostID($id)
    {
        $post = Post::find($id);
        return View::make('comments.commentgivenpostid')->with('post', $post);
    }
}
