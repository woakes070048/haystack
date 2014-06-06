<?php namespace Atticus\Repositories\Tracker\Comment\Eloquent;

use Atticus\Repositories\Tracker\Comment\CommentInterface;
use Atticus\Repositories\DbRepository;
use Comment;

class CommentRepository extends DbRepository implements CommentInterface {

	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

}