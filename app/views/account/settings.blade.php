@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-user lblue"></i> Account</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-cogs lblue"></i> Settings</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/account/settings">Account</a> / Settings
  </div>
@stop

@section('content')
	@include('_partials.notifications')				

	<div class="row">
		<div class="col-md-6">
			<!-- Project widget -->
			<div class="widget projects-widget">
				
				<div class="widget-head br-lblue">
					<h3><i class="fa fa-lock"></i> Change Password</h3>							
				</div>
				
				<div class="widget-body">

					{{ Form::open(array('url' => 'account/password', 'class' => 'form-horizontal')) }}

						<div class="form-group">
							<label class="col-lg-4 control-label">Old Password</label>
							<div class="col-lg-8">
								<input type="password" name="old_password" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">New Password</label>
							<div class="col-lg-8">
								<input type="password" name="new_password" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Confirm Password</label>
							<div class="col-lg-8">
								<input type="password" name="confirm_password" class="form-control">
							</div>
						</div>								
				</div>
				
				<div class="widget-foot">
					<button type="submit" class="btn btn-info pull-right">Submit</button>
					<div class="clearfix"></div>
				</div>
			
				{{ Form::close() }}

			</div>
		</div>
	</div>
@stop
