<?php namespace Atticus\Repositories\Tracker\Candidate\Eloquent;

use Atticus\Repositories\Tracker\Candidate\CandidateInterface;
use Atticus\Repositories\DbRepository;
use Tracker\Candidate as Candidate;

class CandidateRepository extends DbRepository implements CandidateInterface {

	protected $model;

	public function __construct(Candidate $model)
	{
		$this->model = $model;
	}

	public function firstOrCreateByEmail($email, array $input)
	{
		$candidate = $this->model->where('email', '=', $email)->first();

		if ( !$candidate )
		{
        	$candidate = $this->create($input);
		}

		return $candidate;
	}

}