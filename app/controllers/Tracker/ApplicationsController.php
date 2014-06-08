<?php namespace Tracker;

use Atticus\Repositories\Tracker\Application\ApplicationInterface;
use Atticus\Forms\Tracker\Applications\Create as ApplicationCreateForm;
use Atticus\Repositories\Tracker\Candidate\CandidateInterface;
use Atticus\Forms\Tracker\Candidates\Create as CandidateCreateForm;
use Atticus\Repositories\User\UserInterface;
use Auth, Input, Redirect, View;

class ApplicationsController extends \BaseController {

	protected $appRepo;

	protected $candidateRepo;

	protected $userRepo;

	protected $applicationCreateForm;

	protected $candidateCreateForm;

	public function __construct(
		ApplicationInterface $app, CandidateInterface $candidate, 
		UserInterface $user, ApplicationCreateForm $aCreate, CandidateCreateForm $cCreate)
	{
	    $this->appRepo = $app;

	    $this->candidateRepo = $candidate;

	    $this->userRepo = $user;

	    $this->applicationCreateForm = $aCreate;

	    $this->candidateCreateForm = $cCreate;
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
				$team_members = $this->userRepo->where('team_id', '=', Auth::user()->team_id)->lists('id');
				$applications = $this->appRepo->whereIn('claimed_by', $team_members);
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
		return View::make('tracker.applications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$c_input = Input::only('name', 'email');

		$this->candidateCreateForm->validate($c_input);

		$candidate = $this->candidateRepo->firstOrCreateByEmail($c_input['email'], $c_input);

		$a_input = Input::only('requisition_number', 'network_path', 'referring_employee',
			'preferred_title', 'preferred_team', 'referring_employee', 'recruiting_contact',
			'preferred_location1', 'preferred_location2', 'preferred_location3');

		$this->applicationCreateForm->validate($a_input);

		$meta = [
			'candidate_id' => $candidate->id,
			'created_by'   => Auth::user()->id
		];

		$application = $this->appRepo->create(array_merge($a_input, $meta));

		if ( $application )
		{   
			return $this->redirectTo('/applications')
						->with('success', 'Application has been created');
		}
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
		$application = $this->appRepo->findById($id);

		return View::make('tracker.applications.show')->withApplication($application);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$application = $this->appRepo->findById($id);

		if ( $application->closed_at > '0000-00-00 00:00:00')
		{
			return $this->redirectBackWithMessage('error', 'Cannot edit closed application');
		}

		$a_input = Input::only('requisition_number', 'network_path', 'referring_employee',
			'preferred_title', 'preferred_team', 'referring_employee', 'recruiting_contact',
			'preferred_location1', 'preferred_location2', 'preferred_location3');

		$this->applicationCreateForm->validate($a_input);

		$application = $this->appRepo->update($id, $a_input);	

		if ( $application )
		{
			return Redirect::back()->withApplication($application)->with('success', 'Application has been updated');
		}
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
		$reopened = $this->appRepo->reopen($id);

		if ( $reopened )
		{
			return $this->redirectTo('/applications/' . $id)
						->with('success', 'Application has been reopened');
		}

		return $this->redirectTo('/applications')
					->with('error', 'An error has occurred and we could not reopen that application');		
	}
}