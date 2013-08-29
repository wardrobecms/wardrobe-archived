<?php

use Wardrobe\Core\Repositories\UserRepositoryInterface;

class InstallController extends Controller {

	/**
	 * The user repository implementation.
	 *
	 * @var Wardrobe\UserRepositoryInterface
	 */
	protected $users;

	/**
	 * Create a new API User controller.
	 *
	 * @param UserRepositoryInterface $users
	 *
	 * @internal param UserRepositoryInterface $user
	 * @return InstallController
	 */
	public function __construct(UserRepositoryInterface $users)
	{
		$presence = Validator::getPresenceVerifier();
		$presence->setConnection('wardrobe');

		// If the config is marked as installed then bail with a 404.
		if (Config::get("core::wardrobe.installed") === true)
		{
			return App::abort(404, 'Page not found');
		}

		$this->users = $users;
	}

	/**
	 * Get the install index.
	 *
	 * @return Response
	 */
	public function start()
	{
		return View::make('admin.installer.step1');
	}

	/**
	 * Run the migrations
	 *
	 * @return Response
	 */
	public function publishAndMigrate()
	{
		$artisan = Artisan::call(
			'migrate',
			array(
				'--env' => App::environment(),
				'--database' => 'wardrobe',
				'--package' => 'wardrobe/core'
			)
		);

		Artisan::call(
			'asset:publish',
			array('package' => 'wardrobe/core')
		);

		if ($artisan > 0)
		{
			return Redirect::back()
				->withErrors(array('error' => 'Install Failed'))
				->with('install_errors', true);
		}

		return Redirect::to('install/user');
	}

	/**
	 * Get the user form.
	 *
	 * @return Response
	 */
	public function createUser()
	{
		return View::make('admin.installer.user');
	}

	/**
	 * Add the user and show success!
	 *
	 * @return Response
	 */
	public function storeUser()
	{
		$messages = $this->users->validForCreation(
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('email'),
			Input::get('password')
		);

		if (count($messages) > 0)
		{
			return Redirect::back()
				->withErrors($messages)
				->with('install_errors', true);
		}

		$user = $this->users->create(
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('email'),
			1, // Force them as active
			Input::get('password')
		);

		return Redirect::to('install/config');
	}

	/**
	 * Get the config form.
	 */
	public function editConfig()
	{
		return View::make('admin.installer.config');
	}

	/**
	 * Save the config files
	 */
	public function updateConfig()
	{
		$this->setWardrobeConfig(
			Input::get('title', 'Site Name'),
			Input::get('theme', 'Default'),
			Input::get('per_page', 5)
		);

		return View::make('admin.installer.complete');
	}

	/**
	 * Update the configs based on passed data
	 *
	 * @param string $title
	 * @param string $theme
	 * @param int    $per_page
	 *
	 * @return
	 */
	protected function setWardrobeConfig($title, $theme, $per_page)
	{
		$path = $this->getConfigFile('wardrobe.php');
		$content = str_replace(
			array('##title##', '##theme##', "'##per_page##'", "'##installed##'"),
			array(addslashes($title), $theme, (int) $per_page, 'true'),
			File::get($path)
		);
		return File::put($path, $content);
	}

	/**
	 * Get the config file
	 *
	 * Use the current environment to load the config file. With a fall back on the original.
	 *
	 * @param string $file
	 * @return string
	 */
	protected function getConfigFile($file)
	{
		if (file_exists(app_path().'/config/packages/wardrobe/core/'.App::environment().'/'.$file))
		{
			return app_path().'/config/packages/wardrobe/core/'.App::environment().'/'.$file;
		}

		return app_path().'/config/packages/wardrobe/core/'.$file;
	}
}
