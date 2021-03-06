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

Route::get('/','PostsController@allpost');
Route::get('/post/{id}','PostsController@showpost');
Route::get('/like/{post_id}/{user_id}','PostsController@like');
Route::post('/comment','PostsController@comment');
Route::post('/update_comment','PostsController@update_comment');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin','HomeController@admin');
Route::get('/admin/stop','HomeController@stop');
Route::get('/admin/start','HomeController@start');
Route::get('/home/checkevent','HomeController@user');
Route::get('home/editor','HomeController@editor');
Route::post('home/update','PostsController@update');

Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'admin']], function() {
	Route::get('/', 'Admin\HomeController@index');
});