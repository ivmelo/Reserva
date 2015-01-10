<?php

class ReservationsController extends \BaseController {

	public function __construct() {
		//$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		/*$requests = Request::all();
		$requests
		return $requests;//View::make('requests.index');*/

		if(Auth::user()->is_admin) {
			$reservations = Reservation::paginate(30);
		} else {
			$reservations = Reservation::where('user_id', '=', Auth::user()->id)->paginate(30);
		}

		//$reservations = Reservation::paginate(30);
		return View::make('reservations.index', ['reservations' => $reservations]);
		//return Auth::user()->first_name;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('reservations.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$validator = Validator::make(
			Input::all(),
			array (
				'email' => 'required|email|exists:users',
				'item_id' => 'required',
				'start_date' => 'required|date',
				'end_date' => 'required|date',
				'message' => 'required|max:1000',
			)
		);

		if($validator->fails()) {
			return Redirect::route('reservations.create')->withErrors($validator)->withInput();
		} else {
			$user =	User::where('email', '=', Input::get('email'))->first();
			$item = Item::find(Input::get('item_id'));

			$reservation = new Reservation();
			$reservation->user()->associate($user);
			$reservation->item()->associate($item);
			$reservation->start_date = new DateTime(Input::get('start_date'));
			$reservation->end_date = new DateTime(Input::get('end_date'));
			$reservation->message = Input::get('message');
			$reservation->status = 1;
			$reservation->save();

			Session::flash('message', 'Created with success!');

			return Redirect::route('reservations.index');
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
		//
		$reservation = Reservation::find($id);

		// Forbidding users to access other reservations
		// that doesn't belong to them
		if (! Auth::user()->is_admin) 
		{
			if ($reservation->user->id != Auth::user()->id) 
			{
				return Redirect::to(URL::route('reservations.index'))->with('message', 'You don\'t have permission to access that page!');			
			}
		}
		
		return View::make('reservations.show', compact('reservation'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$reservation = Reservation::find($id);
		return View::make('reservations.edit', compact('reservation'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$validator = Validator::make(
			Input::all(),
			array (
				'user_id' => 'required',
				'item_id' => 'required',
				'start_date' => 'required|date',
				'end_date' => 'required|date',
				'message' => 'required|max:1000',
			)
		);

		if($validator->fails()) {
			return Redirect::route('reservations.edit', $id)->withErrors($validator)->withInput();
		} else {
			$user = User::find(Input::get('user_id'));
			$item = Item::find(Input::get('item_id'));

			$reservation = Reservation::find($id);
			$reservation->user()->associate($user);
			$reservation->item()->associate($item);
			$reservation->start_date = new DateTime(Input::get('start_date'));
			$reservation->end_date = new DateTime(Input::get('end_date'));
			$reservation->message = Input::get('message');
			$reservation->status = 1;
			$reservation->save();

			Session::flash('message', 'Updated with success!');

			return Redirect::route('reservations.index');
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
		//
		$reservation = Reservation::find($id);
		$reservation->delete();

		Session::flash('message', 'Deleted with success!');

		return Redirect::route('reservations.index');
	}

	/**
	 * Return the amount of reserved itens within
	 * a given date interval and an Item id
	 *
	 * @param  string  $start_date
	 * @param  String  $end_date
	 * @return Response
	 */
	private function getBusyItems($start_date, $end_date, $item_id)
	{
		// Essa é a maior gambiarra que eu já fiz, mas acho que funciona bem,
		// por favor, não me peça para explicar pq eu não sei, :P
		$busy = Reservation::whereRaw('((end_date between "' . $start_date . '" and "' . $end_date . '") '
			.'or (start_date between "' . $start_date . '" and "' . $end_date . '") '
			.'or (start_date < "' . $start_date . '" and end_date > "' . $end_date . '"))')->where('item_id', '=', $item_id)->count();

		return $busy;
	}


}
