<?php namespace Tracker;

use View;

class ApplicationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tracker/appcomments
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('tracker.applications.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tracker/appcomments/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tracker/appcomments
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /tracker/appcomments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tracker/appcomments/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tracker/appcomments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tracker/appcomments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}