@extends('_layouts.exterior')

@section('content')
<div class="outer-page">    
  <!-- Login page -->
  <div class="login-page">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified">
      <li class="active"><a href="/login" class="br-lblue"><i class="fa fa-sign-in"></i> Sign In</a></li>
      <li><a href="/password/remind" class="br-lblue"><i class="fa fa-lock"></i> Recover </a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

      <div class="tab-pane fade active in" id="login">
        @include('_partials.notifications')
        <!-- Login form -->
        {{ Form::open(array('url' => 'login')) }}
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
          <button type="submit" class="btn btn-info btn-sm">Submit</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>       
</div>
@stop