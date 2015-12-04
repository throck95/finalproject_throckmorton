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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('beverages/login');
});
Route::get('/register', function() {
    return view('beverages/register');
});

Route::get("beverages/json","BeverageController@getBeverageJson");
Route::get("beverages/jsonID/{id}","BeverageController@getCommentsForBeverageJson");
Route::get("beverages/addRating/{id}","BeverageController@addRating");
Route::resource("beverages","BeverageController",["names"=>["index"=>"beverages_path","show"=>"beverage_path","create"=>"beverage_create","store"=>"beverage_store","update"=>"beverage_update","edit"=>"beverage_edit"],"except"=>["destroy","edit"]]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
