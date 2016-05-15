<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * Get the user that owns the ticket.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
