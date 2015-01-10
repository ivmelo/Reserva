<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(30);
		return View::make('users.index', ['users' => $users]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(
			Input::all(),
			array(
				'first_name' => 'required|max:64',
				'last_name' => 'required|max:64',
				'email' => 'required|email|unique:users'
			)
		);

		if ($validator->fails()) {
			// $messages = $validator->messages();
			// print_r ($messages->get('first_name'));
			return Redirect::route('users.create')->withErrors($validator)->withInput();
		} else {

			$user = new User();
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->is_admin = FALSE;
			if (Input::has('is_admin'))
				$user->is_admin = Input::get('is_admin');
				$user->password = Hash::make(Input::get('password'));
			$user->save();
			Session::flash('message', 'Created with success!');
			return Redirect::route('users.index');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('users.show', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('users.edit', ['user' => $user]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Set validation rules
		$validator = Validator::make(
			Input::all(),
			array(
				'first_name' => 'required|max:64',
				'last_name' => 'required|max:64',
				'email' => 'required|email'
			)
		);

		// If the validation fails
		if ($validator->fails()) {
			// $messages = $validator->messages();
			// print_r ($messages->get('first_name'));
			return Redirect::route('users.edit', $id)->withErrors($validator)->withInput();
		} else {

			$user = User::find($id);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->is_admin = FALSE;
			if (Input::has('is_admin'))
				$user->is_admin = Input::get('is_admin');
			$user->save();
			Session::flash('message', 'Edited with success!');
			return Redirect::route('users.index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Finds the user
		$user = User::find($id);
		// Delete all user's reservations
		foreach ($user->reservations as $reservation) {
			$reservation->delete();
		}
		// Delete the user
		$user->delete();

		// Set flash message and redirect to index page
		Session::flash('message', 'User deleted successfully!');
		return Redirect::route('users.index');
	}


}
