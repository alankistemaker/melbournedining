<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Restaurant;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

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

        return View::make('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return View::make('posts.create')
                ->with('restaurants', $restaurants)
                ->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'id' => 'required',
            'content' => 'required',
            'restaurant_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('posts/create')->withErrors($validator);
        } else {
            $post = new Post;
            $post->id = Input::get('id');
            $post->content = Input::get('content');
            $post->restaurant_id = Input::get('restaurant_id');
            $post->user_id = Input::get('user_id');
            $post->save();

            // redirect
            Session::flash('message', 'Successfully created Post');
            return Redirect::to('posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;

        return View::make('posts.show')
            ->with('post', $post)
            ->with('comments', $comments);
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

    public function postwithcomments($id)
    {
        $post = Post::find($id);
        return View::make('posts.postwithcomments')->with('post', $post);
    }
}
