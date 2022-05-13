<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::all();
        if($request->has("search")):
            $users = User::where("username","like","%$request->search%")
            ->orwhere("email","like","%$request->search%")
            ->get();
        endif;
        return view("users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
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
            "username" => "required|max:12",
            "first_name" => "required|max:20",
            "last_name" => "required|max:20",
            "password" =>"required|max:15",
            "email" => "required|max:30|email|unique:users",
        ]);
        $data = User::create([
            "username" => $request['username'],
            "first_name" => $request['first_name'],
            "last_name" => $request['last_name'],
            "email" => $request['email'],
            "password" => Hash::make($request["password"]),
        ]);
        return redirect()->route("users.index")->with("success","user has been created.");
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
    public function edit(User $user)
    {
        // $admin = User::FindorFail($user);
        return view("users.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "username" => "required|max:12",
            "first_name" => "required|max:20",
            "last_name" => "required|max:20",
            "email" => "required|max:30|email",
        ]);
        $user->update([
            "username" => $request['username'],
            "first_name" => $request['first_name'],
            "last_name" => $request['last_name'],
            "email" => $request['email'],
        ]);
        return redirect()->route("users.index")->with("success","user has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->id == auth()->user()->id):
            return redirect()->route("users.index")->with("success","You cant delete yourself.");
        endif;
        $user->delete();
        return redirect()->route("users.index")->with("success","user has been deleted.");
    }
}
