@extends('templates.default')

@section('content')

{{ HTML::link('reservations/create', 'Make a reservation', array('class' => 'btn btn-primary pull-right')) }}
<h1 class="page-header">Reservations</h1>

@if (Session::get('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Hey!</strong> {{ Session::get('message') }}
</div>
@endif

<div class="table-responsive">
<table class="table table-striped">
	<thead>
	<tr>
		<th>#</th>
		<th>Item</th>
		<th>From</th>
		<th>To</th>
		<th>Obs</th>
		<th>User</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	</thead>

	<tbody>
	@foreach($reservations as $reservation)
	<tr>
		<td>{{ $reservation->id }}</td>
		<td>{{ $reservation->item->name }}</td>
		<td>{{ $reservation->start_date->format('M d, Y h:i a') }}</td>
		<td>{{ $reservation->end_date->format('M d, Y h:i a') }}</td>
		<td>{{ Str::words($reservation->message, 8) }}</td>
		<td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
		<td><span class="badge">{{ $reservation->status }}</span></td>
		<td>{{ HTML::link('reservations/' . $reservation->id, 'View', array('class' => 'btn btn-sm btn-primary')) }}</td>
	</tr>
	@endforeach
	</tbody>
</table>
</div>
{{ $reservations->links() }}

@stop