<?php

use Laracasts\Presenter\PresentableTrait;

class Team extends \Eloquent {
	
	use PresentableTrait;

    protected $presenter = 'TeamPresenter';
    
	protected $fillable = [];

	protected $softDeletes = true;

	public function employees()
	{
		return $this->hasMany('User');
	}

	public function applicants()
	{

	}
}