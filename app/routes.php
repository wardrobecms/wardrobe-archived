<?php

Route::get('/', array('uses' => 'HomeController@getIndex', 'as' => 'home'));
Route::get('archive', array('uses' => 'PostController@getIndex', 'as' => 'archive'));
Route::get('search', array('uses' => 'PostController@getSearch', 'as' => 'search'));
Route::get('tag/{tag}', array('uses' => 'PostController@getTag', 'as' => 'tag'));
Route::get('post/{slug}', array('uses' => 'PostController@getShow', 'as' => 'post'));
Route::get('rss', array('uses' => 'PostController@getRss', 'as' => 'rss'));
