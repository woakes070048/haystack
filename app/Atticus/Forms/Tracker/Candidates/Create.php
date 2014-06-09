<?php namespace Atticus\Forms\Tracker\Candidates;

use Laracasts\Validation\FormValidator;

class Create extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'name'  => 'required|alpha_spaces',
    	'email' => 'required|email'
    ];

}

