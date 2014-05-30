<?php

use Atticus\Repositories\User\UserInterface;
use Atticus\Forms\Users\UpdatePassword;

class AccountController extends \BaseController {

	protected $updatePasswordForm;

	protected $userRepo;

	public function __construct(UpdatePassword $password, UserInterface $user)
	{
		$this->updatePasswordForm = $password;
		$this->userRepo = $user;
	}

	public function getSettings()
	{
		return View::make('account.settings');
	}

	public function postPassword()
	{
		$input = Input::only('old_password', 'new_password', 'confirm_password');

		$this->updatePasswordForm->validate($input);

		$credentials = [
		'email'    => Auth::user()->email,
		'password' => $input['old_password']
		];

		if ( Auth::validate($credentials) )
		{
			Auth::user()->password = Hash::make($input['new_password']);

			Auth::user()->save();

			return $this->redirectTo('/account/settings')
						->with('success', 'Password has been updated');
		}

		return $this->redirectTo('/account/settings')
			->with('error', 'Password could not be updated. Please try again');
	}

}