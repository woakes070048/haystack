<?php namespace Tracker;

use Atticus\Repositories\Tracker\Application\ApplicationInterface;
use Atticus\Repositories\Tracker\Candidate\CandidateInterface;
use Input, View;

class ApplicationsController extends \BaseController {

	protected $appRepo;

	protected $candidateRepo;

	public function __construct(ApplicationInterface $app, CandidateInterface $candidate)
	{
	    $this->appRepo = $app;

	    $this->candidateRepo = $candidate;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$applications = $this->appRepo->orderBy('created_at', 'desc')->paginate(10);

		return View::make('tracker.applications.index')
				->withApplications($applications);
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}