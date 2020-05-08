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

Route::get('/about', function () {
    return view('about');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});
// end of home page routing



// LOG OUT ROUTES
Route::get('/logout', ['uses' => 'UsersController@logout']);
// END OF LOGOUT ROUTES



// SIGN IN BAND
Route::get('/signin-band', function () {
    return view('signin-band');
});
Route::post('/band-dashboard', ['uses' => 'UsersController@loginBand']);
Route::get('/band-dashboard', ['uses' => 'UsersController@publicIndex2']);
// END OF SIGN IN BAND

// SIGN IN MUSICIAN
Route::get('/signin-musician', function () {
    return view('signin-musician');
});
Route::post('/musician-dashboard', ['uses' => 'UsersController@login']);
Route::get('/musician-dashboard', ['uses' => 'UsersController@publicIndex']);
// END OF SIGN IN MUSICIAN


// sign up musician routes
Route::get('/signup-musician', function () {
    return view('signup-musician');
});
Route::post('/signup-musician-2', ['uses' => 'UsersController@store1']);
Route::post('/signin-musician', ['uses' => 'UsersController@store2']);
// end of sign up musician routes

// SIGN UP BAND ROUTES
Route::get('/signup-band', function () {
    return view('signup-band');
});
Route::post('/signup-band-2', ['uses' => 'UsersController@store3']);
Route::post('/signin-band', ['uses' => 'UsersController@store4']);
// END OF SIGN UP BAND ROUTES

// MUSICIAN ROUTING
Route::get('/musicianstatus', function () {
    return view('musician-dashboard/musicianstatus');
});
Route::get('/musicianfindband', function () {
    return view('musician-dashboard/musicianfindband');
});
Route::get('/musicianmatchlist', function () {
    return view('musician-dashboard/musicianmatchlist');
});
Route::get('/successmusician', function () {
    return view('musician-dashboard/successmusician');
});

Route::get('/appmusician', function () {
    return view('musician-dashboard/applicationmusician');
});
// END OF MUSICIAN ROUTING


// BAND ROUTING
Route::post('/signup-musician-2', ['uses' => 'UsersController@findMusician1']);

Route::get('/bandfind', function () {
    return view('band-dashboard/bandfind');
});
Route::get('/bandmatchlist', function () {
    return view('band-dashboard/bandmatchlist');
});
Route::get('/bandsuccess', function () {
    return view('band-dashboard/bandsuccess');
});
Route::get('/appband', function () {
    return view('band-dashboard/applicationband');
});

Route::get('/bandstatus', function () {
    return view('band-dashboard/bandstatus');
});


// END OF BAND ROUTING