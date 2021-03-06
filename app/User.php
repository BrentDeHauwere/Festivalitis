<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'admin'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = ['password'];
	
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
