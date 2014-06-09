<?php

use Atticus\Forms\Support\Message as MessageForm;

class SupportController extends \BaseController {

	protected $messageForm;

	public function __construct(MessageForm $message)
	{
		$this->messageForm = $message;
	}

	public function getIndex()
	{
		return View::make('support.index');
	}

	public function postMessage()
	{
		$data = [
			'name'        => Auth::user()->present()->fullName,
			'email'       => Auth::user()->email,
			'subject' 	  => Input::get('subject'),
			'messageBody' => Input::get('messageBody')
		];

		$this->messageForm->validate($data);
		
		Mail::send('_emails.support.message', $data, function($message)
		{
		    $message->to('scott.cruwys@fticonsulting.com', 'Scott Cruwys')
		    		->subject($data['subject']);
		});

		return $this->redirectBack()->with('success','Your message has been sent.');
	}
}