<?php

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
Route::group(['prefix'=>'partners','as'=>'partners.','middleware'=>'admin'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'CoinsController@index']);
    Route::get('index', ['as' => 'index', 'uses' => 'CoinsController@index']);
    Route::get('donate', ['as' => 'donate', 'uses' => 'CoinsController@donate']);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coins', 'CoinsController@show')->name('show');

Auth::routes();
Route::post('/register', 'Auth\RegisterController@register')->name('register');
