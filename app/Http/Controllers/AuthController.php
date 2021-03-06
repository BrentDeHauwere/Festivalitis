<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	/**
	 * Show the view to authenticate a user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			return redirect()->action('HomeController@index');
		}

		return view('login');
	}

	/**
	 * Authenticate a user.
	 *
	 * @param Request
	 * @return Response
	 */
	public function login(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');

		if (Auth::attempt(['email' => $email, 'password' => $password]))
		{
			return redirect()->intended('/');
		}
		else
		{
			return redirect('login')->with('error', 'Wrong mail and/or password. Please try again.');
		}
	}

	/**
	 * Log a user out.
	 *
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout();

		return redirect('login');
	}
}
