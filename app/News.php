<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
	 * Get comments for the news item.
	 */
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
}
