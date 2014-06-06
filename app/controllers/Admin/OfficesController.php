<?php namespace Admin;

use Atticus\Repositories\Office\OfficeInterface;
use Atticus\Forms\Offices\Save as SaveForm;
use Auth, Input, View;

class OfficesController extends \BaseController {

	protected $officeRepo;

	protected $saveForm;

	public function __construct(OfficeInterface $office, SaveForm $save)
	{
		$this->officeRepo = $office;

		$this->saveForm = $save;
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

		return View::make('admin.offices.index')->withOffices($offices);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/offices
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('location');

		$this->saveForm->validate($input);

		$office = $this->officeRepo->create(array_merge($input, ['created_by' => Auth::user()->id]));

		if ( $office )
		{   
			return $this->redirectTo('/admin/offices')
						->with('success', 'Office location has been created');
		}
	}
}