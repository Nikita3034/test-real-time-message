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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/twits', function () {
    $twits = DB::table('twits')->get();
    return view('twits.twits', compact('twits'));
});

Route::get('/twit/{twit}', function ($id) {
    $twit = DB::table('twits')->find($id);
    return view('twits.twit', compact('twit'));
});