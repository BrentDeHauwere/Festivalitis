<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
	/**
	 * Send an email to contact the organisation.
	 *
	 * @param MailRequest $request
	 * @return Response
	 */
	public function send(Requests\MailRequest $request)
	{
		$mail = $request->all();
		Mail::send('mail', ['mail' => $mail], function ($message) use ($mail) {
			$message->from('festivalitis_noreply@yahoo.com', "{$mail['fname']} {$mail['lname']}");
			$message->to('festivalitis_noreply@yahoo.com', 'Festivalitis')->subject('Festivalitis - Contact');
		});
	}
}
