<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            [
                'name'			=> 'Ed Sheeran',
                'description'	=> 'Flame-haired singer/songwriter, beatboxer, and guitarist Ed Sheeran\'s eclectic blend of acoustic pop, folk, and hip-hop has been championed by everyone from the underground grime scene to American Oscar winners.',
                'begin'			=> '12:00',
                'end'			=> '13:00',
            ],
			[
				'name'			=> 'Hoodie Allen',
				'description'	=> 'Steven Adam Markowitz, known professionally as Hoodie Allen, is an independent American rapper. After graduating from the University of Pennsylvania, he began working at Google before ultimately quitting to pursue a music career full-time. ',
				'begin'			=> '13:00',
				'end'			=> '13:45',
			],
			[
				'name'			=> 'Rihanna',
				'description'	=> 'Rihanna has become a modern music, entertainment and fashion icon. As an accomplished performer, she has sold 54 million albums and 210 million digital tracks worldwide making her the top-selling digital artist of all time. She\'s released 7 albums in 7 years, achieved 13 Number One singles and won 8 Grammy Awards. She is the most viewed artist on Vevo/YouTube with over 7 billion views and 23 Vevo certified videos, the most of any artist.  She is also one of the biggest artists on Facebook with over 81 million friends.',
				'begin'			=> '13:45',
				'end'			=> '15:00',
			],
			[
				'name'			=> 'Oscar and the Wolf',
				'description'	=> 'According to the critics, Max Colombie is a phenomenon. According to Max Colombie himself, he\'s just a normal guy from Dilbeek. A guy who enjoys a cup of coffee with his mum, before playing a sold-out concert at the Sportpaleis.',
				'begin'			=> '15:00',
				'end'			=> '16:00',
			],
			[
				'name'			=> 'Chase & Status Live',
				'description'	=> '"Those guys have magic, they make the most amazing beats ever", said Rihanna about drum \'n\' bass/dubstep producers Chase & Status.',
				'begin'			=> '16:00',
				'end'			=> '17:00',
			],
			[
				'name'			=> 'Sub Focus & MC ID',
				'description'	=> 'Since 2004 Nick Douwma (aka Sub Focus) is considered über-cool in Liverpool\'s drum and bass scene. His breakthrough came with a series of popular tracks such as \'Acid Test\' and \'X-Ray\'. A self-taught musician and wannabe producer, he was discovered by Andy C, who transferred him to the infamous Ram Records stable. However, Sub Focus is no drum and bass purist: his music is a cosmic cauldron of electro, rock, house and breakbeat. At Festivalitis he\'ll set the Main Stage ablaze together with MC ID.',
				'begin'			=> '17:00',
				'end'			=> '18:00',
			],
			[
				'name'			=> 'Tom Odell',
				'description'	=> 'He released his debut extended play, Songs from Another Love, in 2012 and won the BRITs Critics\' Choice Award in early 2013. His debut studio album, Long Way Down, was issued on 24 June 2013. His second studio album, Wrong Crowd, will be released on 10 June 2016.',
				'begin'			=> '18:00',
				'end'			=> '18:30',
			],
			[
				'name'			=> 'Macklemore',
				'description'	=> 'Ben Haggerty known by his stage name Macklemore and formerly Professor Macklemore, is an American rapper and songwriter from Seattle, Washington. His stage name originated from his childhood; it was the name of his made-up superhero. Since 2000, he has independently released one mixtape, three EPs, and four albums. He has significantly collaborated with producer Ryan Lewis as Macklemore & Ryan Lewis.',
				'begin'			=> '18:30',
				'end'			=> '20:00',
			],
			[
				'name'			=> 'The Chainsmokers',
				'description'	=> 'The Chainsmokers are an American DJ duo consisting of Andrew Taggart and Alex Pall. Their 2014 single "#Selfie" reached No. 16 on the US charts and No. 11 on the UK charts while their 2015 single "Roses" reached No. 6 on the US charts. They released their debut EP, Bouquet, in October 2015.',
				'begin'			=> '20:00',
				'end'			=> '21:30',
			],
			[
				'name'			=> 'Calvin Harris',
				'description'	=> 'Harris holds the record for the most top 10 songs from one studio album on the UK Singles Chart with nine top 10 entries, surpassing Michael Jackson. In October 2014, he became the first artist to place three songs simultaneously on the top 10 of Billboard\'s Dance/Electronic Songs chart. He also became the first British solo artist to reach more than one billion streams on Spotify.',
				'begin'			=> '21:30',
				'end'			=> '23:00',
			],
        ]);
    }
}
