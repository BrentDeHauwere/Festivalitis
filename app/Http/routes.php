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

// ---------- AUTHENTICATION ----------
Route::get('login','AuthController@index');
Route::post('login','AuthController@login');

// ---------- WEBSITE (all users) ----------
Route::get('/', 'HomeController@index');
Route::resource('user', 'UserController', ['only' => ['store']]);
Route::get('image/{type}/{filename}', 'ImageController@show');
Route::post('mail/send', 'MailController@send');

Route::group(['middleware' => 'user'], function () {
	// ---------- WEBSITE (all authenticated users) ----------
	Route::resource('comment', 'CommentController', ['only' => ['store', 'update', 'destroy']]);
	Route::resource('ticket', 'TicketController', ['only' => ['store']]);
	Route::post('user/image', 'UserController@image');
	Route::get('logout','AuthController@logout');

	Route::group(['middleware' => 'moderator'], function () {
		// ---------- WEBSITE (only moderators) ----------
		Route::get('/panel', 'HomeController@configurationPanel');
		Route::resource('artist', 'ArtistController', ['only' => ['store', 'update', 'destroy']]);
		Route::resource('news', 'NewsController', ['only' => ['store', 'update', 'destroy']]);
	});
});