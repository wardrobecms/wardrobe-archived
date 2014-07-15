<?php

use Wardrobe\Cabinet\Repositories\PostRepositoryInterface;

class HomeController extends BaseController {


	/**
	 * The post repository implementation.
	 *
	 * @var Wardrobe\PostRepositoryInterface
	 */
	protected $posts;

	/**
	 * Create a new Home controller instance.
	 *
	 * @param PostRepositoryInterface $posts
	 *
	 * @return HomeController
	 */
	public function __construct(PostRepositoryInterface $posts)
	{
		parent::__construct();

		$this->posts = $posts;
	}

	/**
	 * Get the Wardrobe index.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$posts = $this->posts->active($this->per_page);

		return View::make($this->theme.'.index', compact('posts'));
	}
}
