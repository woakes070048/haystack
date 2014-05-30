<?php namespace Atticus\Repositories\Team\Eloquent;

use Atticus\Repositories\Team\TeamInterface;
use Atticus\Repositories\DbRepository;
use Team;

class TeamRepository extends DbRepository implements TeamInterface {

	protected $model;

	public function __construct(Team $model)
	{
		$this->model = $model;
	}

}