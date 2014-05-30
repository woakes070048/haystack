<?php namespace Atticus\Forms\Teams;

use Laracasts\Validation\FormValidator;

class Create extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'name'  => 'required|unique:teams',
        'abbrv' => 'required|unique:teams',
        'practice' => 'required'
    ];

}