<?php

namespace App\Http\Controllers;

use App\User;
use App\Detail;
use App\Application;
use Carbon\Traits\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
		else{

            return view('musician-dashboard/musicianpage');
        }

    }

    public function publicIndex2()
	{
        if (Session::get('username') == ""){
            return Redirect::to("/");
        }
		else{
            return view('band-dashboard/bandpage');
        }
    }

    public function publicIndexSignUp() {
        
        
            return Redirect::to("/");
        
    }

    public function publicIndexSignUp2() {
        
        if (Session::get('username') == ""){
            return view('signup');
        } 
		else{
            return Redirect::to("/");
        }
        
        
}

public function publicIndexSignUp3() {
        
    if (Session::get('username') == ""){
        return view('signup-musician');
    } 
    else{
        return Redirect::to("/");
    }
 
}

public function publicIndexSignUp4() {
        
    if (Session::get('username') == ""){
        return view('signup-band');
    } 
    else{
        return Redirect::to("/");
    }
 
}


public function publicIndexAbout() {
        
    if (Session::get('username') == ""){
        return view('/about');
    } 
    else{
        return Redirect::to("/");
    }
 
}

    

    public function statusIndex2() {
    if (Session::get('username') == ""){
        return Redirect::to("/");
    } else{
    return view('musician-dashboard/musicianstatus');
    }
    }


    public function statusIndex() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('band-dashboard/bandstatus');
        }
        }

    public function findbandIndex1() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('musician-dashboard/musicianfindband');
        }
    }

    public function findbandIndex2() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('musician-dashboard/musicianfindband');
        }
    }

    public function findbandIndex3() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('musician-dashboard/successmusician');
        }
    }

    public function findbandIndex4() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('band-dashboard/bandfind');
        }
    }

    public function findbandIndex5() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('band-dashboard/bandmatchlist');
        }
    }

    public function findbandIndex6() {
        if (Session::get('username') == ""){
            return Redirect::to("/");
        } else{
        return view('band-dashboard/bandsuccess');
        }
    }


    public function login(Request $request) {
        $username = Str::lower($request->input("username"));
        $password = $request->input("password");

        $users = User::all()->where('username',  $username)->where('type_id', 1);
        $count = $users->count();
        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Passwords');
            }
            else{
            $data = DB::table('users')
                    ->where('username',$username)
                        -> get();
            foreach ($data as $data) {
                $hashed_pw = $data->password;
            }
            
            if(Hash::check($password, $hashed_pw)){
                $data = DB::table('users')
                -> join('details','details.detail_id','=','users.detail_id')
                -> join('genres','genres.genre_id','=','details.genre_id')
                -> join('regions','regions.region_id','=','details.region_id')
                -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                -> join('status','status.status_id','=','details.status_id')
                -> select('details.detail_id','details.dp_url','details.name','genres.genre_name'
                        ,'regions.region_name','instruments.instrument_name','instruments.instrument_id'
                        ,'details.description','status.status_name','status.status_id')
                ->where('username',$request->input("username"))
                -> get();
    
                foreach ($data as $dat) {
                    $name = $dat->name;
                    $detail_id = $dat->detail_id;
                    $instrument_name = $dat->instrument_name;
                    $instrument_id = $dat->instrument_id;
                    $genre_name = $dat->genre_name;
                    $region_name = $dat->region_name;
                    $dp_url = $dat->dp_url;
                    $description = $dat->description;
                    $status_name = $dat->status_name;
                    $status_id = $dat->status_id;
                }
                Session::put('name',$name);
                Session::put('detail_id',$detail_id);
                Session::put('instrument',$instrument_name);
                Session::put('instrument_id',$instrument_id);
                Session::put('genre',$genre_name);
                Session::put('region',$region_name);
                Session::put('dp_url',$dp_url);
                Session::put('description',$description);
                Session::put('status',$status_name);
                Session::put('status_id',$status_id);
                Session::put('username',$request->input("username"));
                Session::put('user_type',$request->input("musician"));
                return view('musician-dashboard/musicianpage');

        }
    }
    }
        
  

    public function loginBand(Request $request) {
        // $username = Str::lower($request->input("username"));

        // $users = User::all()->where('username', $username)->where('password', $request->input("password"))->where('type_id', 2);
        // $count = $users->count();

        $username = Str::lower($request->input("username"));
        $password = $request->input("password");

        $users = User::all()->where('username',  $username)->where('type_id', 2);
        $count = $users->count();

        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Passwords');
            }
            else{
                $data = DB::table('users')
                ->where('username',$username)
                    -> get();
                foreach ($data as $data) {
                    $hashed_pw = $data->password;
                }
        
                if(Hash::check($password, $hashed_pw)){
                    $data = DB::table('users')
                    -> join('details','details.detail_id','=','users.detail_id')
                    -> join('genres','genres.genre_id','=','details.genre_id')
                    -> join('regions','regions.region_id','=','details.region_id')
                    -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                    -> join('status','status.status_id','=','details.status_id')
                    -> select('details.detail_id','details.dp_url','details.name','genres.genre_name'
                            ,'regions.region_name','instruments.instrument_name'
                            ,'details.description','status.status_name','status.status_id')
                    ->where('username',$request->input("username"))
                    -> get();
                    
                    foreach ($data as $dat) {
                        $name = $dat->name;
                        $detail_id = $dat->detail_id;
                        $instrument_name = $dat->instrument_name;
                        $genre_name = $dat->genre_name;
                        $region_name = $dat->region_name;
                        $dp_url = $dat->dp_url;
                        $description = $dat->description;
                        $status_name = $dat->status_name;
                        $status_id = $dat->status_id;
                    }
                    Session::put('name',$name);
                    Session::put('detail_id',$detail_id);
                    Session::put('instrument',$instrument_name);
                    Session::put('genre',$genre_name);
                    Session::put('region',$region_name);
                    Session::put('dp_url',$dp_url);
                    Session::put('description',$description);
                    Session::put('status',$status_name);
                    Session::put('status_id', $status_id);
                    Session::put('username',$request->input("username"));
                    Session::put('user_type',$request->input("band"));
                //    echo"test";
                    return view('band-dashboard/bandpage');
                }
    }
    }

    public function logout(Request $request) {
        Session::flush();
		$request->session()->regenerate();	
        // $request->session()->flush();
        return Redirect::to(".");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        // return view('musician-dashboard/musicianstatus', compact('user'));

        
    }

    public function store1(Request $request)
    {
        //VALIDATIONS
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
        ]);
        // END OF VALIDATIONS
        $genres = DB::table('genres')->get();
        $region = DB::table('regions')->get();
        $instrument = DB::table('instruments')->get();
        $request->session()->put('usernames', Str::lower($request->input("username")));
        $request->session()->put('types', 1);
        $request->session()->put('passwords', $request->input("password"));
        $request->session()->put('phones', $request->input("phone"));     
        

        return view('/signup-musician-2', compact('genres','instrument','region'));
    }
    
    public function store2(Request $request)
    {   
        $request->validate([
        'name' => 'required',
        'description' => 'required'
        ]);
        
        //END OF VALIDATIONS
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
        

        $detail->dp_url =  $request->session()->get('dp_urls');
        $detail_ids = DB::table('details')->get()->last()->detail_id;

        $request->session()->put('detail_ids', $detail_ids);
        User::create([
            'type_id' => $request->session()->get('types'),
            'username' => $request->session()->get('usernames'),
            'password' => Hash::make($request->session()->get('passwords')),
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
        $request->session()->put('usernames', Str::lower($request->input("username")));
        $request->session()->put('passwords', $request->input("password"));
        $request->session()->put('phones', $request->input("phone"));     
        //VALIDATIONS
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
        ]);
        // END OF VALIDATIONS
        return view('/signup-band-2', compact('genres','instrument','region'));
    }

    public function store4(Request $request)
    {   
        //END OF VALIDATIONS
        $request->session()->put('dp_urls', 'new.png' );
        $request->session()->put('names', $request->input("name"));
        $request->session()->put('genres', $request->input("genre"));
        $request->session()->put('regions', $request->input("region"));   
        $request->session()->put('instruments', 6);   
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
            'password' => Hash::make($request->session()->get('passwords')),
            'phone' => $request->session()->get('phones'),
            'detail_id' => $request->session()->get('detail_ids')
        ]);
        $request->validate([
            'name' => 'required|',
            'description' => 'required'
        ]);
        return view('/signin-band');
    }

    public function findMusician1(Request $request){
        $regions = DB::table('regions')->get();
        $instruments = DB::table('instruments')->get();    
        $genres = DB::table('genres')->get();
       
 
        return view('band-dashboard/bandfind', compact('genres','instruments','regions'));
    }

    public function findBand1(Request $request){
        $regions = DB::table('regions')->get();
        $genres = DB::table('genres')->get();    
        return view('musician-dashboard/musicianfindband', compact('genres','regions'));
    }

    public function findMusician2(Request $request){

        $region = $request->input("region");
        $genre = $request->input("genre");
        $instrument = $request->input("instrument");
        
        $musicians = DB::table('details')
            -> join('users','users.detail_id','=','details.detail_id')
            ->where('genre_id',$genre)
            ->where('instrument_id',$instrument)
            ->where('region_id',$region)
            ->where('type_id',1)
            ->where('details.status_id',6)

            ->get();
            $sent_from = $request->session()->get('detail_id');
       
            foreach ($musicians as $node){
    
                $sent_to = $node->detail_id;      
                $applications = Application::all()->where('sent_from', $sent_from)->where('sent_to', $sent_to);
                
                $count = $applications->count();
                if ($count > 0) {
                    $musicians = $musicians->where('detail_id', '!=', $sent_to);
                }
            }
            $count = $musicians->count();
            return view('band-dashboard/bandmatchlist', compact('musicians','count'));

    }

    public function findBand2(Request $request){

        $region = $request->input("region");
        $genre = $request->input("genre");
        $status_id = $request->session()->get('instrument_id');
        
        $bands = DB::table('details')
            -> join('users','users.detail_id','=','details.detail_id')
            // -> join('applications','applications.sent_from','=',$request->session()->get('detail_id'))
            ->where('genre_id',$genre)
            ->where('region_id',$region)
            ->where('users.type_id',2)
            ->where('details.status_id',$status_id)
            ->get();
        $sent_from = $request->session()->get('detail_id');
        // echo $bands,"<br>";
        foreach ($bands as $node){

            $sent_to = $node->detail_id; 
            // echo "sent_from",$sent_from,"<br>";
            // echo "sent_to",$sent_to,"<br>";
            $applications = Application::all()->where('sent_from', $sent_from)->where('sent_to', $sent_to);
            // echo $applications;
            $count = $applications->count();
            if ($count > 0) {
                $bands = $bands->where('detail_id', '!=', $sent_to);
                // echo "found sent from ",$sent_from," to ",$sent_to;
            }
        }
        $count = $bands->count();
        // return dump ($bands);
        return view('musician-dashboard/musicianmatchlist', compact('bands','count'));
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
    public function show($detail_id)
    {
        $users = Detail::all()->where('detail_id',  $detail_id);
        $count = $users->count();
        if($count == 0){
            return Redirect::to("/");
        }
        else{
        $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                ,'regions.region_name','instruments.instrument_name'
                                ,'details.description','status.status_name','users.type_id')
                        ->where('details.detail_id', $detail_id)
                        -> get();

        foreach($data as $data){
            $type_id = $data->type_id;
        }
        if($type_id == 1){
            return Redirect::to("/");
        }
        $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                ,'regions.region_name','instruments.instrument_name'
                                ,'details.description','status.status_name','users.type_id')
                        ->where('details.detail_id', $detail_id)
                        -> get();
        
            return view('musician-dashboard/bandprofile',compact('data'));

        
                        // return view('musician-dashboard/bandprofile',compact('data'));

                    }
                }
    public function show2($detail_id)
    {
        $users = Detail::all()->where('detail_id',  $detail_id);
        $count = $users->count();
        if($count == 0){
            return Redirect::to("/");
        }
        else{

      
        $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                ,'regions.region_name','instruments.instrument_name'
                                ,'details.description','status.status_name','users.type_id')
                        ->where('details.detail_id', $detail_id)
                        -> get();

    foreach($data as $data){
        $type_id = $data->type_id;
    }
    if($type_id == 2){
        return Redirect::to("/");
    }
    $data = DB::table('users')
                        -> join('details','details.detail_id','=','users.detail_id')
                        -> join('genres','genres.genre_id','=','details.genre_id')
                        -> join('regions','regions.region_id','=','details.region_id')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('status','status.status_id','=','details.status_id')
                        -> select('details.dp_url','details.name','genres.genre_name'
                                ,'regions.region_name','instruments.instrument_name'
                                ,'details.description','status.status_name','users.type_id')
                        ->where('details.detail_id', $detail_id)
                        -> get();
    return view('band-dashboard/musicianprofile',compact('data'));

    // return view('band-dashboard/musicianprofile',compact('data'));
    }
}
    public function apply(Request $request)
    {
        $services = $request->input('appliedbands');
        for($i=0;$i<sizeof($services); $i++) {
         
            $apply = new Application;
            $apply->sent_from =  $request->session()->get('detail_id');
            $apply->sent_to = $services[$i];
            $apply->application_status =  "Applied";
            $apply->save();

        }
        return view('band-dashboard/bandsuccess');

    }

    public function apply2(Request $request)
    {
        
        $services = $request->input('appliedBands');
        
       
        for($i=0;$i<sizeof($services); $i++) {
         
            $apply = new Application;
            $apply->sent_from =  $request->session()->get('detail_id');
            $apply->sent_to = $services[$i];
            $apply->application_status =  "Applied";
            $apply->save();

        }
        return view('musician-dashboard/successmusician');
        
    }

    public function showApplications(Request $request){
        if (Session::get('username') == ""){ 
            return Redirect::to("/");
        }
		else {

       
        $sent_from = DB::table('applications')
                        -> join('details','details.detail_id','=','applications.sent_to')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('users','users.detail_id','=','details.detail_id')

                        -> select('applications.application_id','details.name','instruments.instrument_name'
                                ,'applications.application_status','users.phone')
                        ->where('applications.sent_from', $request->session()->get('detail_id'))
                        ->orderBy('applications.application_id','DESC')

                        -> get();

        $sent_to = DB::table('applications')
                        -> join('details','details.detail_id','=','applications.sent_from')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('users','users.detail_id','=','details.detail_id')

                        -> select('applications.application_id','details.name','instruments.instrument_name'
                                ,'applications.application_status','users.phone')

                        ->where('applications.sent_to', $request->session()->get('detail_id'))
                        ->orderBy('applications.application_id','DESC')

                        -> get();
        return view('band-dashboard/applicationband', compact('sent_from','sent_to'));
    }
    }

    public function showApplications2(Request $request){
        if (Session::get('username') == ""){ 
            return Redirect::to("/");

        }
		else {
        $sent_from = DB::table('applications')
                        -> join('details','details.detail_id','=','applications.sent_to')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('users','users.detail_id','=','details.detail_id')
                        -> select('applications.application_id','details.name','instruments.instrument_name'
                                ,'applications.application_status','users.phone')
                        ->where('applications.sent_from', $request->session()->get('detail_id'))
                        ->orderBy('applications.application_id','DESC')
                        -> get();

        $sent_to = DB::table('applications')
                        -> join('details','details.detail_id','=','applications.sent_from')
                        -> join('instruments','instruments.instrument_id','=','details.instrument_id')
                        -> join('users','users.detail_id','=','details.detail_id')

                        -> select('applications.application_id','details.name','instruments.instrument_name'
                                ,'applications.application_status','users.phone')
                        ->where('applications.sent_to', $request->session()->get('detail_id'))
                        ->orderBy('applications.application_id','DESC')

                        -> get();
        return view('musician-dashboard/applicationmusician', compact('sent_from','sent_to'));
        }
    }

    public function updateAppStatus(Request $request, $application_id){
        // $page = Application::all()->where('application.id',1);
        
        
        $users = DB::table('applications')->where('application_id',$application_id)->get();
        foreach ($users as $users) {
            $sent_from = $users->sent_from;
            $sent_to = $users->sent_to;
            
        }
        
            $data = [
                'application_id' => $application_id,
                'sent_from' => $sent_from,
                'sent_to' => $sent_to,
                'application_status' => 'Rejected',
            ];
            Application::where('application_id', $application_id)->update($data);
        
        
    return Redirect::to("/appband");
    }

    public function updateAppStatus2(Request $request, $application_id){
        // $page = Application::all()->where('application.id',1);
        $users = DB::table('applications')->where('application_id',$application_id)->get();
        foreach ($users as $users) {
            $sent_from = $users->sent_from;
            $sent_to = $users->sent_to;
            
        }
            
        $data = [
            'application_id' => $application_id,
            'sent_from' => $sent_from,
            'sent_to' => $sent_to,
            'application_status' => 'Contacted',
        ];
            Application::where('application_id', $application_id)->update($data);
        
        
    return Redirect::to("/appband");
    }

    public function edit1(Request $request){
        $status = DB::table('status')->get();
        return view('musician-dashboard/musicianstatus', compact('status'));
    }
    public function edit2(Request $request){
        $status = DB::table('status')->get();
        return view('band-dashboard/bandstatus', compact('status'));
    }

    public function fileUpload(Request $request, $detail_id){
        
          $image = $request->file('image');
            if($image == ""){
                $input['imagename'] = Session::get('dp_url');
                $dp_url = $input['imagename'];
            }
            else{
                $input['imagename'] =  $detail_id.'.'.$image->getClientOriginalExtension();
                $dp_url = $input['imagename'];
                // $input['imagename'] =  $detail_id.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/assets/musician_dp/');
                $image->move($destinationPath, $input['imagename']);
            }
    
            
        
            // $dp_url = $input['imagename'];
            if($request->input("status") == null){
                $status_id = $request->session()->get('status_id');
            }else{
                $status_id = $request->input("status");
    
            }
            
            $data = [
                'dp_url' => $dp_url,
                'status_id' => $status_id,
                'description' => $request->input("description")
            ];
            Detail::where('detail_id', $detail_id)->update($data);
            Session::put('dp_url',$dp_url);
    
            if($request->input("status") == 6){
                Session::put('status', 'Currently looking for a band');
            }
            else{
                Session::put('status', 'Currently not looking for any bands');
            }
            Session::put('description',$request->input("description"));
            
        // return Redirect::to("/appband");
            return Redirect::to("/musician-dashboard");

        }

    public function fileUpload2(Request $request, $detail_id){
        $image = $request->file('image');
            if($image == ""){
                $input['imagename'] = Session::get('dp_url');
                $dp_url = $input['imagename'];
            }
            else{
                $input['imagename'] =  $detail_id.'.'.$image->getClientOriginalExtension();
                $dp_url = $input['imagename'];
                // $input['imagename'] =  $detail_id.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/assets/band_dp/');
                $image->move($destinationPath, $input['imagename']);
            }
    

        
    
        // $dp_url = $input['imagename'];
        if($request->input("status") == null){
            $status_id = $request->session()->get('status_id');
        }else{
            $status_id = $request->input("status");

        }
        
        $data = [
            'dp_url' => $dp_url,
            'status_id' => $status_id,
            'description' => $request->input("description")
        ];
        Detail::where('detail_id', $detail_id)->update($data);
        Session::put('dp_url',$dp_url);

        if($request->input("status") == 1){
            Session::put('status', 'Currently looking for pianist');
        }elseif($request->input("status") == 0){
            Session::put('status', Session::get('status'));
        }elseif($request->input("status") == 2){
            Session::put('status', 'Currently looking for drummer');
        }elseif($request->input("status") == 3){
            Session::put('status', 'Currently looking for singer');
        }
        elseif($request->input("status") == 4){
            Session::put('status', 'Currently looking for guitarist');
        }
        elseif($request->input("status") == 5){
            Session::put('status', 'Currently looking for bassist');
        }
        elseif($request->input("status") == 7){
            Session::put('status', 'Currently not looking for any musician');
        }
        Session::put('description',$request->input("description"));
        
    // return Redirect::to("/appband");
    return Redirect::to("/band-dashboard");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
   

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
