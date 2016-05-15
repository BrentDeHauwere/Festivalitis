<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title'			=> 'Festivalitis will take place at 1 July',
                'description'	=> 'Hello people of Festivalitis! Finally, we can start counting for the best festival in the world. Festivalitis will take place at 1 July. We hope to see you in July. Also, keep track of our website for the announcements of new names.',
                'created_at' 	=> date('Y-m-d H:i:s', strtotime('02-02-2016 14:00:00')),
            ],
            [
                'title'			=> 'First headliner: Ed Sheeran',
                'description'	=> 'We are happy to announce our first headliner: Ed Sheeran. New names will be announced during March, so keep an eye on our website.',
                'created_at'	=> date('Y-m-d H:i:s', strtotime('21-02-2016 16:30:00')),
            ],
            [
                'title'			=> 'Names, Names, Names',
                'description'	=> 'Have we got news for you! The first batch of new names, the start of our ticket sales on 26 March, our brand new camping formulas, but … first things first! Dancing till your body tingles all over to Ed Sheeran, Hoodie Allen, Rihanna, Oscar and the Wolf, Chase & Status Live, Sub Focus & MC ID, Tom Odell, Macklemore, The Chainsmokers and Calvin Harris.',
                'created_at'	=> date('Y-m-d H:i:s', strtotime('10-03-2016 12:00:00')),
            ],
            [
                'title'			=> 'Ticket sale started now',
                'description'	=> 'Ticket sales started today through www.festivalitis.be. To avoid ticket fraud, the organisers urge the fans to only buy Festivalitis tickets on our website.',
                'created_at'	=> date('Y-m-d H:i:s', strtotime('26-03-2016 10:00:00')),
            ],
        ]);
    }
}
