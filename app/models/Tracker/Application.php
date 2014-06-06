<?php namespace Tracker;

class Application extends \Eloquent {

	protected $fillable = [];
    
    protected $guarded = [];

    public function candidate()
    {
    	return $this->belongsTo('Candidate');
    }

	public function comments()
	{
		return $this->hasMany('Comments');
	}

	public function creator()
	{
		return $this->hasOne('User', 'id', 'created_by');
	}

	public function claimer()
	{
		return $this->hasOne('User', 'id', 'claimed_by');
	}

	public function closer()
	{
		return $this->hasOne('User', 'id', 'closed_by');
	}
}