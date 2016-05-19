<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'admin'];
	
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
