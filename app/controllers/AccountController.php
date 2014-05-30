<?php

class AccountController extends \BaseController {

	public function getSettings()
	{
		return View::make('account.settings');
	}

	public function postPassword()
	{

	}

}