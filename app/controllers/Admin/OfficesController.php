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
}