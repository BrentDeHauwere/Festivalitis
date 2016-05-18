<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
		$comment = new Comment();
		$comment->news_id = $request->news_id;
		$comment->user_id = Auth::user()->id;
		$comment->description = $request->description;
		$comment->save();
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
		$comment->description = $request->description;
		$comment->save();
	}

	/**
	 * Remove the specified comment from storage.
	 *
	 * @param  Comment $comment
	 * @return Response
	 */
	public function destroy(Comment $comment)
	{
		$comment->delete();
	}
}
