<?php namespace Atticus\Forms\Users;

use Laracasts\Validation\FormValidator;

class Login extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required'
    ];

}