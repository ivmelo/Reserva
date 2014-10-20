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

}
