<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
	/**
	 * Store a newly created comment in storage.
	 *
	 * @param  CommentRequest $request
	 * @return Response
	 */
	public function store(CommentRequest $request)
	{

	}

	/**
	 * Update the specified comment in storage.
	 *
	 * @param  CommentRequest $request
	 * @param  Comment $comment
	 * @return Response
	 */
	public function update(CommentRequest $request, Comment $comment)
	{

	}

	/**
	 * Remove the specified comment from storage.
	 *
	 * @param  Comment $comment
	 * @return Response
	 */
	public function destroy(Comment $comment)
	{

	}
}
