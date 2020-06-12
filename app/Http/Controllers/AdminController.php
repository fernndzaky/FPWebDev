<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Detail;
use App\Application;
use Carbon\Traits\Test;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
class AdminController extends Controller
{
    public function deleteIndex()
	{
       
        return Redirect::to("/");
        
		
    }
    public function login(Request $request) {
        $username = Str::lower($request->input("username"));
        $password = $request->input("password");

        $api_token = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(env('API_URL','34.87.164.62').'/api/auth/getAdminToken',[
            "username"  => $username
        ]);
        
        // return $api_token;
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$api_token
           
        ])->post(env('API_URL','34.87.164.62').'/api/adminLogin', [
            "username" => $username,
            "password" => $password,
            "type_id" => 1
        ]); 
        $user = json_decode($response->body(), true);
        
        if($user['message'] === "Your Credential is wrong"){
            return Redirect::to(URL::previous())->with('message', 'Invalid  Username and or Passwords');
        }
        else{
            Session::put('adminLogin', TRUE);
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            
            ])->get(env('API_URL','34.87.164.62').'/api/auth/getAllMusicians'); 
            $user = json_decode($response->body(), true);
            // dump($user);
            return view('admin/admin-musicians',compact('user'));
        }


    }

    public function loadBands(){
       if (Session::get('adminLogin')){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
           
        ])->get(env('API_URL','34.87.164.62').'/api/auth/getAllBands'); 
        $user = json_decode($response->body(), true);
        // dump($user);
        return view('admin/admin-bands',compact('user'));
        }
        else{
            return Redirect::to("/");
 
        }
    }
    public function loadMusicians(){
        if (Session::get('adminLogin')){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        
        ])->get(env('API_URL','34.87.164.62').'/api/auth/getAllMusicians'); 
        $user = json_decode($response->body(), true);
        // dump($user);
        return view('admin/admin-musicians',compact('user'));
}
        else{
            return Redirect::to("/");
 
        }
    }
    public function delete($id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        
        ])->delete(env('API_URL','34.87.164.62').'/api/delete/'.$id, [
            "detail_id" => $id,
        ]);  
        $user = json_decode($response->body(), true);
        // dump($user);
        return Redirect::to("/admin-musicians")->with('status', 'Profile deleted!');;

    }
}

