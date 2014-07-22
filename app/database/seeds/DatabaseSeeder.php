<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$this->command->info('School Seeding...');
		$this->call('SchoolsTableSeeder');
		$this->command->info('School table seeded!');
		
		Eloquent::unguard();
		$this->command->info('User Seeding...');
		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded!');
		
		$this->command->info('Instructor Seeding...');
		$this->call('InstructorsTableSeeder');
		$this->command->info('Instructor table seeded!');
	}
	

}
