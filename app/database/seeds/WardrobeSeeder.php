<?php

class WardrobeSeeder extends DatabaseSeeder {

	protected $faker;
	protected $post_ct = 40;

	public function __construct()
	{
		$this->faker = Faker\Factory::create();
	}

}
