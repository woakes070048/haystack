<?php namespace Atticus\Repositories\Tracker\Candidate\Eloquent;

use Atticus\Repositories\Tracker\Candidate\CandidateInterface;
use Atticus\Repositories\DbRepository;
use Candidate;

class CandidateRepository extends DbRepository implements CandidateInterface {

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

}