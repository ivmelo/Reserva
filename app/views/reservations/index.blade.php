<h1>All requests</h1>

@if (Session::get('message'))
<p style="color: green">{{ Session::get('message') }}</p>
@endif

<table>
	<tr>
		<th>Item</th>
		<th>From</th>
		<th>To</th>
		<th>Obs</th>
		<th>User</th>
		<th>Created</th>
		<th>Updated</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>

@foreach($reservations as $reservation)
	<tr>
		<td>{{ $reservation->item->name }}</td>
		<td>{{ $reservation->start_date }}</td>
		<td>{{ $reservation->end_date }}</td>
		<td>{{ $reservation->message }}</td>
		<td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
		<td>{{ $reservation->created_at }}</td>
		<td>{{ $reservation->updated_at }}</td>
		<td>{{ $reservation->status }}</td>
		<td>{{ HTML::link('reservations/' . $reservation->id . '/edit', 'edit') }} {{ HTML::link('reservations/' . $reservation->id, 'view') }}</td>
	</tr>
@endforeach
</table>
{{ $reservations->links() }}
{{ HTML::link('reservations/create', 'Make a reservation') }}