<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        if($request->has("search")):
            $cities = City::where("name","like","%$request->search%")
            ->get();
        endif;
        return view("cities.index",compact("cities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view("cities.create",compact("states"));
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
            "city" => "required|max:30",
            "state" => "required|max:20",
        ]);
        $data = City::create([
            "name" => $request['city'],
            "state_id" => $request['state'],
        ]);
        return redirect()->route("cities.index")->with("success","city has been created.");
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
    public function edit(City $city)
    {
        $states = State::all();
        return view("cities.edit",compact("city","states"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,City $city)
    {
       $request->validate([
            "city" => "required|max:30",
            "state" => "required|max:20",
       ]);
       $city->update([
            "name" => $request['city'],
            "state_id" => $request['state'],
       ]);
       return redirect()->route("cities.index")->with("success","city has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route("cities.index")->with("success","city has been deleted.");
    }
}
