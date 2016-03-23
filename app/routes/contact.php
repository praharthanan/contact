<?php

/*
  |--------------------------------------------------------------------------
  | Contact Routes
  |--------------------------------------------------------------------------
 */


Route::get('admin/contacts', array(
    'as' => 'Contact@index',
    'uses' => 'ContactController@index',
));

Route::get('admin/contact/{id}', array(
            'as' => 'Contact@show',
            'uses' => 'ContactController@show',
        ))
        ->where('id', '[0-9]+');

Route::get('admin/contact/create', array(
    'as' => 'Contact@create',
    'uses' => 'ContactController@create',
));

Route::post('admin/contact/store', array(
    'as' => 'Contact@store',
    'uses' => 'ContactController@store',
));

Route::get('admin/contact/{id}/edit', array(
            'as' => 'Contact@edit',
            'uses' => 'ContactController@edit',
        ))
        ->where('id', '[0-9]+');

Route::post('admin/contact/{id}/update', array(
            'as' => 'Contact@update',
            'uses' => 'ContactController@update',
        ))
        ->where('id', '[0-9]+');

Route::get('admin/contact/{id}/delete', array(
            'as' => 'Contact@delete',
            'uses' => 'ContactController@delete',
        ))
        ->where('id', '[0-9]+');

Route::get('admin/contacts/search', array(
    'as' => 'Contact@searchName',
    'uses' => 'ContactController@searchName',
));
