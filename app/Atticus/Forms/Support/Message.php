<?php namespace Atticus\Forms\Support;

use Laracasts\Validation\FormValidator;

class Message extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
		'name'  	  => 'required',
		'email' 	  => 'required|email',
        'subject'     => 'required',
        'messageBody' => 'required'
    ];

}