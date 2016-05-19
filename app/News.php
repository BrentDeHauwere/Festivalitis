<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	
    /**
	 * Get comments for the news item.
	 */
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
}
