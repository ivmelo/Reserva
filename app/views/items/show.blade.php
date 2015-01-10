@extends('templates.default')

@section('content')

<h1 class="page-header">{{ $item->name }}</h1>

<div class="row">
	<div class="col-md-2">
		<div style="margin-bottom: 5px;">
			{{ HTML::link('items/' . $item->id . '/edit', 'Edit', array('class' => 'btn btn-success btn-block')) }}
		</div>
		<div style="margin-bottom: 5px;">
			{{ Form::open(array('action' => array('ItemsController@destroy', $item->id), 'method' => 'delete')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}
			{{ Form::close() }}
		</div>
		<div style="margin-bottom: 5px;">
			{{ HTML::link('items', 'Go back', array('class' => 'btn btn-primary btn-block')) }}
		</div>
		
		
		
		
	</div>
	<div class="col-md-10">
		<dl>
			<dt>#ID</dt>
	 		<dd>{{ $item->id }}</dd>
			<dt>Name</dt>
	 		<dd>{{ $item->name }}</dd>
	 		<dt>Quantity</dt>
			<dd>{{ $item->amount }}</dd>
	 		<dt>Description</dt>
			<dd>{{ $item->description }}</dd>
	  	</dl>
	</div>
</div>

</table>

@if(count($item->reservations) > 0)

<h3 class="sub-header">Reservation history ({{ count($item->reservations) }})</h3>

<div class="table-responsive">
<table class="table table-striped">
	<thead>
	<tr>
		<th>User</th>
		<th>From</th>
		<th>To</th>
		<th>Message</th>
		<th>Status</th>
		<th>Created</th>
		<th>Updated</th>
	</tr>
	</thead>

	<tbody>
	@foreach($item->reservations as $reservation)
	<tr>
		<td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
		<td>{{ $reservation->start_date }}</td>
		<td>{{ $reservation->end_date }}</td>
		<td>{{ Str::words($reservation->message, 8) }}</td>
		<td>{{ $reservation->status}}</td>
		<td>{{ $reservation->created_at }}</td>
		<td>{{ $reservation->updated_at }}</td>
	</tr>
	@endforeach
	</tbody>
</table>

@else
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Hey!</strong> There are no reservations for this item.
</div>
@endif

@stop
