@extends('templates.default')

@section('content')
<h1 class="page-header">Modify reservation</h1>

<div class="row">
	<div class="col-md-6">
			
			{{ Form::model($reservation, array('route' => array('reservations.update', $reservation->id), 'method' => 'patch')) }}

			<div class="form-group">
				{{ Form::label('item_id', 'Item:') }}
				{{ Form::select('item_id', Item::lists('name', 'id'), NULL, array('class' => 'form-control')) }}
				{{ $errors->first('item_id') }}
			</div>
			<div class="form-group">
				{{ Form::label('user_id', 'User:') }}
				{{ Form::select('user_id', User::lists('first_name', 'id'), NULL, array('class' => 'form-control')) }}
				{{ $errors->first('user_id') }}
			</div>
	</div>
	<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('start_date', 'From') }}
				{{ Form::text('start_date', NULL, array('class' => 'form-control')) }}
				{{ $errors->first('start_date') }}
			</div>
			<div class="form-group">
				{{ Form::label('end_date', 'To') }}
				{{ Form::text('end_date', NULL, array('class' => 'form-control')) }}
				{{ $errors->first('end_date') }}
			</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
				{{ Form::label('message', 'Message') }}
				{{ Form::textarea('message', NULL, array('class' => 'form-control')) }}
				{{ $errors->first('message') }}
			</div>
			<div>
				{{ Form::submit('Book', array('class' => 'btn btn-lg btn-success')) }}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop