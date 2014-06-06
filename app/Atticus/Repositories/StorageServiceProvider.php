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
    # Tracker
    $this->app->bind(
      'Atticus\Repositories\Tracker\Candidate\CandidateInterface',
      'Atticus\Repositories\Tracker\Candidate\Eloquent\CandidateRepository'
    );
    $this->app->bind(
      'Atticus\Repositories\Tracker\Application\ApplicationInterface',
      'Atticus\Repositories\Tracker\Application\Eloquent\ApplicationRepository'
    );
    $this->app->bind(
      'Atticus\Repositories\Tracker\Comment\CommentInterface',
      'Atticus\Repositories\Tracker\Comment\Eloquent\CommentRepository'
    );
  }    
}