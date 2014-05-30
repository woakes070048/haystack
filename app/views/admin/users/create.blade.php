@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-gavel lblue"></i> Admin Panel</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-user lblue"></i> Employees</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/admins">Admin</a> / <a href="/admins/users">Employees</a> / Create
  </div>
@stop

@section('content')
<div class="page-users">

	@include('_partials.notifications')				

	<div class="page-tabs">

		@include('admin.users._nav')
		
		<div class="tab-content">
			<div class="tab-pane fade active in" id="addnew">
				<h4>Add New User</h4>
				
				{{ Form::open(array('url' => 'admin/users', 'class' => 'form-horizontal')) }}

					<div class="form-group">
						<label for="name" class="col-md-2 control-label">First Name</label>
						<div class="col-md-10">
							{{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control', 'placeholder' => 'First Name' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="username" class="col-md-2 control-label">Last Name</label>
						<div class="col-md-10">
							{{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control', 'placeholder' => 'Last Name' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-2 control-label">Email</label>
						<div class="col-md-10">
							{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-md-2 control-label">Title</label>
						<div class="col-md-10">
							{{ Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'Title' )) }}
						</div>
					</div>
				 
					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Team</label>
						<div class="col-md-10">
							{{ Dropdown::teams('team_id', 'form-control', Input::old('team_id')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Location</label>
						<div class="col-md-10">
							{{ Dropdown::offices('office_id', 'form-control', Input::old('office_id')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Permissions <small><a href="#">[?]</a></small></label>
						<div class="col-md-10">
							{{ Dropdown::roles('role', 'form-control', Input::old('role')) }}
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<button type="submit" class="btn btn-info" id="create-user">Add</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				{{ Form::close() }}
			</div>	
		</div>
	</div>
</div>
@stop
