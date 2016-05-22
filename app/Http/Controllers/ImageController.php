<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
	/**
	 * Display the specified image.
	 *
	 * @param string $type
	 * @param int $filename
	 * @return Response
	 */
    public function show($type, $filename)
	{
		if (!in_array($type, ['artist', 'user']))
		{
			abort(404);
		}

		$path = storage_path() . "/app/{$type}_images/{$filename}";

		$paths = glob($path . '.*');
		if (count($paths) == 1)
		{
			$path = $paths[0];
		}

		if(!File::exists($path))
		{
			$path = storage_path() . "/app/{$type}_images/none.png";
		}

		$file = File::get($path);
		$contentType = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("Content-Type", $contentType);

		return $response;
	}
}
