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

		$this->call('EmployeesTableSeeder');

        $this->command->info('Employees Table seeded!');

        $this->call('TokenCountSeederTableSeeder');

        $this->command->info('TokenCountSeederTableSeeder Table seeded!');
	}

}
