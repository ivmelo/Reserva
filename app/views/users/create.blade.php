@extends('templates.default')

@section('content')

<h1 class="page-header">Create user</h1>

{{ Form::open(array('route' => 'users.store')) }}

	<div class="form-group">
		{{ Form::label('first_name', 'First name') }}
		{{ Form::text('first_name','', array('class' => 'form-control', 'placeholder' => 'First name')) }}
		{{ $errors->first('first_name') }}
	</div>

	<div class="form-group">
		{{ Form::label('last_name', 'Last name') }}
		{{ Form::text('last_name','', array('class' => 'form-control', 'placeholder' => 'Last name')) }}
		{{ $errors->first('last_name') }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email','', array('class' => 'form-control', 'placeholder' => 'Email')) }}
		{{ $errors->first('email') }}
	</div>


	<div class="checkbox">
		<label>
        	{{ Form::checkbox('is_admin', 1, null, ['id' => 'is_adm_checkbox']) }} Make admin
		</label>
    </div>

    <div class="form-group hidden" id="password_field">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
		{{ $errors->first('password') }}
	</div>

	{{ Form::submit('Create!', array('class' => 'btn btn-success btn-lg')) }}		

{{ Form::close() }}

@stop

@section('scripts')
<script type="text/javascript">
	$('#is_adm_checkbox').click(function(){
		$('#password_field').toggleClass('hidden', null, 400);
	});
</script>
@stop