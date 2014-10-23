@extends('templates.default')

@section('content')
<h1 class="page-header">New reservation</h1>

<div class="row">
	<div class="col-md-6">
			{{ Form::open(array('route' => 'reservations.store')) }}
			<div class="form-group">
				{{ Form::label('item_id', 'Item:') }}
				{{ Form::select('item_id', Item::lists('name', 'id'), NULL, array('class' => 'form-control')) }}
				{{ $errors->first('item_id') }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'User email:') }}
				{{ Form::text('email', NULL, array('class' => 'form-control', 'placeholder' => 'your corporative email goes here')) }}
				{{ $errors->first('email') }}
			</div>
	</div>
	<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('start_date', 'From') }}
				{{ Form::text('start_date', NULL, array('class' => 'form-control', 'placeholder' => 'here you tell us when you need it')) }}
				{{ $errors->first('start_date') }}
			</div>
			<div class="form-group">
				{{ Form::label('end_date', 'To') }}
				{{ Form::text('end_date', NULL, array('class' => 'form-control', 'placeholder' => 'and when you\'re gonna return it')) }}
				{{ $errors->first('end_date') }}
			</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
				{{ Form::label('message', 'Message') }}
				{{ Form::textarea('message', NULL, array('class' => 'form-control', 'placeholder' => 'please describe why you need the item and how you want it to be set up')) }}
				{{ $errors->first('message') }}
			</div>
			<div>
				{{ Form::submit('Book', array('class' => 'btn btn-lg btn-success')) }}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop