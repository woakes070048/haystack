<?php namespace Tracker;

class Candidate extends \Eloquent {
	
	protected $fillable = ['name', 'email'];

	public function applications()
	{
		return $this->hasMany('Tracker\Application');
	}	
}