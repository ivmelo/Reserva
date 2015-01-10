@extends('templates.default')

@section('content')
<h1 class="page-header">New reservation</h1>

<div class="row">
	<div class="col-md-6">
			{{ Form::open(array('route' => 'reservations.store')) }}
			<div class="form-group">
				{{ Form::label('item_id', 'Item:') }}
				{{ Form::select('item_id', Item::lists('name', 'id'), NULL, array('class' => 'form-control')) }}
				{{ $errors->first('item_id') }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'User email:') }}
				@if(Auth::user()->is_admin)
				{{ Form::text('email', NULL, array('class' => 'form-control', 'placeholder' => 'a corporative email goes here')) }}
				@else
				{{ Form::text('email', Auth::user()->email, array('class' => 'form-control', 'placeholder' => 'your corporative email goes here', 'readonly')) }}
				@endif
				{{ $errors->first('email') }}
			</div>
	</div>
	<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('start_date', 'From') }}
				{{ Form::text('start_date', NULL, array('id' => 'start_date', 'class' => 'form-control', 'placeholder' => 'here you tell us when you need it')) }}
				{{ $errors->first('start_date') }}
			</div>
			<div class="form-group">
				{{ Form::label('end_date', 'To') }}
				{{ Form::text('end_date', NULL, array('id' => 'end_date', 'class' => 'form-control', 'placeholder' => 'and when you\'re gonna return it')) }}
				{{ $errors->first('end_date') }}
			</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
				{{ Form::label('message', 'Message') }}
				{{ Form::textarea('message', NULL, array('class' => 'form-control', 'placeholder' => 'please describe why you need the item and how you want it to be set up')) }}
				{{ $errors->first('message') }}
			</div>
			<div>
				{{ Form::submit('Book', array('class' => 'btn btn-lg btn-success')) }}
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datetimepicker-master/jquery.datetimepicker.css') }}">
@stop

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/datetimepicker-master/jquery.datetimepicker.js') }}"></script>
<script type="text/javascript">

	jQuery(function(){
		jQuery('#start_date').datetimepicker({
			onShow:function( ct ){
			this.setOptions({
				maxDate:jQuery('#end_date').val()?jQuery('#end_date').val():false,
				allowTimes:[
	  				'05:00', '05:15', '05:30', '05:45',
	  				'06:00', '06:15', '06:30', '06:45',
	  				'07:00', '07:15', '07:30', '07:45',
	  				'08:00', '08:15', '08:30', '08:45',
	  				'09:00', '09:15', '09:30', '09:45',
	  				'10:00', '10:15', '10:30', '10:45',
		  			'11:00', '11:15', '11:30', '11:45',
		  			'12:00', '12:15', '12:30', '12:45',
		  			'13:00', '13:15', '13:30', '13:45',
		  			'14:00', '14:15', '14:30', '14:45',
		  			'15:00', '15:15', '15:30', '15:45',
		  			'16:00', '16:15', '16:30', '16:45',
		  			'17:00', '17:15', '17:30', '17:45',
		  			'18:00', '18:15', '18:30', '18:45',
 				],
 				minDate: '{{ Carbon::now() }}',
			})
		},

		});

		jQuery('#end_date').datetimepicker({
			onShow:function( ct ){
			this.setOptions({
				minDate:jQuery('#start_date').val()?jQuery('#start_date').val():false,
				allowTimes:[
	  				'05:00', '05:15', '05:30', '05:45',
	  				'06:00', '06:15', '06:30', '06:45',
	  				'07:00', '07:15', '07:30', '07:45',
	  				'08:00', '08:15', '08:30', '08:45',
	  				'09:00', '09:15', '09:30', '09:45',
	  				'10:00', '10:15', '10:30', '10:45',
		  			'11:00', '11:15', '11:30', '11:45',
		  			'12:00', '12:15', '12:30', '12:45',
		  			'13:00', '13:15', '13:30', '13:45',
		  			'14:00', '14:15', '14:30', '14:45',
		  			'15:00', '15:15', '15:30', '15:45',
		  			'16:00', '16:15', '16:30', '16:45',
		  			'17:00', '17:15', '17:30', '17:45',
		  			'18:00', '18:15', '18:30', '18:45',
 				],
			})
		},

		});
	});
</script>
@stop

