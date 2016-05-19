<?php

namespace App\Http\Controllers;

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
		return view('index');
	}
}
