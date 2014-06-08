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

	public function cascadingDelete($id)
	{
		$team = $this->findById($id);

		$unkn = $this->where('name', '=', 'Unassigned');

		foreach ($team->employees as $employee) 
		{
			$employee->team_id = $unkn->first()->id;
			$employee->save();
		}

		if ( $this->delete($id) )
		{
			return true;
		}
	}

}