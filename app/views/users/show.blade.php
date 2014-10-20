<h1>{{ $user->first_name }}'s details</h1>

<table>
	<tr><td>Name:</td><td>{{ $user->first_name }} {{ $user->last_name }}</td></tr>
	<tr><td>Email:</td><td>{{ $user->email }}</td></tr>
	<tr><td>Perm.:</td>
	<td>
		@if ($user->is_admin)
		[adm]
		@else
		[ordinary]
		@endif
	</td>
	<tr><td></td><td>{{ HTML::link('users/' . $user->id . '/edit', 'edit') }} {{ HTML::link('users', 'go back') }}</td></tr>
</tr>
</table>

@if(count($user->reservations) > 0)
<h3>{{ $user->first_name }}'s  request history</h3>

<table>
	<tr>
		<th>Item</th>
		<th>From</th>
		<th>To</th>
		<th>Message</th>
		<th>Status</th>
		<th>Created</th>
		<th>Updated</th>
	</tr>

@foreach($user->reservations as $reservation)
	<tr>
		<td>{{ $reservation->item->name }}</td>
		<td>{{ $reservation->start_date }}</td>
		<td>{{ $reservation->end_date }}</td>
		<td>{{ $reservation->message }}</td>
		<td>{{ $reservation->status}}</td>
		<td>{{ $reservation->created_at }}</td>
		<td>{{ $reservation->updated_at }}</td>
	</tr>
@endforeach
</table>
@else
<p>No requests for this user</p>
@endif
