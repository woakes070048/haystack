<?php namespace Atticus\Repositories;

abstract class DbRepository {

    protected $model;

    /**
     * @param $model
     */
    function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Finds model by unique ID
     * 	
     * @param  integer $id
     * @return Collection
     */
	public function findById($id)
	{
		return $this->model->find($id);
	}

	/**
	 * Creates a model based on input
	 * 
	 * @param  array  $input 
	 * @return Collection
	 */
	public function create(array $input)
	{
		return $this->model->create($input);
	}

	/**
	 * Updates model based on input and unique ID
	 * 	
	 * @param  integer $id (unique ID)   
	 * @param  array  $input 
	 * @return Collection
	 */
	public function update($id, array $input)
	{
		$model = $this->findById($id);

		if ( !$model )
		{
			return false; # user does not exist
		}

		$model->update($input);

		return $model;
	}

	/**
	 * Deletes a model based on unique ID
	 * 
	 * @param  integer $id (unique ID)
	 * @return Collection
	 */
	public function delete($id)
	{
		$model = $this->findById($id);

		if ( $model->delete() )
		{
			return true;
		}
	}

	public function orderBy($field, $order = 'desc')
	{
		return $this->model->orderBy($field, $order);
	}

	public function all()
	{
		return $this->model->all();
	}
}
