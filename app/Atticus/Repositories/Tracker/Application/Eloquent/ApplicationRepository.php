<?php namespace Atticus\Repositories\Tracker\Application\Eloquent;

use Atticus\Repositories\Tracker\Application\ApplicationInterface;
use Atticus\Repositories\DbRepository;
use Tracker\Application as Application;
use Auth, Carbon, DB;

class ApplicationRepository extends DbRepository implements ApplicationInterface {

	protected $model;

	public function __construct(Application $model)
	{
		$this->model = $model;
	}

	public function close($id)
	{
		$obj = $this->model->find($id);

		if ( $obj )
		{
			$obj->closed_by = Auth::user()->present()->fullName;
			$obj->closed_at = Carbon::now()->format('Y-m-d H:i:s');
			$obj->save();
		}
		
		return $obj;
	}
}