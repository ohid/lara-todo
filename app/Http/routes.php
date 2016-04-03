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

Route::group(['middleware' => ['web']], function () {
	// Route::resource('/adf', 'FormController');
    Route::auth();
    Route::get('/', function() {
    	return redirect('/todo');
    });

	Route::get('/todo/completed', ['as' => 'todo.completed', 'uses' => 'TodoController@completed']);
	Route::get('/todo/all', ['as' => 'todo.all', 'uses' => 'TodoController@all']);

	Route::resource('/todo', 'TodoController', ['except' => ['create', 'edit']]);
	Route::post('/todo/complete_todo/{id}', 'TodoController@completeTodo');

});

