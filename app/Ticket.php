<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'user_id'];
	
	/**
	 * Get the user that owns the ticket.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
