<?php namespace Atticus\Repositories\User;

interface UserInterface {
    
	public function findByEmail($email);

}
