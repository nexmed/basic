<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
//    $users = App\UserRole::find(1)->users;
//    foreach($users as $user)
//    {
//        print_r($user->name);
//    }
        dd(\Auth::user());
        return view('welcome');
    });

    Route::get('auth/logout', 'Auth\AuthController@getLogout');
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
