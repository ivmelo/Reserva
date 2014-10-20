<h1>New reservation</h1>

{{ Form::open(array('route' => 'reservations.store')) }}
	<div>
		{{ Form::label('item_id', 'Item:') }}
		{{ Form::select('item_id', Item::lists('name', 'id')) }}
	</div>
	<div>
		{{ Form::label('user_id', 'User:') }}
		{{ Form::select('user_id', User::lists('first_name', 'id')) }}
	</div>
	<div>
		{{ Form::label('start_date', 'From') }}
		{{ Form::text('start_date') }}
	</div>
	<div>
		{{ Form::label('end_date', 'To') }}
		{{ Form::text('end_date') }}
	</div>
	<div>
		{{ Form::label('message', 'Message') }}
		{{ Form::textarea('message') }}
	</div>
	<div>
		{{ Form::submit('Book') }}
	</div>
	<div>

	</div>
	<div>

	</div>
	<div>

	</div>
{{ Form::close() }}