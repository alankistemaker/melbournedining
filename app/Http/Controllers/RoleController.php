<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return View::make('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('roles.create');
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
            'id' => 'required|numeric',
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('roles/create')->withErrors($validator);
        } else {
            $role = new Role;
            $role->id = Input::get('id');
            $role->name = Input::get('name');
            $role->save();

            // redirect
            Session::flash('message', 'Successfully created role');
            return Redirect::to('roles');
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
        $role = Role::find($id);
        $users = User::pluck('name', 'id');

        return View::make('roles.show')
                ->with('role', $role)
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
        $role = Role::find($id);

        return View::make('roles.edit')
            ->with('role', $role);
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
            'id' => 'required|numeric',
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('roles/create')->withErrors($validator);
        } else {
            $role = Role::find($id);
            $role->id = Input::get('id');
            $role->name = Input::get('name');
            $role->save();

            // redirect
            Session::flash('message', 'Successfully created role');
            return Redirect::to('roles');
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
        $role = Role::find($id);
        $role->delete();

        // Redirect
        Session::flash('message', 'Successfully Deleted the Role');
        return Redirect::to('roles');
    }

    public function addUserToRole(Request $request, $id)
    {
        $role = Role::find($id);
        $user = User::find( Input::get('user_id') );

        if ($role == null and $user == null)
        {
            Session::flash('message', 'could not add role');
            return Redirect::to('categories');
        } 
        if ($user == null)
        {
            Session::flash('message', 'invalid user id');
            return Redirect::to('categories');
        } 
        if ($role == null)
        {
            Session::flash('messsage', 'invalid role id');
            return Redirect::to('categories');
        } else {
            // $role->users()->attach($user);
            // $role->save();
            $user->roles()->attach($role);
            $user->save();

            Session::flash('message', 'Successfully added ' . $role->name . ' to ' . $user->name);
            return Redirect::to('roles/' . $role->id)
                ->with('user', $user);
        }

      
    }
}
