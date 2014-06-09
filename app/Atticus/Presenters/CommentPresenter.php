<?php

use Laracasts\Presenter\Presenter;

class CommentPresenter extends Presenter {

    public function commentAge()
    {
        return $this->created_at->diffForHumans();
    }

}