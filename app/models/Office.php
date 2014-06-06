<?php

use Laracasts\Presenter\PresentableTrait;

class Office extends \Eloquent {

	use PresentableTrait;

    protected $presenter = 'OfficePresenter';

	protected $fillable = [];

	protected $guarded = [];

	protected $softDeletes = true;

	public function employees()
	{
		return $this->hasMany('User');
	}
}