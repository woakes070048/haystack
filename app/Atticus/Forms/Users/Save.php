<?php namespace Atticus\Forms\Users;

use Laracasts\Validation\FormValidator;

class Save extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
    	'first_name' => 'required|alpha|max:40',
    	'last_name'  => 'required|alpha|max:40',
        'email'      => 'required|email|unique:users|max:100',
        'title'      => 'required|max:40',
        'office_id'  => 'required|integer|exists:offices,id',
        'team_id'    => 'required|integer|exists:teams,id',
        'role'		 => 'required|integer|in:1,2,3'
    ];

}