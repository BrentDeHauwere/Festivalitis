<?php

namespace App\Http\Controllers;

use App\Artist;

use App\Http\Requests;
use App\Http\Requests\ArtistRequest;


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
		$input = $request->all();
		array_forget($input, 'image');
		$artist = Artist::create($input);

		if ($request->hasFile('image')) {
			$destinationPath = storage_path() . '/app/artist_images/';
			$fileName = $artist->id . '.' . $request->file('image')->getClientOriginalExtension();
			$request->file('image')->move($destinationPath, $fileName);
		}

		return redirect()->action('HomeController@configurationPanel')->with('success', 'Artist was successfully created.');
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
		$artist = $artist->update($request->all());
	}

	/**
	 * Remove the specified artist from storage.
	 *
	 * @param  Artist $artist
	 * @return Response
	 */
	public function destroy(Artist $artist)
	{
		$artist->delete();
	}
}
