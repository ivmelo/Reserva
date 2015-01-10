@extends('templates.default')

@section('content')
	{{ HTML::link('items/create', 'Add a new item', array('class' => 'btn btn-primary pull-right')) }}
	<h1 class="page-header">Items</h1>

	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Description</th>
			<th>Added</th>
			<th>Modified</th>
			<th>Actions</th>
		</tr>
		</thead>

		<tbody>
		@foreach($items as $item)
		<tr>
			<td>{{ $item->id }}</td>
			<td>{{ $item->name }}</td>
			<td>{{ $item->amount }}</td>
			<td>{{ $item->description }}</td>
			<td>{{ $item->created_at }}</td>
			<td>{{ $item->updated_at }}</td>
			<td>{{ HTML::link('items/' . $item->id, 'View', array('class' => 'btn btn-primary btn-sm pull-right')) }}</td>
		</tr>
		@endforeach
		</tbody>

	</table>
	</div>
@stop