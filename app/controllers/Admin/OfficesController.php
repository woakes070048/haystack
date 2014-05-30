<?php namespace Admin;

use Atticus\Repositories\Office\OfficeInterface;
use View;

class OfficesController extends \BaseController {

	protected $officeRepo;

	public function __construct(OfficeInterface $office)
	{
		$this->officeRepo = $office;
	}

	/**
	 * Display a listing of the resource.
	 * GET /admin/offices
	 *
	 * @return Response
	 */
	public function index()
	{
		$offices = $this->officeRepo->all();

		return View::make('admin.offices.index')->with(compact($offices));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/offices/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/offices
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/offices/{id}
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
	 * GET /admin/offices/{id}/edit
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
	 * PUT /admin/offices/{id}
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
	 * DELETE /admin/offices/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}