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

		return View::make('admin.teams.index')->with(compact($teams));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/teams/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/teams
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/teams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/teams/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/teams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/teams/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}