<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(
			array('username' => 'Romain'),
			array('username' => 'Hichem'),
			array('username' => 'Youssef'),
			array('username' => 'Fabienne'),
			array('username' => 'Denis')
		);

		// Uncomment the below to run the seeder
		// DB::table('users')->insert($users);
	}

}
