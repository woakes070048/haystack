@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-compass lblue"></i> Applicant Tracker</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-user lblue"></i> Applications</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/">Tracker</a> / Applications
  </div>
@stop

@section('content')
<div class="page-users">

	@include('_partials.notifications')				

	<div class="page-tabs">

		@include('admin.users._nav')
		
		<div class="tab-content">
			<div class="tab-pane fade active in" id="ausers">
				<!-- Users table -->
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr class="active">
							<th><input type="checkbox"></th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Name', 'first_name') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Group', 'team_id') }}
							</th>											
							<th>
								{{ Sortable::makeHeader('applications.index', 'Title', 'preferred_title') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Location', 'office_id') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Email', 'email') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Date Created', 'created_at') }}
							</th>
							<th>
								Claimed By
							</th>
							<th>Action</th>
						</tr>

						@foreach($applications as $application)
						<tr>
							<td><input type="checkbox"></td>
							<td>{{ $application->candidate->name }}</td>
							<td>{{ $application->team->abbrv }}</td>
							<td>{{ $application->preferred_title }}</td>
							<td>{{ $application->office(1)->first()->location }}</td>
							<td><a href="mailto:{{ $application->candidate->email }}">{{ $application->candidate->email }}</a></td>
							<td>{{ $application->created_at }}</td>
							<td>
								@if($application->claimer)
									{{ $application->claimer->team->abbrv }}
								@endif
							</td>
							<td>
								delete
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				
				<div class="pull-right">
					{{ $applications->links() }}
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
</div>		
@stop
