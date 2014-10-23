@extends('templates.default')


@section('content')
{{ HTML::link('users/create', 'Create new user', array('class' => 'btn btn-primary pull-right')) }}
<h1 class="page-header">Users</h1> 

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
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Permissions</th>
		<th>Actions</th>
	</tr>
	</thead>

	<tbody>
	@foreach($users as $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td>{{ $user->first_name }}</td>
		<td>{{ $user->last_name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if($user->is_admin) 
			<span class="label label-info">Admin</span>
			@endif
		</td>
		<td>{{ HTML::link('users/' . $user->id, 'View', array('class' => 'btn btn-primary btn-sm pull-right')) }}</td>
	</tr>
	@endforeach
	</tbody>

</table>
</div>
{{ $users->links() }}

@stop