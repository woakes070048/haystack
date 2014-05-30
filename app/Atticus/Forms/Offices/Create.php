<?php namespace Atticus\Forms\Offices;

use Laracasts\Validation\FormValidator;

class Create extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'location' => 'required|alpha_space|unique:offices'
    ];

}