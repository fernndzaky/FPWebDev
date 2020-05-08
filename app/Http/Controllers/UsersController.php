<?php

namespace App\Http\Controllers;

use App\User;
use App\Detail;
use Carbon\Traits\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

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
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } 
		
        return view('musician-dashboard/musicianpage');

    }

    public function publicIndex2()
	{
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } 
		
        return view('band-dashboard/bandpage');

    }
    

    public function login(Request $request) {
        
        $users = User::all()->where('username', $request->input("username"))->where('password', $request->input("password"))->where('type_id', 1);
        $count = $users->count();

        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Password');
        } else {
            $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                ,'regions.region_name','instruments.instrument_name'
                                ,'details.description','status.status_name')
                        ->where('username',$request->input("username"))
                        -> get();
            
            foreach ($data as $dat) {
                $name = $dat->name;
                $instrument_name = $dat->instrument_name;
                $genre_name = $dat->genre_name;
                $region_name = $dat->region_name;
                $dp_url = $dat->dp_url;
                $description = $dat->description;
                $status_name = $dat->status_name;
            }
            Session::put('name',$name);
            Session::put('instrument',$instrument_name);
            Session::put('genre',$genre_name);
            Session::put('region',$region_name);
            Session::put('dp_url',$dp_url);
            Session::put('description',$description);
            Session::put('status',$status_name);
            Session::put('login',TRUE);
            Session::put('username',$request->input("username"));

            return view('musician-dashboard/musicianpage');
        }
    }

    public function loginBand(Request $request) {
        
        $users = User::all()->where('username', $request->input("username"))->where('password', $request->input("password"))->where('type_id', 2);
        $count = $users->count();

        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Passwords');
        } else {
            $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                ,'regions.region_name','instruments.instrument_name'
                                ,'details.description','status.status_name')
                        ->where('username',$request->input("username"))
                        -> get();
            
            foreach ($data as $dat) {
                $name = $dat->name;
                $instrument_name = $dat->instrument_name;
                $genre_name = $dat->genre_name;
                $region_name = $dat->region_name;
                $dp_url = $dat->dp_url;
                $description = $dat->description;
                $status_name = $dat->status_name;
            }
            Session::put('name',$name);
            Session::put('instrument',$instrument_name);
            Session::put('genre',$genre_name);
            Session::put('region',$region_name);
            Session::put('dp_url',$dp_url);
            Session::put('description',$description);
            Session::put('status',$status_name);
            Session::put('login',TRUE);
            Session::put('username',$request->input("username"));

            return view('band-dashboard/bandpage');
        }
    }

    public function logout(Request $request) {
        Session::flush();
        
		$request->session()->regenerate();	
        $request->session()->flush();
        return Redirect::to(".");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function store1(Request $request)
    {
        $genres = DB::table('genres')->get();
        $region = DB::table('regions')->get();
        $instrument = DB::table('instruments')->get();
        $request->session()->put('usernames', $request->input("username"));
        $request->session()->put('types', 1);
        $request->session()->put('passwords', $request->input("password"));
        $request->session()->put('phones', $request->input("phone"));     
        return view('/signup-musician-2', compact('genres','instrument','region'));

    }
    
    public function store2(Request $request)
    {   
        $request->session()->put('dp_urls', 'new.png' );
        $request->session()->put('names', $request->input("name"));
        $request->session()->put('genres', $request->input("genre"));
        $request->session()->put('regions', $request->input("region"));   
        $request->session()->put('instruments', $request->input("instrument"));   
        $request->session()->put('descriptions', $request->input("description"));   
        $request->session()->put('statuss', 8 );

        $detail = new Detail;
        $detail->dp_url =  $request->session()->get('dp_urls');
        $detail->name =  $request->session()->get('names');
        $detail->genre_id =  $request->session()->get('genres');
        $detail->region_id =  $request->session()->get('regions');
        $detail->instrument_id =  $request->session()->get('instruments');
        $detail->description =  $request->session()->get('descriptions');
        $detail->status_id =  $request->session()->get('statuss');

        $detail->save();
        $detail_ids = DB::table('details')->get()->last()->detail_id;

        $request->session()->put('detail_ids', $detail_ids);
        User::create([
            'type_id' => $request->session()->get('types'),
            'username' => $request->session()->get('usernames'),
            'password' => $request->session()->get('passwords'),
            'phone' => $request->session()->get('phones'),
            'detail_id' => $request->session()->get('detail_ids')
        ]);

        return view('/signin-musician');
    }
    public function store3(Request $request)
    {
        $genres = DB::table('genres')->get();
        $region = DB::table('regions')->get();
        $instrument = DB::table('instruments')->get();
        $request->session()->put('types', 2);
        $request->session()->put('usernames', $request->input("username"));
        $request->session()->put('passwords', $request->input("password"));
        $request->session()->put('phones', $request->input("phone"));     
        return view('/signup-band-2', compact('genres','instrument','region'));

    }

    public function store4(Request $request)
    {   
        $request->session()->put('dp_urls', 'new.png' );
        $request->session()->put('names', $request->input("name"));
        $request->session()->put('genres', $request->input("genre"));
        $request->session()->put('regions', $request->input("region"));   
        $request->session()->put('instruments', 1);   
        $request->session()->put('descriptions', $request->input("description"));   
        $request->session()->put('statuss', 7 );

        $detail = new Detail;
        $detail->dp_url =  $request->session()->get('dp_urls');
        $detail->name =  $request->session()->get('names');
        $detail->genre_id =  $request->session()->get('genres');
        $detail->region_id =  $request->session()->get('regions');
        $detail->instrument_id =  $request->session()->get('instruments');
        $detail->description =  $request->session()->get('descriptions');
        $detail->status_id =  $request->session()->get('statuss');

        $detail->save();
        $detail_ids = DB::table('details')->get()->last()->detail_id;

        $request->session()->put('detail_ids', $detail_ids);
        User::create([
            'type_id' => $request->session()->get('types'),
            'username' => $request->session()->get('usernames'),
            'password' => $request->session()->get('passwords'),
            'phone' => $request->session()->get('phones'),
            'detail_id' => $request->session()->get('detail_ids')
        ]);

        return view('/signin-band');
    }

    public function findMusician1(Request $request){
        $regions = DB::table('regions')->get();
        $instruments = DB::table('instruments')->get();    
        $genres = DB::table('genres')->get();    
        return view('band-dashboard/bandfind', compact('genres','instruments','regions'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
