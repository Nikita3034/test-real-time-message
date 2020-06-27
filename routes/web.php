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

Route::get('/', 'HomeController@getHomePage')->name('home');

Route::get('/twits', 'TwitController@getTwitsPage')->name('twits');

Route::post('/twits/addTwit', 'TwitController@addTwit')->name('addTwit');

Route::get('/twits/get-twits-json', 'TwitController@getTwitsJson');