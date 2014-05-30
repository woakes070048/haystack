<?php namespace Atticus\Repositories\Office\Eloquent;

use Atticus\Repositories\Office\OfficeInterface;
use Atticus\Repositories\DbRepository;
use Office;

class OfficeRepository extends DbRepository implements OfficeInterface {

	protected $model;

	public function __construct(Office $model)
	{
		$this->model = $model;
	}

}