<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware("auth");
    }
    public function index(Request $request)
    {
        if($request->has("search")):
            $states = State::where("name","like","%$request->search%")
            ->get();
        endif;
        $states = State::all();
        return view("states.index",compact("states"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view("states.create",compact("countries"));
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
            "state" => "required|max:12",
            "country" => "required|max:20",
        ]);
        $data = State::create([
            "name" => $request['state'],
            "country_id" => $request['country'],
        ]);
        return redirect()->route("states.index")->with("success","state has been created.");
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
     public function edit(State $state)
     {
        $countries = Country::all();
        return view("states.edit",compact("state","countries"));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,State $state)
    {
    $request->validate([
        "country" => "required|max:30",
        "state" => "required|max:20",
    ]);
    $state->update([
        "name" => $request['state'],
        "country_id" => $request['country'],
    ]);
    return redirect()->route("states.index")->with("success","state has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
