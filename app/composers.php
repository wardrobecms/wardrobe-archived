<?php

View::composer(Config::get('wardrobe.theme').'.post', function($view) {

	$prev = DB::table('posts')->orderBy('id', 'asc')->where('id', '>', $view->post->id)->where('active', '1')->first();
	$next = DB::table('posts')->orderBy('id', 'desc')->where('id', '<', $view->post->id)->where('active', '1')->first();

	$view->with(compact('prev', 'next'));
});
