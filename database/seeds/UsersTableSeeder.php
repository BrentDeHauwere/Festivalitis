<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'fname'		=> 'Admin',
				'lname'		=> 'Nistrator',
				'email'		=> 'admin@gmail.com',
				'password'	=> Hash::make('secret'),
				'admin'		=> true,
            ],
			[
				'fname'		=> 'Marie',
				'lname'		=> 'De Vos',
				'email'		=> 'marie@gmail.com',
				'password'	=> Hash::make('secret'),
				'admin'		=> false,
			],
			[
				'fname'		=> 'Ann-Sofie',
				'lname'		=> 'Michiels',
				'email'		=> 'ann-sofie@gmail.com',
				'password'	=> Hash::make('secret'),
				'admin'		=> false,
			],
			[
				'fname'		=> 'Jonas',
				'lname'		=> 'De Backer',
				'email'		=> 'jonas@gmail.com',
				'password'	=> Hash::make('secret'),
				'admin'		=> false,
			],
			[
				'fname'		=> 'Michèle',
				'lname'		=> 'Seghers',
				'email'		=> 'michele@gmail.com',
				'password'	=> Hash::make('secret'),
				'admin'		=> false,
			],
        ]);
    }
}
