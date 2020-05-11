<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// home page routing
Route::get('/', ['uses' => 'HomeController@publicIndex']);

Route::get('/about', ['uses' => 'UsersController@publicIndexAbout']);


Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', ['uses' => 'UsersController@publicIndexSignUp2']);

// end of home page routing


// BLOCK ROUTING
// Route::get('/appmusician', ['uses' => 'HomeController@publicIndex2']);
// END OF BLOCK ROUTING


// LOG OUT ROUTES
Route::get('/logout', ['uses' => 'UsersController@logout']);
// END OF LOGOUT ROUTES



// SIGN IN BAND
Route::get('/signin-band', function () {
    return view('signin-band');
});
Route::get('/band-dashboard', ['uses' => 'UsersController@publicIndex2']);

Route::post('/band-dashboard', ['uses' => 'UsersController@loginBand']);
// END OF SIGN IN BAND

// SIGN IN MUSICIAN
Route::get('/signin-musician', function () {
    return view('signin-musician');
});
Route::post('/musician-dashboard', ['uses' => 'UsersController@login']);
Route::get('/musician-dashboard', ['uses' => 'UsersController@publicIndex']);
// END OF SIGN IN MUSICIAN


// sign up musician routes
Route::get('/signup-musician', ['uses' => 'UsersController@publicIndexSignUp3']);

Route::get('/signup-musician-2', ['uses' => 'UsersController@publicIndexSignUp']);

Route::post('/signup-musician-2', ['uses' => 'UsersController@store1']);
Route::post('/signin-musician', ['uses' => 'UsersController@store2']);
// end of sign up musician routes

// SIGN UP BAND ROUTES
// Route::get('/signup-band', function () {
//     return view('signup-band');
// });
Route::get('/signup-band', ['uses' => 'UsersController@publicIndexSignUp4']);


Route::get('/signup-band-2', ['uses' => 'UsersController@publicIndexSignUp']);

Route::post('/signup-band-2', ['uses' => 'UsersController@store3']);
Route::post('/signin-band', ['uses' => 'UsersController@store4']);
// END OF SIGN UP BAND ROUTES

// MUSICIAN ROUTING
Route::get('/musicianstatus', function () {
    return view('musician-dashboard/musicianstatus');
});

Route::post('/musicianfindband', ['uses' => 'UsersController@findBand1']);
Route::post('/musicianmatchlist', ['uses' => 'UsersController@findBand2']);
Route::get('/musician/{detail}', 'UsersController@show2');
Route::post('/successmusician', ['uses' => 'UsersController@apply2']);

Route::get('/appmusician', ['uses' => 'UsersController@showApplications2']);
Route::get('/musicianstatus', ['uses' => 'UsersController@statusIndex']);
Route::get('/musicianfindband', ['uses' => 'UsersController@findbandIndex1']);
Route::get('/musicianmatchlist', ['uses' => 'UsersController@findbandIndex2']);
Route::get('/successmusician', ['uses' => 'UsersController@findbandIndex3']);



Route::post('/musicianstatus', ['uses' => 'UsersController@edit1']);



Route::post('/musician/{detail_id}', [

    'uses' => 'UsersController@fileUpload']);


// END OF MUSICIAN ROUTING


// BAND ROUTING
Route::post('/bandfind', ['uses' => 'UsersController@findMusician1']);
Route::post('/bandmatchlist', ['uses' => 'UsersController@findMusician2']);
Route::get('/band/{detail}', 'UsersController@show');

Route::patch('/update-rejected/{detail}', 'UsersController@updateAppStatus');
Route::patch('/update-contacted/{detail}', 'UsersController@updateAppStatus2');

// Route::get('/bandstatus', function () {
//     return view('band-dashboard/bandstatus');
// });
Route::post('/band/{detail_id}', [

    'uses' => 'UsersController@fileUpload2']);
Route::post('/bandstatus', ['uses' => 'UsersController@edit2']);

Route::get('/appband', ['uses' => 'UsersController@showApplications']);

Route::get('/bandstatus', ['uses' => 'UsersController@statusIndex2']);
Route::get('/bandfind', ['uses' => 'UsersController@findbandIndex4']);
Route::get('/bandmatchlist', ['uses' => 'UsersController@findbandIndex5']);
Route::get('/bandsuccess', ['uses' => 'UsersController@findbandIndex6']);


Route::post('/bandsuccess', ['uses' => 'UsersController@apply']);

// END OF BAND ROUTING