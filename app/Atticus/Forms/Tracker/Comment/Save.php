<?php namespace Atticus\Forms\Tracker\Comment;

use Laracasts\Validation\FormValidator;

class Save extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'body' => 'required|between:1,600'
    ];

}

