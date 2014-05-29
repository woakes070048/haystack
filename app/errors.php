<?php

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});