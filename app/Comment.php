<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'user_id'];

	/**
	 * Get the news item that belongs to the comment.
	 */
	public function news()
	{
		return $this->belongsTo('App\News');
	}

	/**
	 * Get the user that owns the comment.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
