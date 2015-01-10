@extends('templates.default')

@section('content')

<h1 class="page-header">{{ $user->first_name }} {{ $user->last_name }}'s details</h1>

<div class="row">
	<div class="col-md-2">
		<div style="margin-bottom: 5px;">
			{{ HTML::link('users/' . $user->id . '/edit', 'Edit', array('class' => 'btn btn-success btn-block')) }}
		</div>
		<div style="margin-bottom: 5px;">
			{{ Form::open(array('action' => array('UsersController@destroy', $user->id), 'method' => 'delete')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}
			{{ Form::close() }}
		</div>
		<div style="margin-bottom: 5px;">
			{{ HTML::link('users', 'Go back', array('class' => 'btn btn-primary btn-block')) }}
		</div>
		
		
		
		
	</div>
	<div class="col-md-5">
		<dl>
			<dt>User #Id</dt>
	 		<dd>{{ $user->id }}</dd>
			<dt>Full name</dt>
	 		<dd>{{ $user->first_name }} {{ $user->last_name }}</dd>
	 		<dt>Email</dt>
			<dd>{{ $user->email }}</dd>
			<dt>Access level:</dt>
			<dd>
			@if ($user->is_admin)
				<span class="label label-info">Admin</span>
			@else
				<span class="label label-default">Ordinary</span>
			@endif
	  		</dd>
	  	</dl>
	</div>
	<div class="col-md-5">
		<dl>
			<dt>Created on</dt>
	 		<dd>{{ $user->created_at->format('M d, Y h:i a') }}</dd>
			<dt>Updated on</dt>
	 		<dd>{{ $user->updated_at->format('M d, Y h:i a') }}</dd>
	  	</dl>
	</div>
</div>

</table>

@if(count($user->reservations) > 0)

<h3 class="sub-header">{{ $user->first_name }}'s  reservation history ({{ count($user->reservations) }})</h3>

<div class="table-responsive">
<table class="table table-striped">
	<thead>
	<tr>
		<th>Item</th>
		<th>From</th>
		<th>To</th>
		<th>Message</th>
		<th>Status</th>
		<th>Created</th>
		<th>Updated</th>
	</tr>
	</thead>

	<tbody>
	@foreach($user->reservations as $reservation)
	<tr>
		<td>{{ $reservation->item->name }}</td>
		<td>{{ $reservation->start_date->format('M d, Y h:i a') }}</td>
		<td>{{ $reservation->end_date->format('M d, Y h:i a') }}</td>
		<td>{{ Str::words($reservation->message, 8) }}</td>
		<td>{{ $reservation->status}}</td>
		<td>{{ $reservation->created_at->format('M d, Y h:i a') }}</td>
		<td>{{ $reservation->updated_at->format('M d, Y h:i a') }}</td>
	</tr>
	@endforeach
	</tbody>
</table>

@else
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Hey!</strong> There are no reservations for this user.
</div>
@endif

@stop
