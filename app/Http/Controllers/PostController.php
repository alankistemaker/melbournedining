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

use App\Http\Requests\StorePost;

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
    public function store(StorePost $request)
    {
        $validated = $request->validated();

        $post = new Post;
        $post->id = Input::get('restaurant_id') . Input::get('user_id');
        $post->content = Input::get('content');
        $post->restaurant_id = Input::get('restaurant_id');
        $post->user_id = Input::get('user_id');
        $post->save();

        // redirect
        Session::flash('message', 'Successfully created Post');
        return Redirect::to('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::pluck('name', 'id');
        $post = Post::find($id);
        // $comments = $post->comments;

        return View::make('posts.show')
            ->with('post', $post)
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // retrieve the post
        $post = Post::find($id);
        $restaurants = Restaurant::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        // show the edit form and pass the post
        return View::make('posts.edit')
            ->with('post', $post)
            ->with('restaurants', $restaurants)
            ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $validated = $request->validated();
        
        $post = Post::find($id);
        $post->id = Input::get('restaurant_id') . Input::get('user_id');
        $post->content = Input::get('content');
        $post->restaurant_id = Input::get('restaurant_id');
        $post->user_id = Input::get('user_id');
        $post->save();

        // redirect
        Session::flash('message', 'Successfully created Post');
        return Redirect::to('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the post');
        return Redirect::to('posts');
    }

    public function postwithcomments($id)
    {
        $post = Post::find($id);
        return View::make('posts.postwithcomments')->with('post', $post);
    }

    public function createpostwithrestid($id)
    {
        $restaurant = Restaurant::find($id);
        $users = User::pluck('name', 'id');

        return View::make('posts.createpostwithrestid')
            ->with('restaurant', $restaurant)
            ->with('users', $users);
    }
}
