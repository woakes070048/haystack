<?php

use Laracasts\Presenter\Presenter;

class TeamPresenter extends Presenter {

    public function employeeCount()
    {
        return $this->employees->count();
    }

}