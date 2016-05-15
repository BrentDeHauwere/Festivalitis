<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'news_id'       => 1,
                'user_id'       => 2,
                'description'   => 'Wow, I\'m looking forward to it.',
				'created_at' 	=> date('Y-m-d H:i:s', strtotime('02-02-2016 14:02:33')),
            ],
            [
                'news_id'       => 1,
                'user_id'       => 3,
                'description'   => 'Amazing! Can\'t wait.',
				'created_at' 	=> date('Y-m-d H:i:s', strtotime('02-02-2016 17:41:21')),
            ],
            [
                'news_id'       => 2,
                'user_id'       => 5,
                'description'   => 'O M G! I love Ed Sheeran!',
				'created_at'	=> date('Y-m-d H:i:s', strtotime('21-02-2016 16:36:13')),
            ],
            [
                'news_id'       => 3,
                'user_id'       => 5,
                'description'   => 'Please add Kygo to the list. His music is amazing!',
				'created_at'	=> date('Y-m-d H:i:s', strtotime('10-03-2016 12:01:56')),
			],
			[
				'news_id'       => 3,
				'user_id'       => 4,
				'description'   => 'Sub Focus & MC ID again... Give us some good names, right?',
				'created_at'	=> date('Y-m-d H:i:s', strtotime('10-03-2016 12:23:44')),
			],
			[
				'news_id'       => 4,
				'user_id'       => 5,
				'description'   => 'I bought my tickets!',
				'created_at'	=> date('Y-m-d H:i:s', strtotime('26-03-2016 10:32:12')),
			],
        ]);
    }
}
