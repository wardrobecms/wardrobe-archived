<?php

use Wardrobe\Cabinet\Repositories\PostRepositoryInterface;

class PostController extends BaseController {


	/**
	 * The post repository implementation.
	 *
	 * @var PostRepositoryInterface
	 */
	protected $posts;

	/**
	 * Create a new Home controller instance.
	 *
	 * @param PostRepositoryInterface $posts
	 *
	 * @return \PostController
	 */
	public function __construct(PostRepositoryInterface $posts)
	{
		parent::__construct();

		$this->posts = $posts;
	}

	/**
	 * Get the posts list
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
		$posts = $this->posts->active($this->per_page);

		return View::make($this->theme.'.archive', compact('posts'));
	}

	/**
	 * Search posts
	 *
	 * @return \Illuminate\View\View
	 */
	public function getSearch()
	{
		$search = strip_tags(Input::get('q'));

		$posts = $this->posts->search($search, $this->per_page);

		return View::make($this->theme.'.archive', ['posts' => $posts, 'search' => $search]);
	}

	/**
	 * Get a list of results by tag
	 *
	 * @param $tag
	 *
	 * @return \Illuminate\View\View
	 */
	public function getTag($tag)
	{
		$data['tag'] = strip_tags($tag);

		$data['posts'] = $this->posts->activeByTag($data['tag'], $this->per_page);

		return View::make($this->theme.'.archive', $data);
	}

	/**
	 * Display the post
	 *
	 * @param string $slug
	 *
	 * @return Response
	 */
	public function getShow($slug)
	{
		$post = $this->posts->findBySlug($slug);

		if ( ! $post)
		{
			return App::abort(404, 'Page not found');
		}

		return View::make($this->theme.'.post', compact('post'));
	}

	/**
	 * Display the rss feed
	 *
	 * @return Response
	 */
	public function getRss()
	{
		$posts = $this->posts->active(100);

		$data = array(
			'posts'   => $posts,
			'updated' => isset($posts[0]) ? $posts[0]->atom_date : date('Y-m-d H:i:s'),
		);

		return Response::view($this->theme.'.atom', $data, 200, [
			'Content-Type' => 'application/rss+xml; charset=UTF-8',
		]);
	}

	/**
	 * Show a post preview.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function preview($id)
	{
		if (Auth::guest())
		{
			return App::abort(404, 'Page not found');
		}

		return View::make($this->theme.'.preview', array('id' => $id));
	}
}
