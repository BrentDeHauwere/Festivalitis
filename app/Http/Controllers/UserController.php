<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

		// Hash password and remove password_confirmation from array
		$input['password'] = Hash::make($input['password']);
		array_forget($input, 'password_confirmation');

		if (Auth::user()->admin == true)
		{
			$input['admin'] = true;
		}
		else
		{
			$input['admin'] = false;
		}
		
		$user = User::create($input);

		return redirect()->action('HomeController@configurationPanel')->with('success', 'Account was successfully created.');
	}
}
