<?php namespace Tracker;

class Application extends \Eloquent {

	protected $fillable = [];
    
    protected $guarded = [];

    public function candidate()
    {
    	return $this->belongsTo('Tracker\Candidate');
    }

    public function office($id)
    {
    	return $this->hasOne('Office', 'id', "preferred_location".$id);
    }

    public function team()
    {
    	return $this->hasOne('Team', 'id', 'preferred_team');
    }

	public function comments()
	{
		return $this->hasMany('Tracker\Comment');
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