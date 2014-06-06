<?php namespace Atticus\Forms\Tracker\Candidate;

use Laracasts\Validation\FormValidator;

class Save extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'name'  => 'required|alpha',
    	'email' => 'required|email|unique:candidates'
    ];

}

