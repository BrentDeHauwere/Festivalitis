<?php

namespace App\Http\Controllers;

use App\Artist;

use App\Http\Requests;

class ArtistController extends Controller
{
	/**
	 * Store a newly created artist in storage.
	 *
	 * @param  ArtistRequest $request
	 * @return Response
	 */
    public function store(ArtistRequest $request)
	{

	}

	/**
	 * Update the specified artist in storage.
	 *
	 * @param  ArtistRequest $request
	 * @param  Artist $artist
	 * @return Response
	 */
	public function update(ArtistRequest $request, Artist $artist)
	{

	}

	/**
	 * Remove the specified artist from storage.
	 *
	 * @param  Artist $artist
	 * @return Response
	 */
	public function destroy(Artist $artist)
	{

	}
}
