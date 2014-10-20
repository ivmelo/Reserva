<?php

class Item extends Eloquent {

	public function reservations()
	{
		return $this->hasMany('Reservation');
	}

}
