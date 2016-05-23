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

Route::get('/', 'HomeController@index');
Route::resource('artist', 'ArtistController', ['only' => ['store', 'update', 'destroy']]);
Route::resource('comment', 'CommentController', ['only' => ['store', 'update', 'destroy']]);
Route::resource('news', 'NewsController', ['only' => ['store', 'update', 'destroy']]);
Route::resource('ticket', 'TicketController', ['only' => ['store']]);
Route::resource('user', 'UserController', ['only' => ['store']]);
Route::get('image/{type}/{filename}', 'ImageController@show');
Route::post('mail/send', 'MailController@send');