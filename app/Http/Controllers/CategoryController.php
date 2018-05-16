<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Restaurant;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
// use Illuminate\Log\LogManager;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve all categories
        $categories = Category::all();

        // load the view and pass the categories
        return View::make('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('categories.create');
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
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('categories/create')->withErrors($validator);
        } else {
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully created Category');
            return Redirect::to('categories');
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
        // retrieve the country based on the id
        $category = Category::find($id);
        $restaurants = Restaurant::pluck('name', 'id');

        // show the view and pass the country to it
        return View::make('categories.show')
            ->with('category', $category)
            ->with('restaurants', $restaurants);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // retrieve the category
        $category = Category::find($id);

        // show the edit form and pass the country
        return View::make('categories.edit')
            ->with('category', $category);
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
        $rules = array(
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails())
        {
            return Redirect::to('categories/' . $id . '/edit')->withErrors($validator);
        } else {
            // store
            $category = Category::find($id);
            $category->name = Input::get('name');
            $category->save();

            // redirect
            Session::flash('message', 'Successfully created category');
            return Redirect::to('categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Category!');

        return Redirect::to('categories');
    }

    public function addRestaurants(Request $request, $id)
    {
        $restaurant = Restaurant::find( Input::get('restaurant_id') );
        //$category = Category::find( Input::get('category_id') );
        $category = Category::find( $id );
        if ($restaurant == null and $category == null)
        {
            Session::flash('message', 'could not add restaurant');
            return Redirect::to('categories');
        } 
        if ($category == null)
        {
            Session::flash('message', 'invalid category id');
            return Redirect::to('categories');
        } 
        if ($restaurant == null)
        {
            Session::flash('messsage', 'invalid rest id');
            return Redirect::to('categories');
        } else {
            $restaurant->category()->associate($category);
            $restaurant->save();

            Session::flash('message', 'Successfully added ' . $restaurant->name . ' to ' . $category->name);
            return Redirect::to('categories/' . $category->id)
                ->with('category', $category);
        }
    }
}
