<?php

use Atticus\Repositories\User\UserInterface;
use Atticus\Forms\Users\Login as LoginForm;

class SessionsController extends \BaseController {
	
	protected $loginForm;

	protected $userRepo;

	public function __construct(LoginForm $loginForm, UserInterface $user)
	{
	    $this->loginForm = $loginForm;
	    $this->userRepo  = $user;
	}

	/**
	 * Show the form for creating a new session
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('auth.sessions.create');
	}

	/**
	 * Generate a unique user session
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = Input::only('email', 'password');

		$this->loginForm->validate($credentials);
	
		if ( Auth::attempt($credentials, Input::get('remember')) )
		{
			$user = $this->userRepo->findByEmail($credentials['email']);

			$event = Event::fire('session.create', array($user)); 

			return $this->redirectTo('/');
		}

		return $this->redirectBackWithMessage('error', 'Invalid credentials');
	}

	/**
	 * Destroy the user session (logs out the user)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return $this->redirectTo('login');
	}

}