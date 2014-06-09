<?php namespace Atticus\Forms\Tracker\Applications;

use Laracasts\Validation\FormValidator;

class Create extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
        'requisition_number'  => 'required|integer',
        'preferred_title'     => 'required|max:30',
        'preferred_team'      => 'required|integer|exists:teams,id',
        'preferred_location1' => 'required|integer|exists:offices,id',
        'preferred_location2' => 'required|integer|exists:offices,id',
        'preferred_location3' => 'required|integer|exists:offices,id',
        'referring_employee'  => 'required|alpha_spaces|max:100',
        'recruiting_contact'  => 'required|alpha_spaces|max:100',
        'network_path'        => 'required',
    ];

}