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
		$input = $request->all();
		$input['user_id'] = Auth::id();

		$comment = Comment::create($input);
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
		$input = $request->all();
		array_forget($input, 'news_id');

		$comment->update($request->all());
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
