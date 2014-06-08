<?php namespace Tracker;

use Atticus\Repositories\Tracker\Application\ApplicationInterface;
use Atticus\Repositories\Tracker\Comment\CommentInterface;
use Atticus\Forms\Tracker\Comments\Create as CommentCreateForm;
use Auth, Input;

class ApplicationCommentsController extends \BaseController {

	protected $appRepo;

	protected $commentRepo;

	protected $commentCreateForm;

	public function __construct(ApplicationInterface $app, CommentInterface $comment, CommentCreateForm $cmtCreate)
	{
		$this->appRepo = $app;
		
		$this->commentRepo = $comment;

		$this->commentCreateForm = $cmtCreate;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tracker/appcomments
	 *
	 * @return Response
	 */
	public function store($app_id)
	{
		$input = Input::only('message');

		$this->commentCreateForm->validate($input);

		$comment = $this->commentRepo->create([
			'user_id' 	     => Auth::user()->id,
			'application_id' => $app_id,
			'message'		 => $input['message']
		]);

		return $this->redirectBack()->with('success', 'Comment has been added');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tracker/appcomments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($app_id, $id)
	{
		$comment = $this->commentRepo->findById($id);

		if ( $comment->user_id != Auth::user()->id )
		{
			return $this->redirectBack()->with('error', 'You cannot delete comment that does not belong to you');
		}

		if ( $this->commentRepo->delete($id) )
		{
			return $this->redirectBack()->with('success', 'Comment has been removed');
		}

		return $this->redirectBack()->with('error', 'We could not remove your comment');
	}

}