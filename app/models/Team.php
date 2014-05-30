<?php

class Team extends \Eloquent {
	
	protected $fillable = [];

	public function employees()
	{
		return $this->hasMany('User');
	}
}