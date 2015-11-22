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

Route::get('/',function(){
	return Redirect::route('dashboard');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));


});

Route::get('/env', function()
{
	dd(App::environment());
});
Route::group(['prefix' => 'api/v1'], function(){



   //lesson Routes
    Route::get('lessons', ['as' => 'lessons.index', 'uses' => 'LessonsController@index']);
	Route::get('lessons/create', ['as' => 'lessons.create', 'uses' => 'LessonsController@create']);
	Route::post('lessons', ['as' =>'lessons.store', 'uses'=> 'LessonsController@store']);
	Route::get('lessons/{lessons}', ['as' => 'lessons.show', 'uses'=> 'LessonsController@show']);
	Route::get('lessons/{lessons}/edit', ['as' => 'lessons.edit', 'uses'=> 'LessonsController@edit']);
	Route::put('lessons/{lessons}', ['as' => 'lessons.update','uses' => 'LessonsController@update']);


	//tag Routes
	Route::get('tags', ['as' => 'tags.index', 'uses' => 'TagsController@index']);
	//Route::get('tags/create', ['as' => 'tags.create', 'uses' => 'TagsController@create']);
	//Route::post('tags', ['as' =>'tags.store', 'uses'=> 'TagsController@store']);
	Route::get('tags/{tags}', ['as' => 'tags.show', 'uses'=> 'TagsController@show']);
	//Route::get('tags/{tags}/edit', ['as' => 'tags.edit', 'uses'=> 'TagsController@edit']);
	//Route::put('tags/{tags}', ['as' => 'tags.update','uses' => 'TagsController@update']);




});
