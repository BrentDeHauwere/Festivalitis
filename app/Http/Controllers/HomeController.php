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
		$artists = Artist::orderBy('begin')->get();
		$news = News::with('comments.user')->orderBy('created_at', 'desc')->get();

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
