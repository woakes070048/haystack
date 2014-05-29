<?php

/*
|-------------------------------------
| Authentication Events
|-------------------------------------
*/

Event::listen('session.create', function($user)
{
	$user->last_login = Carbon::now()->format('Y-m-d H:i:s');

	if ( $user->save() ) return true;
});
