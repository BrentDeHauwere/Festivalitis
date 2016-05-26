<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewsRequest;

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
		$news = News::create($request->all());

		return redirect()->action('HomeController@configurationPanel')->with('success', 'News item was successfully created.');
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
		$news = $news->update($request->all());
	}

	/**
	 * Remove the specified news from storage.
	 *
	 * @param  News $news
	 * @return Response
	 */
	public function destroy(News $news)
	{
		$news->delete();
	}
}
