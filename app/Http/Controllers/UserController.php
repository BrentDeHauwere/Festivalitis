<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('register');
	}

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

		if (Auth::check() && Auth::user()->admin == true)
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

	/**
	 * Set an image for a user.
	 *
	 * @param Request
	 * @return Response
	 */
	public function image(Request $request)
	{
		// Server-side validation
		$validator = Validator::make($request->all(), [
			'image' => 'required|image',
		]);

		if ($validator->fails()) {
			return redirect()->back()
				->with('error', $validator->errors()->first('image'));
		}

		// First check if there was an image uploaded already, if so remove
		$paths = glob(storage_path() . '/app/user_images/' . Auth::user()->id . '*');
		if (count($paths) != 0) {
			unlink($paths[0]);
		}

		$destinationPath = storage_path() . '/app/user_images/';
		$fileName = Auth::user()->id . '.' . $request->file('image')->getClientOriginalExtension();
		$request->file('image')->move($destinationPath, $fileName);

		return redirect()->back()->with('success', 'Your profile picture was successfully uploaded.');
	}
}
