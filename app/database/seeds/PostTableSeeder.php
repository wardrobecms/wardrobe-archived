<?php

use Carbon\Carbon;

class PostTableSeeder extends WardrobeSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('posts')->truncate();

		for ($i=0;$i < $this->post_ct; $i++)
		{
			$date = Carbon::createFromDate(date("Y"), rand(1,2), rand(1,28));
			$created = $date->format('Y-m-d H:i:s');
			$title = $this->faker->company();
			$id = DB::table('posts')->insertGetId(array(
				'title'        => $title,
				'slug'         => Str::slug($title),
				'content'      => $this->faker->paragraph(),
				'type'         => 'post',
				'active'    	 => 1,
				'publish_date' => $created,
				'created_at'   => $created,
				'updated_at'   => $created,
			));

			// Todo add tags

		}
	}

} 
