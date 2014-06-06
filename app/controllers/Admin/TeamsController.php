<?php namespace Admin;

use Atticus\Repositories\Team\TeamInterface;
use Atticus\Forms\Teams\Create as CreateForm;
use Auth, Input, View;

class TeamsController extends \BaseController {

	protected $teamRepo;

	protected $createForm;

	public function __construct(TeamInterface $team, CreateForm $create)
	{
		$this->teamRepo = $team;

		$this->createForm = $create;
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

		$this->createForm->validate($input);

		$team = $this->teamRepo->create(array_merge($input, ['created_by' => Auth::user()->id]));

		if ( $team )
		{   
			return $this->redirectTo('/admin/teams')
						->with('success', 'Team has been created');
		}
	}
}