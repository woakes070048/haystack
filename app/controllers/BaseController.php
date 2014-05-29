<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function redirectTo($url, $statusCode = 302)
	{
		return Redirect::to($url, $statusCode);
	}

	protected function redirectAction($action, $data = [])
	{
		return Redirect::action($action, $data);
	}

	protected function redirectBack($data = [])
	{
		return Redirect::back()->withInput()->with($data);
	}

	protected function redirectBackWithMessage($type, $message)
	{
		return Redirect::back()->withInput()->with($type, $message);
	}
}
