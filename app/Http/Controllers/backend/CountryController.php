<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::all();
        if($request->has("search")):
            $countries = Country::where("name","like","%$request->search%")
            ->orwhere("country_code","like","%$request->search%")
            ->get();
        endif;
        return view("countries.index",compact("countries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("countries.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "country" => "required|max:30",
            "country_code" => "required|max:20",
        ]);
        $data = Country::create([
            "name" => $request['country'],
            "country_code" => $request['country_code'],
        ]);
        return redirect()->route("countries.index")->with("success","country has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
         return view("countries.edit",compact("country"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            "country" => "required|max:30",
            "country_code" => "required|max:20",
         ]);
        $country->update([
            "name" => $request['country'],
            "country_code" => $request['country_code'],
            ]);
        return redirect()->route("countries.index")->with("success","country has been updated.");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete(); 
        return redirect()->route("countries.index")->with("success","country has been deleted.");
    }
}
