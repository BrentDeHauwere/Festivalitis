<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	/**
	 * Get comments from the user.
	 */
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	/**
	 * Get tickets from the user.
	 */
	public function tickets()
	{
		return $this->hasMany('App\Ticket');
	}
}
