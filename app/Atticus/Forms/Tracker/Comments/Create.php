<?php namespace Atticus\Forms\Tracker\Comments;

use Laracasts\Validation\FormValidator;

class Create extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'message' => 'required|between:1,600'
    ];

}

