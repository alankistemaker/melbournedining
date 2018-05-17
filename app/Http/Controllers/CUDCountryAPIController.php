<?php

// you have to do this one
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CUDCountryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //
    }

  turn Country::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
     * Show t form forcreating a newr e    }

    /**
     * Show the form for creating a new re
    /**
     * Shothefrm for rresourcg a ne ountry = Country::create($request->all());

        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    puble.
     *
     * @return\IlluminaeHttp\Rthe form for creating a new resource.
     *
     * @return \Illuminate\Http\Re frm for ceating a nerw function show($id)
    {
        $country = Country::find($request['id']);
        return response()->json($order, 201);
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
 source.
     *
   * @rturn \Illmnaiuetfor creating a new resource.
     *
     * @return \Illuminatr ceating anew resource. 
   public function update(Request $request, $id)
    {
        $country = Country::find($request['id']);
        return response()->json($country, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @
     *
     * @return \lluminateHtp\RIelluminate\Http\Relureturn \Illureturn \Illumnat\Http\Reponse
  s turn \Illuminate\Http\Response
     */
    public function destroy($id)
