<?php

/*
  |--------------------------------------------------------------------------
  | Auth Routes
  |--------------------------------------------------------------------------
 */

Route::get('login', array(
    'as' => 'Auth@index',
    'uses' => 'AuthController@index',
));

Route::post('login', array(
    'as' => 'Auth@login',
    'uses' => 'AuthController@login',
));

Route::get('logout', array(
    'as' => 'Auth@logout',
    'uses' => 'AuthController@logout',
));


Route::get('/', array(
    'before' => 'auth',
    'as' => 'Auth@home',
    'uses' => 'AuthController@home',
));
