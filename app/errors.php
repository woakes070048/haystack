<?php

/*
   |-------------------------------------
   | Error Handlers
   |-------------------------------------
 */

// Log errors
App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

// Catch form validation errors
App::error(function(Laracasts\Validation\FormValidationException $exception, $code)
{
	return Redirect::back()->withInput()->withErrors($exception->getErrors());
});
