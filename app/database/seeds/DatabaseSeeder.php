<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UsersTableSeeder');
		$this->call('SectionsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ArticlesTableSeeder');
	}

}