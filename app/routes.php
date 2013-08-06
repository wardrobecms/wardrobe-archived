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

Route::group(array('prefix' => 'install'), function()
{
	Route::get('/', array('uses' => 'InstallController@start', 'as' => 'wardrobe.install.index'));
	Route::post('/', array('uses' => 'InstallController@publishAndMigrate', 'as' => 'wardrobe.install.publishAndMigrate'));

	Route::get('user', array('uses' => 'InstallController@createUser', 'as' => 'wardrobe.install.createUser'));
	Route::post('user', array('uses' => 'InstallController@storeUser', 'as' => 'wardrobe.install.storeUser'));

	Route::get('config', array('uses' => 'InstallController@editConfig', 'as' => 'wardrobe.install.editConfig'));
});

Route::controller('install', 'InstallController');
