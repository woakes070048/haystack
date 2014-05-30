<?php namespace Atticus\Forms\Users;

use Laracasts\Validation\FormValidator;

class Create extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'first_name' => 'required|alpha',
    	'last_name'  => 'required|alpha',
        'email'      => 'required|email',
        'password'   => 'required|between:5, 30',
        'title'      => 'required',
        'location'   => 'required|exists:offices, id'
        'role'		 => 'required|in:1,2,3'
    ];

}