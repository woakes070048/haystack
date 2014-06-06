<?php namespace Atticus\Repositories\User\Eloquent;

use Atticus\Repositories\User\UserInterface;
use Atticus\Repositories\DbRepository;
use User, DB;

class UserRepository extends DbRepository implements UserInterface {

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function alreadyExists($id, $email)
	{
		$user  = $this->findById($id);
		$other = $this->findByEmail($email);

		if ( $user->email != $email && $other )
		{
			return true;
		}
	}

	public function findByEmail($email)
	{
		return $this->model->where('email', '=', $email)->first();
	}

	public function createWithRole(array $input, $role)
	{
		$user = $this->create($input);

		if ( $user )
		{
			DB::table('role_user')->insert([
				'user_id' => $user->id,
				'role_id' => $role
			]);
		}

		return $user;
	}

	public function updateWithRole($id, array $input, $role)
	{
		$user = $this->update($id, $input);

		if ( $user )
		{
			DB::table('role_user')
	            ->where('user_id', $user->id)
	            ->update(['role_id' => $role]);
		}

		return $user;
	}

}