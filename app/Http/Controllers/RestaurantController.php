<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all the restaurants
        $restaurants = Restaurant::all();

        // load the view and pass the restaurants
        return View::make('restaurants.index')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $rules = array(
            'name' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'suburb' => 'required',
            'state' => 'required',
            'numberofseats' => 'required',
            'country_id' => 'required',
            'category_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('restaurants/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else { 
            $restaurant = new Restaurant;
            $restaurant->name = Input::get('name');
            $restaurant->phone = Input::get('phone');
            $restaurant->address1 = Input::get('address1');
            $restaurant->address2 = Input::get('address2');
            $restaurant->suburb = Input::get('suburb');
            $restaurant->state = Input::get('state');
            $restaurant->numberofseats = Input::get('numberofseats');
            $restaurant->country_id = Input::get('country_id');
            $restaurant->category_id = Input::get('category_id');
            $restaurant->save();

            // redirect
            Session::flash('message', 'Successfully created restaurant');
            return Redirect::to('restaurants');
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
        // retrieve the order based on the id
        $restaurant = Restaurant::find($id);

        // show the view and pass the restaurant to it
        return View::make('restaurants.show')
            ->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // retrieve the restaurant
        $restaurant = Restaurant::find($id);

        // show the edit form and pass the restaurant
        return View::make('restaurants.edit')
            ->with('restaurant', $restaurant);
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
        // Validate
        $rules = array(
            'name' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'address2' => 'nullable',
            'suburb' => 'required',
            'state' => 'required',
            'numberofseats' => 'required',
            'category_id' => 'required',
            'country_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
        {
            return Redirect::to('restaurants/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else { 
            // store
            $restaurant = Restaurant::find($id);
            $restaurant->name = Input::get('name');
            $restaurant->phone = Input::get('phone');
            $restaurant->address1 = Input::get('address1');
            $restaurant->address2 = Input::get('address2');
            $restaurant->suburb = Input::get('suburb');
            $restaurant->state = Input::get('state');
            $restaurant->numberofseats = Input::get('numberofseats');
            $restaurant->category_id = Input::get('category_id');
            $restaurant->country_id = Input::get('country_id');
            $restaurant->save();

            // redirect
            Session::flash('message', 'Successfully created restaurant');
            return Redirect::to('restaurants');
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
        $restaurant = Restaurant::find($id);
        $restaurant->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Restaurant');

        return Redirect::to('restaurants');
    }

    public function restaurantwithposts($id)
    {
        $restaurant = Restaurant::find($id);
        return View::make('restaurants.restaurantwithposts')->with('restaurant', $restaurant);
    }
}
