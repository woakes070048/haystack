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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/users/{id}
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
	 * GET /admin/users/{id}/edit
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