@extends('templates.default')

@section('content')

<h1 class="page-header">Edit user</h1>

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'patch')) }}

	<div class="form-group">
		{{ Form::label('first_name', 'First name') }}
		{{ Form::text('first_name', NULL, array('class' => 'form-control', 'placeholder' => 'First name')) }}
		{{ $errors->first('first_name') }}
	</div>

	<div class="form-group">
		{{ Form::label('last_name', 'Last name') }}
		{{ Form::text('last_name', NULL, array('class' => 'form-control', 'placeholder' => 'Last name')) }}
		{{ $errors->first('last_name') }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', NULL, array('class' => 'form-control', 'placeholder' => 'Email')) }}
		{{ $errors->first('email') }}
	</div>


	<div class="checkbox">
		<label>
        	{{ Form::checkbox('is_admin') }} Make admin
		</label>
    </div>

	{{ Form::submit('Save!', array('class' => 'btn btn-success btn-lg')) }}		

{{ Form::close() }}

@stop



