<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@index'));

Route::resource('invitations', 'InvitationsController');

Route::group(array('prefix' => 'users'), function() {

    Route::get('/', array('as' => 'users', 'uses' => 'UsersController@index'));
    Route::get('create', array('as' => 'users.create', 'uses' => 'UsersController@create'));
    Route::post('/', array('as' => 'users.store', 'uses' => 'UsersController@store'));
    Route::get('{id}/edit', array('as' => 'users.edit', 'uses' => 'UsersController@edit'));
    Route::put('/{id}', array('as' => 'users.update', 'uses' => 'UsersController@update'));
    Route::delete('/', array('as' => 'users.delete', 'uses' => 'UsersController@destroy'));
});

Route::group(array('prefix' => 'areas'), function() {
    Route::get('/', array('as' => 'areas', 'uses' => 'AreasController@index'));
    Route::get('create', array('as' => 'areas.create', 'uses' => 'AreasController@create'));
    Route::post('/', array('as' => 'areas.store', 'uses' => 'AreasController@store'));
    Route::get('{id}/edit', array('as' => 'areas.edit', 'uses' => 'AreasController@edit'));
    Route::put('/{id}', array('as' => 'areas.update', 'uses' => 'AreasController@update'));
    Route::delete('/', array('as' => 'areas.delete', 'uses' => 'AreasController@destroy'));
});


Route::group(array('prefix' => 'clients'), function() {
    Route::pattern('id', '[0-9]+');
    Route::group(array('prefix' => 'ticket'), function() {
        Route::get('/', array('as' => 'clients.tickets', 'uses' => 'TicketsController@index'));
        Route::post('/', array('as' => 'clients.tickets.store', 'uses' => 'TicketsController@store'));
        Route::delete('/', array('as' => 'clients.tickets.delete', 'uses' => 'TicketsController@destroy'));
        Route::get('{id}', array('as' => 'clients.tickets.show', 'uses' => 'TicketsController@show'));
        Route::put('{id}', array('as' => 'clients.tickets.update', 'uses' => 'TicketsController@update'));
        Route::get('create', array('as' => 'clients.tickets.create', 'uses' => 'TicketsController@create'));
        Route::get('{id}/edit', array('as' => 'clients.tickets.edit', 'uses' => 'TicketsController@edit'));

        Route::get('ticket/{id}/create', array('as' => 'clients.message.create', 'uses' => 'MessagesController@create'));
        
        Route::group(array('prefix' => 'message'), function() {

            Route::get('/{id}', array('as' => 'clients.message', 'uses' => 'MessagesController@index'));
            
            Route::post('/', array('as' => 'clients.message.store', 'uses' => 'MessagesController@store'));
            Route::get('{id}/edit', array('as' => 'clients.message.edit', 'uses' => 'MessagesController@edit'));
            Route::put('/{id}', array('as' => 'clients.message.update', 'uses' => 'MessagesController@update'));
            Route::delete('/', array('as' => 'clients.message.delete', 'uses' => 'MessagesController@destroy'));
        });
    });
});

