<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'user_id'	=> 2,
                'amount'	=> 2,
            ],
			[
				'user_id'	=> 4,
				'amount'	=> 4,
			],
        ]);
    }
}
