<?php namespace Atticus\Repositories;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind(
      'Atticus\Repositories\User\UserInterface',
      'Atticus\Repositories\User\Eloquent\UserRepository'
    );
    $this->app->bind(
      'Atticus\Repositories\Office\OfficeInterface',
      'Atticus\Repositories\Office\Eloquent\OfficeRepository'
    );
    $this->app->bind(
      'Atticus\Repositories\Team\TeamInterface',
      'Atticus\Repositories\Team\Eloquent\TeamRepository'
    );
  }    
}