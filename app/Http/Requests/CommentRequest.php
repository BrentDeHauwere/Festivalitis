<?php

namespace App\Http\Requests;

use App\Comment;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CommentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Route::post('comment/{comment}');
        $commentId = $this->route('comment');

		// Authorized if:
		// - The comment doesn't exist yet
		// - The comment does exist, and has the user_id of the logged in user
        return (!Comment::where('id', $commentId)
			->exists() ||
		Comment::where('id', $commentId)
            ->where('user_id', Auth::id())
            ->exists());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_id'		=> 'required|exists:news',
            'description'	=> 'required',
        ];
    }
}
