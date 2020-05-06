<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Session;

class UsersController extends Controller
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
    public function publicIndex()
	{
        if (Session::get('username') == "") return Redirect::to("/");
		$users = User::all();
        return view('musician-dashboard/musicianpage', ['username' => $users]);
    }
    

    public function login(Request $request) {
			
        $user = User::all()->where('username', $request->input("username"))->where('password', $request->input("password"));
        $count = $user->count();
        
        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Password');
        } else {
            
            $request->session()->put('username', $request->input("username"));
            $request->session()->put('id', $user->first()->id);
        
            return view('musician-dashboard/musicianpage');
            
        }
    }

    public function logout(Request $request) {
			
        $request->session()->forget('username');
        $request->session()->forget('password');
        return Redirect::to(".");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
