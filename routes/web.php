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
    return view('auth/login');
});
Route::group(['prefix'=>'customer','as'=>'customer.'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'CoinsController@index']);
    Route::get('index', ['as' => 'index', 'uses' => 'CoinsController@index']);
    Route::get('payment-form', ['as' => 'payment-form', 'uses' => 'CoinsController@payment_form'])->middleware(['customer']);
});
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=> ['admin']], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
    Route::get('index', ['as' => 'index', 'uses' => 'AdminController@index']);
  });

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coins', 'CoinsController@show')->name('show');

Auth::routes();
Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Route::get('public/uploads/photos/id/{name}', function ($name) {
//     return "<img src='localhost:8000/public/uploads/photos/id/".$name."'/>";
// })->where('name', '(.*)');