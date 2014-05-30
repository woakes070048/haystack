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

View::composer(array('_partials.navbar', '_partials.sidebar'), function($view)
{
    $view->with('current_user', Auth::user());
});