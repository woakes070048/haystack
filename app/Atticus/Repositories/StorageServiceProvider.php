<?php namespace Atticus\Repositories;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind(
      'Atticus\Repositories\User\UserInterface',
      'Atticus\Repositories\User\Eloquent\UserRepository'
    );
  }    
}