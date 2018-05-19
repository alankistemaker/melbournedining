<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Restaurant;

// you have to do this one
class CUDPostBasedOnRestaurantAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
    public function store(StorePost $request)
    {
        // find the restaurant given its id
        $restaurant = Restaurant::find($request['id']);

        // create new post
        // $post = Post::create($request->all());
        $post = new Post;
        $post->id = $request['id'] . $request['user_id'];
        $post->content = $request['content'];
        $post->restaurant_id = $request['id'];
        $post->user_id = $request['user_id'];

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StorePost $request)
    {
        $validator = $request->validated();
        $restaurant = Restaurant::find($request['id']);
        $posts = $restaurant->posts;
        return response()->json($posts, 200);
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
    public function update(StorePost $request, $id)
    {
        $validator = $request->validated();
        $post = Post::find($request['id']);
        $post->update($request->all());
        return response()->json($post, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $post = Post::find($request['id']);
        $post->delete();
        return response()->json(null, 204);
    }
}
