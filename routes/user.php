<?php

use Illuminate\Support\Facades\Route;


Route::get('users', 'UserController@list');
Route::get('ApiUsers', 'UserController@listAPI');
Route::get('ApiUser', 'UserController@findAPI');
Route::delete('user/delete','UserController@delete');
Route::post('user','UserController@store');



