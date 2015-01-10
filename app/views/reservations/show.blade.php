@extends('templates.default')

@section('content')

<h1 class="page-header">Reservation details</h1>

<div class="row">
	<div class="col-md-2">
		<div style="margin-bottom: 5px;">
			{{ HTML::link('reservations/' . $reservation->id . '/edit', 'Edit', array('class' => 'btn btn-success btn-block')) }}
		</div>
		<div style="margin-bottom: 5px;">
			{{ Form::open(array('action' => array('ReservationsController@destroy', $reservation->id), 'method' => 'delete')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}
			{{ Form::close() }}
		</div>
		<div style="margin-bottom: 5px;">
			{{ HTML::link('reservations', 'Go back', array('class' => 'btn btn-primary btn-block')) }}
		</div>
	</div>


	<div class="col-md-5">
		<dt></dt>
			<dt>#</dt>
	 		<dd>{{ $reservation->id }}</dd>
			<dt>User</dt>
	 		<dd>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</dd>
	 		<dt>From</dt>
	 		<dd>{{ $reservation->start_date->format('M d, Y h:i a') }}</dd>
	 		<dt>To</dt>
	 		<dd>{{ $reservation->end_date->format('M d, Y h:i a') }}</dd>
	</div>

	<div class="col-md-5">
		<dl>
	 		<dt>Status</dt>
	 		<dd>{{ $reservation->status }}</dd>
	 		<dt>Created at</dt>
	 		<dd>{{ $reservation->created_at->format('M d, Y h:i a') }}</dd>
	 		<dt>Updated at</dt>
	 		<dd>{{ $reservation->updated_at->format('M d, Y h:i a') }}</dd>
	 		<dt>Return time</dt>
	 		<dd>{{ $reservation->end_date->diffForHumans($reservation->start_date) }} pick up</dd>
	  	</dl>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<dl>
			<dt>Message</dt>
			<dd>{{ $reservation->message }}</dd>
		</dl>
	</div>
</div>




@stop
