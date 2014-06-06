<?php namespace Atticus\Repositories\Tracker\Application\Eloquent;

use Atticus\Repositories\Tracker\Application\ApplicationInterface;
use Atticus\Repositories\DbRepository;
use Application;

class ApplicationRepository extends DbRepository implements ApplicationInterface {

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

}