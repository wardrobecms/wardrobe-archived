<?php
/*
|--------------------------------------------------------------------------
| Custom Theme Routes
|--------------------------------------------------------------------------
|
| In this file you can over ride any [routes](src/Wardrobe/routes.php) and
| add new ones based on your needs. For information on routing please see
| the following documentation:
| http://laravel.com/docs/routing
| http://laravel.com/docs/controllers
|
*/
$wardrobeControllers = 'Wardrobe\Core\Controllers\\';

Route::get('/tags', function()
{
	return View::make(theme_view('tags'));
});

// Example of over riding a default route:

// Route::get('enviar/{slug}', array('uses' => $wardrobeControllers.'PostController@show', 'as' => 'wardrobe.posts.show'));
// Route::get('post/{slug}', function()
// {
//     return App::abort(404, 'Page not found');
// });