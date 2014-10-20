<h1>Edit user</h1>

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'patch')) }}

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
		{{ Form::checkbox('is_admin') }} Is admin {{ Form::submit('Save') }}		
	</div>
	

{{ Form::close() }}