<?php namespace Tracker;

use Laracasts\Presenter\PresentableTrait;

class Comment extends \Eloquent {

	use PresentableTrait;

    protected $presenter = 'CommentPresenter';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	protected $fillable = [];

	protected $guarded = [];

	public function application()
	{
		return $this->belongsTo('Tracker\Application');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}