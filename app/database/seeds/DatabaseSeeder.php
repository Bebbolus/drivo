<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->command->info('User Seeding...');
		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded!');
		
		$this->command->info('School Seeding...');
		$this->call('SchoolsTableSeeder');
		$this->command->info('User table seeded!');
	}
	

}
