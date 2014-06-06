<?php namespace Admin;

use Atticus\Repositories\User\UserInterface;
use Atticus\Forms\Users\Create as CreateForm;
use Atticus\Forms\Users\Update as UpdateForm;
use Auth, Input, Hash, View;

class UsersController extends \BaseController {

	protected $userRepo;

	protected $createForm;

	protected $updateForm;

	public function __construct(UserInterface $user, CreateForm $create, UpdateForm $update)
	{
		$this->userRepo = $user;

		$this->createForm = $create;
		$this->updateForm = $update;
	}

	/**
	 * Display a listing of the resource.
	 * GET /admin/users
	 *
	 * @return Response
	 */
	public function index()
	{
		$allowed_columns = ['first_name', 'created_at', 'team_id', 'email', 'office_id', 'title'];

		$sort = in_array(Input::get('sort'), $allowed_columns) ? Input::get('sort') : 'created_at';
		
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		$users = $this->userRepo->orderBy($sort, $order)->paginate(10);

		return View::make('admin.users.index')->withUsers($users)->withSort($sort)->withOrder($order);
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
		$input = Input::only('email', 'first_name', 'last_name', 'office_id', 'team_id', 'title', 'role');

		$this->createForm->validate($input);

		unset($input['role']);

		$input = array_merge($input, array('password' => Hash::make('change'))); # default password

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
		$input = Input::only('email', 'first_name', 'last_name', 'office_id', 'team_id', 'title', 'role');

		$this->updateForm->validate($input);

		if ( $this->userRepo->alreadyExists($id, $input['email']) )
		{
			return $this->redirectBack()
						->with('error', 'Email is already in use');
		}

		unset($input['role']);

		$user = $this->userRepo->updateWithRole($id, $input, Input::get('role'));

		if ( $user )
		{   
			return $this->redirectBack()
						->with('success', 'Employee information has been updated');
		}
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
		$redirect = $this->redirectTo('/admin/users');

		if ( Auth::user()->id === $id )
		{
			return $redirect->with('error', 'You cannot remove yourself');
		}

		$deleted = $this->userRepo->delete($id);

		if ( $deleted )
		{
			return $redirect->with('success', 'Employee has been removed');
		}

		return $redirect->with('error', 'An error has occurred and we could not remove that employee');
	}
}