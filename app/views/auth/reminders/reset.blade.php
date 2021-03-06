@extends('_layouts.exterior')

@section('content')
<div class="outer-page">    
  <!-- Login page -->
  <div class="login-page">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified">
      <li><a href="/login" class="br-lblue"><i class="fa fa-sign-in"></i> Sign In</a></li>
      <li><a href="/password/remind" class="br-lblue"><i class="fa fa-lock"></i> Recover </a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade active in" id="recover">
        <!-- Recover Password Form -->        
        @if ( count($errors->all()) > 0 || Session::get('error') )
          @include('_partials.notifications')
        @else
          <div class="alert alert-info">Fill out the form to reset your password</div>
        @endif

        {{ Form::open(array('url' => 'password/remind')) }}
          <input type="hidden" name="token" value="{{ $token }}">      
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="email" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
          </div>
          <button type="submit" class="btn btn-info btn-sm">Reset Password</button>
        {{ Form::close() }}
      </div>
    </div> 
  </div>       
</div>
@stop