<?php

use Laracasts\Presenter\Presenter;

class OfficePresenter extends Presenter {

    public function employeeCount()
    {
        return $this->employees->count();
    }

}