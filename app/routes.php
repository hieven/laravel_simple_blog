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

Route::get('/', 'HomeController@showSite');
Route::post('/', 'HomeController@search');
Route::get('/activate/{id}', ['as' => 'auth.activated', 'uses' => 'AuthController@activated']);
Route::group(array('before' => 'auth'), function()
{

	Route::resource('post', 'PostController');

	Route::get('comment/{comment}', array('as' => 'comment.edit', 'uses' => 'CommentController@edit'));
	Route::patch('comment/{comment}', array('as' => 'comment.update', 'uses' => 'CommentController@update'));
	Route::delete('comment/{comment}', array('as' => 'comment.destroy', 'uses' => 'CommentController@destroy'));
	Route::post('post/{post}', 'CommentController@store');

	Route::get('logout', 'AuthController@logout');
});

Route::get('register', 'AuthController@getRegister');
Route::get('login', 'AuthController@getLogin');

Route::post('register', 'AuthController@postRegister');
Route::post('login', 'AuthController@postLogin');
