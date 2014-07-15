<?php
/*
|--------------------------------------------------------------------------
| Custom Theme Routes
|--------------------------------------------------------------------------
|
| In this file you can over ride any routes and add new ones based on your
| needs. For information on routing please see the following documentation:
| http://laravel.com/docs/routing
| http://laravel.com/docs/controllers
|
*/

Route::get('/about', function()
{
    return View::make(theme_view('about'));
});
