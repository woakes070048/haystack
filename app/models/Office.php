<?php

class Office extends \Eloquent {
	
	protected $fillable = [];

	public function employees()
	{
		return $this->hasMany('User');
	}
}