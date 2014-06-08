<?php namespace Tracker;

class Comment extends \Eloquent {
	protected $fillable = [];

	public function application()
	{
		return $this->belongsTo('Tracker\Application');
	}
}