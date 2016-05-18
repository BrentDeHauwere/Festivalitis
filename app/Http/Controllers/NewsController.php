<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
	/**
	 * Store a newly created news in storage.
	 *
	 * @param NewsRequest $request
	 * @return Response
	 */
	public function store(NewsRequest $request)
	{
		
	}

	/**
	 * Update the specified news in storage.
	 *
	 * @param NewsRequest $request
	 * @param  News $news
	 * @return Response
	 */
	public function update(NewsRequest $request, News $news)
	{

	}

	/**
	 * Remove the specified news from storage.
	 *
	 * @param  News $news
	 * @return Response
	 */
	public function destroy(News $news)
	{

	}
}
