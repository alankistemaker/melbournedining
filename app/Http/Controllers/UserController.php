<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Country;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve all the users
        $users = User::all();

        // load the view and pass the users
        return View::make('users.index') ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');
        return View::make('users.create')
                ->with('roles', $roles)
                ->with('countries', $countries);
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
            'email' => 'required',
            'password' => 'nullable',
            'country_id' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else {
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->country_id = Input::get('country_id');
            $user->save();
            $user->roles()->attach(Input::get('roles'));

            // redirect
            Session::flash('message', 'Successfully created user');
            return Redirect::to('users');
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
        // retrieve the user based on the id
        $user = User::find($id);

        // show the view and pass the user to it
        return View::make('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // retreive the user
        $user = User::find($id);
        $countries = Country::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');
        
        // show the edit form and pass the user
        return View::make('users.edit')
                ->with('roles', $roles)
                ->with('countries', $countries)
                ->with('user', $user);
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
        // validate
        $rules = array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'country_id' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails())
        {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Input::get('password');
            $user->country_id = Input::get('country_id');
            $user->roles()->attach(Input::get('roles'));
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created user');
            return Redirect::to('users');
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
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the User');

        return Redirect::to('users');
    }
}
