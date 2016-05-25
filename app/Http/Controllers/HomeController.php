<?php

namespace App\Http\Controllers;

use App\Artist;
use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
	/**
	 * Show the website (one page).
	 *
	 * @return Response
	 */
    public function index()
	{
		$artists = Artist::all();
		$news = News::with('comments.user')->get();

		return view('index')
			->withArtists($artists)
			->withNews($news);
	}

	/**
	 * Show the configuration panel.
	 *
	 * @return Response
	 */
	public function configurationPanel()
	{
		return view('configuration_panel');
	}
}
