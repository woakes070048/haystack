<?php namespace Tracker;

use Atticus\Repositories\Tracker\Application\ApplicationInterface;
use Atticus\Repositories\Tracker\Candidate\CandidateInterface;
use Atticus\Repositories\User\UserInterface;
use Auth, Input, View;

class ApplicationsController extends \BaseController {

	protected $appRepo;

	protected $candidateRepo;

	protected $userRepo;

	public function __construct(ApplicationInterface $app, CandidateInterface $candidate, UserInterface $user)
	{
	    $this->appRepo = $app;

	    $this->candidateRepo = $candidate;

	    $this->userRepo = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$allowed_columns = ['name', 'preferred_title', 'preferred_team', 'preferred_location1', 'closed_at', 'created_at'];

		$sort = in_array(Input::get('sort'), $allowed_columns) ? Input::get('sort') : 'created_at';

		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';
		
		switch (Input::get('type')) {			
			case 'closed':
				$applications = $this->appRepo->where('closed_at', '!=', '0000-00-00 00:00:00');
				break;

			case 'claimed':
				$team_members = $this->userRepo->where('team_id', '=', Auth::user()->team_id)->pluck('id');
				$applications = $this->appRepo->where('claimed_by', '=', $team_members);
				break;

			default:
				$applications = $this->appRepo->where('closed_at', '=', '0000-00-00 00:00:00');
				break;
		}

		$applications = $applications->orderBy($sort, $order)->paginate(10);

		return View::make('tracker.applications.index')
				->withApplications($applications)->withSort($sort)->withOrder($order);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Store a newly created resource in storage via Excel upload.
	 *
	 * @return Response
	 */
	public function excel()
	{
		//
	}

	/**
	 * Display the specified resource.
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
	 * DELETE /applications/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$redirect = $this->redirectTo('/applications');

		$closed = $this->appRepo->close($id);

		if ( $closed )
		{
			return $redirect->with('success', 'Application has been closed');
		}

		return $redirect->with('error', 'An error has occurred and we could not closed that application');
	}

	public function reopen($id)
	{
		
	}
}