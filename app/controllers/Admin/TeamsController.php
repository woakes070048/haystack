<?php namespace Admin;

use Atticus\Repositories\Team\TeamInterface;
use Atticus\Forms\Teams\Save as SaveForm;
use Auth, Input, View;

class TeamsController extends \BaseController {

	protected $teamRepo;

	protected $saveForm;

	public function __construct(TeamInterface $team, SaveForm $save)
	{
		$this->teamRepo = $team;

		$this->saveForm = $save;
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

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/teams
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('name', 'abbrv', 'practice');

		$this->saveForm->validate($input);

		$team = $this->teamRepo->create(array_merge($input, ['created_by' => Auth::user()->id]));

		if ( $team )
		{   
			return $this->redirectTo('/admin/teams')
						->with('success', 'Team has been created');
		}
	}
}