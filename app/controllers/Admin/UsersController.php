<?php namespace Admin;

use Atticus\Repositories\User\UserInterface;
use View;

class UsersController extends \BaseController {

	protected $userRepo;

	public function __construct(UserInterface $user)
	{
		$this->userRepo = $user;
	}

	/**
	 * Display a listing of the resource.
	 * GET /admin/users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepo->all();

		return View::make('admin.users.index')->with(compact($users));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/users
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'first_name', 'last_name', 'office_id', 'title', 'role');

		$this->createForm->validate($input);

		unset($input['role']);

		$input = array_merge(array('password' => Hash::make('change')));

		$user = $this->userRepo->createWithRole($input, Input::get('role'));

		if ( $user )
		{   
			return $this->redirectTo('/admin/users')
						->with('success', 'Employee has been created');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->userRepo->findById($id);

		if ( !$user )
		{
			return $this->redirectTo('/admin/users')
						->with('info', 'Employee could not be found');
		}

		return View::make('admin.users.edit')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/users/{id}
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
	 * DELETE /admin/users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}