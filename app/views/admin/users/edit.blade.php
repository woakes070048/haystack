@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-gavel lblue"></i> Admin Panel</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-user lblue"></i> Employees</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/admins">Admin</a> / <a href="/admins/users">Employees</a> / Edit
  </div>
@stop

@section('content')
<div class="page-users">

	@include('_partials.notifications')				

	<div class="page-tabs">

		@include('admin.users._nav')
		
		<div class="tab-content">
			<div class="tab-pane fade active in" id="addnew">
				<h4>Edit Employee</h4>
				
				{{ Form::open(array('url' => "admin/users/$user->id", 'class' => 'form-horizontal', 'method' => 'put')) }}

					<div class="form-group">
						<label for="name" class="col-md-2 control-label">First Name</label>
						<div class="col-md-10">
							{{ Form::text('first_name', $user->first_name, array('class' => 'form-control', 'placeholder' => 'First Name' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="username" class="col-md-2 control-label">Last Name</label>
						<div class="col-md-10">
							{{ Form::text('last_name', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Last Name' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-2 control-label">Email</label>
						<div class="col-md-10">
							{{ Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Email' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-md-2 control-label">Title</label>
						<div class="col-md-10">
							{{ Form::text('title', $user->title, array('class' => 'form-control', 'placeholder' => 'Title' )) }}
						</div>
					</div>
				 
					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Team</label>
						<div class="col-md-10">
							{{ Dropdown::teams('team_id', 'form-control', $user->team_id) }}
						</div>
					</div>

					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Location</label>
						<div class="col-md-10">
							{{ Dropdown::offices('office_id', 'form-control', $user->office_id) }}
						</div>
					</div>

					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Permissions <small><a href="#">[?]</a></small></label>
						<div class="col-md-10">
							{{ Dropdown::roles('role', 'form-control', $user->roles()->first()->id) }}
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<button type="submit" class="btn btn-success" id="update-user">Update</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				{{ Form::close() }}
			</div>	
		</div>
	</div>
</div>
@stop
