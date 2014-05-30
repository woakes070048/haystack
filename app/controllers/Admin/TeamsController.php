<?php namespace Admin;

use Atticus\Repositories\Team\TeamInterface;
use View;

class TeamsController extends \BaseController {

	protected $teamRepo;

	public function __construct(TeamInterface $team)
	{
		$this->teamRepo = $team;
	}

	/**
	* Display a listing of the resource.
	* GET /admin/teams
	*
	* @return Response
	*/
	public function index()
	{
		$teams = $this->teamRepo->all();

		return View::make('admin.teams.index')->withTeams($teams);
	}
}