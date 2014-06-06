<?php

use Laracasts\Presenter\PresentableTrait;

class Office extends \Eloquent {

	use PresentableTrait;

    protected $presenter = 'OfficePresenter';

	protected $fillable = [];

	public function employees()
	{
		return $this->hasMany('User');
	}
}