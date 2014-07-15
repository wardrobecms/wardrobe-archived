<?php

class UserTableSeeder extends WardrobeSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();

		DB::table('users')->insert(array(
			'password'     => Hash::make('password'),
			'email'        => 'eric@ericlbarnes.com',
			'first_name'   => 'Eric',
			'last_name'    => 'Barnes',
			'active'    	 => 1,
			'created_at'   => new DateTime,
			'updated_at'   => new DateTime,
		));
	}

}
