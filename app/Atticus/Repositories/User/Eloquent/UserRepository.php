<?php namespace Atticus\Repositories\User\Eloquent;

use Atticus\Repositories\User\UserInterface;
use Atticus\Repositories\DbRepository;
use User;

class UserRepository extends DbRepository implements UserInterface {

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function findByEmail($email)
	{
		return $this->model->where('email', '=', $email)->first();
	}
	
}