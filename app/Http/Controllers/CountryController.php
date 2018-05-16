<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrive all the countries
        $countries = Country::all();

        // load the view and pass the countries
        return View::make('countries.index')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('countries.create');
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
            return Redirect::to('countries/create')->withErrors($validator);

        } else {
            $country = new Country;
            $country->name = Input::get('name');
            $country->save();

            // redirect
            Session::flash('message', 'Successfully created Country');
            return Redirect::to('countries');
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
        $country = Country::find($id);
        $users = User::pluck('name', 'id');

        // show the view and pass the country to it
        return View::make('countries.show')
            ->with('country', $country)
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
        // retrieve the country
        $country = Country::find($id);

        // show the edit form and pass the country
        return View::make('countries.edit')
            ->with('country', $country);
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
            return Redirect::to('countries/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $country = Country::find($id);
            $country->name = Input::get('name');
            $country->save();

            // redirect
            Session::flash('message', 'Successfully created country');
            return Redirect::to('countries');
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
        $country = Country::find($id);
        $country->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Country!');

        return Redirect::to('countries');
    }

    // used by the countries.show page to add users to the specified country
    public function addUserToCountry(Request $request, $id)
    {
        $user = User::find( Input::get('user_id') );
        $country = Country::find( $id );

        if ($user == null and $country == null)
        {
            Session::flash('message', 'User == null, Country == null');
            return Redirect::to('countries/' . $id);
        }
        if ($user == null)
        {
            Session::flash('message', 'User == null');
            return Redirect::to('countries/' . $id);
        }
        if ($country == null)
        {
            Session::flash('message', 'Country == null, User == ' . $user->id);
            return Redirect::to('countries/' . $id);
        } else {
            $user->country()->associate($country);
            $user->save();

            Session::flash('message', 'Successfully added ' . $user->name . ' to ' . $country->name);
            return Redirect::to('countries/' . $country->id)
                ->with('country', $country);
        }
    }
}
