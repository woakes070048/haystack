<?php namespace Atticus\Forms\Users;

use Laracasts\Validation\FormValidator;

class UpdatePassword extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
        'old_password' => 'required',
        'new_password' => 'required|between:5, 30',
        'confirm_password' => 'required|same:new_password'
    ];

}