<?php

class BaseController extends Controller {

	/**
	 * The default theme used by the blog.
	 *
	 * @var string
	 */
	protected $theme;

	/**
	 * The posts per page
	 *
	 * @var int
	 */
	protected $per_page;

	public function __construct()
	{
		$this->theme = Config::get('wardrobe.theme', 'default');

		$this->per_page = Config::get('wardrobe.per_page', 10);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
