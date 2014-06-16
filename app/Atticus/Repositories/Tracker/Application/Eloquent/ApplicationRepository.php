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
			$obj->closed_by = Auth::user()->id;
			$obj->closed_at = Carbon::now()->format('Y-m-d H:i:s');
			$obj->save();
		}
		
		return $obj;
	}

	public function claim($id)
	{
		$obj = $this->model->find($id);

		if ( $obj )
		{
			$obj->claimed_by = Auth::user()->team->id;
			$obj->claimed_at = Carbon::now()->format('Y-m-d H:i:s');
			$obj->save();
		}
		
		return $obj;
	}	

	public function reopen($id)
	{
		$obj = $this->model->find($id);

		if ( $obj )
		{
			$obj->closed_by = '';
			$obj->closed_at = '0000-00-00 00:00:00';
			$obj->save();
		}
		return $obj;		
	}

	public function moveForwardOneStep($id)
	{
		$obj = $this->model->find($id);

		if ( $obj )
		{
			$obj->interview_step++;
			$obj->save();
		}
		return $obj;	
	}

}