<?php

class HomeController extends \BaseController {

	/**
	 * Renders the dashboard
	 * 	
	 * @return Response
	 */
	public function index()
	{
		return View::make('tracker.dashboard');
	}

}
