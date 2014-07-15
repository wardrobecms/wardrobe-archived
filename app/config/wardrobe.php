<?php

return [


	/*
	|--------------------------------------------------------------------------
	| Active Theme
	|--------------------------------------------------------------------------
	|
	| Set this to the directory of the theme you want active. No slashes.
	|
	*/
	'theme' => '##theme##',

	/*
	|--------------------------------------------------------------------------
	| Site Title
	|--------------------------------------------------------------------------
	|
	| Set this to your sites title
	|
	*/
	'title' => '##title##',

	/*
	|--------------------------------------------------------------------------
	| Posts per page
	|--------------------------------------------------------------------------
	|
	| Set this to the number of posts you want per page.
	|
	*/
	'per_page' => '##per_page##',

	/*
	|--------------------------------------------------------------------------
	| Editor
	|--------------------------------------------------------------------------
	|
	| This sets the content editor. Available options are:
	| redactor - Full wysiwyg, saves as html
	| lepture - Markdown editor, saves in markdown
	|
	*/
	'editor' => 'lepture',

	/*
	|--------------------------------------------------------------------------
	| Installed
	|--------------------------------------------------------------------------
	|
	| This sets a flag so that it can only be installed once.
	|
	*/
	'installed' => '##installed##',

	/*
	|--------------------------------------------------------------------------
	| Image Uploads Directory
	|--------------------------------------------------------------------------
	|
	| Set this to the directory where your images will be located in your public
	| folder.
	|
	*/
	'image_dir' => 'img',

	/*
	|--------------------------------------------------------------------------
	| Image Resize
	|--------------------------------------------------------------------------
	|
	| If enabled, images will be resized automatically to fit within the
	| specified width/height (pixels) when uploaded.
	|
	*/
	'image_resize' => array(
		'enabled'       => false,
		'width'         => '600',
		'height'        => '600',
	),

	/*
	|--------------------------------------------------------------------------
	| Enable Cache
	|--------------------------------------------------------------------------
	|
	| Set this to true to enable caching. If true it will then use the
	| default laravel cache setup.
	|
	*/
	'cache' => null,

];
