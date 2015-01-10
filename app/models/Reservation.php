<?php

class Reservation extends Eloquent {

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function item()
	{
		return $this->belongsTo('Item');
	}

	public function getDates()
	{
		return array('created_at', 'updated_at', 'start_date', 'end_date');
	}

}
