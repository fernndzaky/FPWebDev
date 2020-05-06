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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['uses' => 'HomeController@publicIndex']);


Route::get('/musician-dashboard', ['uses' => 'UsersController@publicIndex']);

Route::post('/musician-dashboard', ['uses' => 'UsersController@login']);
Route::get('/logout', ['uses' => 'UsersController@logout']);


Route::get('/about', function () {
    return view('about');
});

Route::get('/signin', function () {
    return view('signin');
});



Route::get('/signin-band', function () {
    return view('signin-band');
});

Route::get('/signin-musician', function () {
    return view('signin-musician');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/signup-musician', function () {
    return view('signup-musician');
});

Route::get('/signup-band', function () {
    return view('signup-band');
});

Route::get('/signup-musician-2', function () {
    return view('signup-musician-2');
});


Route::get('/signup-band-2', function () {
    return view('signup-band-2');
});

Route::get('/musician-dashboard', function () {
    return view('musician-dashboard/musicianpage');
});

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
Route::get('/musicianpage', function () {
    return view('musician-dashboard/musicianpage');
});
Route::get('/appmusician', function () {
    return view('musician-dashboard/applicationmusician');
});
