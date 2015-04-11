<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TokenCountSeederTableSeeder extends Seeder {

	public function run()
	{
        DB::table('token_count')->delete();

        TokenCount::create(['count' => '1', 'date' => date('Y-m-d')]);
	}

}