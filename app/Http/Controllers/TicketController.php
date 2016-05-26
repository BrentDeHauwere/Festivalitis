<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
	/**
	 * Store a newly created ticket in storage.
	 *
	 * @param TicketRequest $request
	 * @return Response
	 */
	public function store(TicketRequest $request)
	{
		$input = $request->all();
		$input['user_id'] = Auth::id();

		$ticket = Ticket::create($input);

		// Option 2:
		// $ticket = new Article($request->all());
		// $ticket->save();

		return redirect()->action('HomeController@index')->with('success', 'Thank you for ordering tickets. Shortly, you will receive an email to go over to the transaction.');
	}
}
