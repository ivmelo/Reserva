<h1>New user</h1>

{{ Form::open(array('route' => 'users.store')) }}

	<div>
		{{ Form::label('first_name', 'First name:') }}
		{{ Form::text('first_name') }}
	</div>

	<div>
		{{ Form::label('last_name', 'Last name:') }}
		{{ Form::text('last_name') }}
	</div>

	<div>
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email') }}
	</div>

	<div>
		{{ Form::checkbox('is_admin') }} Is admin {{ Form::submit('Create!') }}		
	</div>
	

{{ Form::close() }}