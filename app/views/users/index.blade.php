<h1>Users</h1>

@if (Session::get('message'))
<p style="color: green">{{ Session::get('message') }}</p>
@endif
<table>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Permissions</th>
		<th>Actions</th>
	</tr>

	@foreach($users as $user)
	<tr>
		<td>{{ $user->first_name }}</td>
		<td>{{ $user->last_name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if($user->is_admin) 
			[admin]
			@endif
		</td>
		<td>{{ HTML::link('users/' . $user->id . '/edit', 'edit') }} {{ HTML::link('users/' . $user->id, 'view') }}</td>
	</tr>
	@endforeach
</table>
{{ $users->links() }}

{{ HTML::link('users/create', 'Create new user') }}