<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Traits\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Session;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
    }
    public function publicIndex()
	{
        if (Session::get('username') == "") return view('/');
		$users = User::all();
        return view('about', ['username' => $users]);
    }
    

    public function login(Request $request) {
        
			
        $users = User::all()->where('username', $request->input("username"))->where('password', $request->input("password"));
        $count = $users->count();
        
        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Password');
        } else {
            
            $request->session()->put('username', $request->input("username"));
            $request->session()->put('id', $users->first()->id);
            $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                    ,'regions.region_name','instruments.instrument_name'
                                    ,'details.description','status.status_name')
                        -> get();

            foreach ($data as $data) {
                $request->session()->put('name', $data->name );
                $request->session()->put('instrument', $data->instrument_name );
                $request->session()->put('genre', $data->genre_name );
                $request->session()->put('region', $data->region_name );
                $request->session()->put('dp_url', $data->dp_url );
                $request->session()->put('description', $data->description );
                $request->session()->put('status', $data->status_name );
            }

            return view('musician-dashboard/musicianpage', compact('data'));
            

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
