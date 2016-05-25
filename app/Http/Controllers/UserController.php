<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	/**
	 * Store a newly created user in storage.
	 *
	 * @param UserRequest $request
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$input = $request->all();
		if (Auth::user()->admin == true)
		{
			$input['admin'] = true;
		}
		else
		{
			$input['admin'] = false;
		}
		
		$user = User::create($input);
	}
}
