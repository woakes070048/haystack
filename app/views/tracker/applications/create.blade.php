@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-compass lblue"></i> Applicant Tracker</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-user lblue"></i> Applications</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/">Tracker</a> / <a href="/applications">Applications</a> / Create
  </div>
@stop

@section('content')
<div class="page-users">

	@include('_partials.notifications')				

	<div class="page-tabs">

		@include('tracker.applications._nav')
		
		<div class="tab-content">
			<div class="tab-pane fade active in" id="addnew">
				<h4>Create an Application</h4>
				
				{{ Form::open(array('url' => 'applications', 'class' => 'form-horizontal')) }}

					<div class="form-group">
						<label for="name" class="col-md-2 control-label">Name</label>
						<div class="col-md-10">
							{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-2 control-label">Email</label>
						<div class="col-md-10">
							{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-md-2 control-label">Requisition Number</label>
						<div class="col-md-10">
							{{ Form::text('requisition_number', Input::old('requisition_number'), array('class' => 'form-control', 'placeholder' => 'Requisition Number' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-md-2 control-label">Preferred Title</label>
						<div class="col-md-10">
							<select name="preferred_title" id="preferred_title" class="form-control">
								<option value="Consultant">Consultant</option>
								<option value="Senior Consultant">Senior Consultant</option>
								<option value="Director">Director</option>
								<option value="Senior Director">Senior Director</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="dropdown" class="col-md-2 control-label">Preferred Team</label>
						<div class="col-md-10">
							{{ Dropdown::teams('preferred_team', 'form-control', Input::old('team_id')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="location1" class="col-md-2 control-label">Preferred Location #1</label>
						<div class="col-md-10">
							{{ Dropdown::offices('preferred_location1', 'form-control', Input::old('preferred_location1')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="location2" class="col-md-2 control-label">Preferred Location #2</label>
						<div class="col-md-10">
							{{ Dropdown::offices('preferred_location2', 'form-control', Input::old('preferred_location2')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="location3" class="col-md-2 control-label">Preferred Location #3</label>
						<div class="col-md-10">
							{{ Dropdown::offices('preferred_location3', 'form-control', Input::old('preferred_location3')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="referring_employee" class="col-md-2 control-label">Referring Employee</label>
						<div class="col-md-10">
							{{ Form::text('referring_employee', Input::old('referring_employee'), array('class' => 'form-control', 'placeholder' => 'Referring Employee' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="recruiting_contact" class="col-md-2 control-label">Recruiting Contact</label>
						<div class="col-md-10">
							{{ Form::text('recruiting_contact', Input::old('recruiting_contact'), array('class' => 'form-control', 'placeholder' => 'Recruiting Contact' )) }}
						</div>
					</div>

					<div class="form-group">
						<label for="recruiting_contact" class="col-md-2 control-label">Resume Path</label>
						<div class="col-md-10">
							{{ Form::text('network_path', Input::old('network_path'), array('class' => 'form-control', 'placeholder' => 'Resume Path' )) }}
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<button type="submit" class="btn btn-info" id="create-application">Create</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				{{ Form::close() }}
			</div>	
		</div>
	</div>
</div>
@stop
