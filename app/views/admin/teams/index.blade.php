@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-gavel lblue"></i> Admin Panel</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-users lblue"></i> Teams</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/admins">Admin</a> / Teams
  </div>
@stop

@section('content')
<div class="row">
	<div class="col-md-7">
		<div class="widget pages-widget">
										
			<div class="widget-head br-red">
				<h3><i class="fa fa-file"></i> View Teams</h3>
			</div>
			
			<div class="widget-body no-padd">
				
				<div class="table-responsive">
					<table class="table table-bordered">
						<!-- Table heading -->
						<tbody>
							<tr> 
								<th>Name</th>
								<th>Acronym</th>
								<th>Practice</th>
								<th>Employees</th>
								<th>Applicants</th>
								<th>Action</th>
							</tr>

							@foreach($teams as $team)
							<tr>
								<td>{{ $team->name }}</td>
								<td>{{ $team->abbrv }}</td>
								<td>{{ $team->practice }}</td>
								<td>{{ $team->present()->employeeCount }}</td>
								<td></td>
								<td>
									<a href="#"><i class="fa fa-edit lblue"></i></a> &nbsp; 
									<a href="#"><i class="fa fa-trash-o red"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>
			
			<div class="widget-foot">
				<p>&nbsp;</p>
				<div class="clearfix"></div>
			</div>

		</div>		
	</div>
	<div class="col-md-5">
		<div class="widget pages-widget">
									
			<div class="widget-head br-red">
				<h3><i class="fa fa-file"></i> Create Team</h3>
			</div>
		
			<div class="widget-body no-padd">

			</div>
		</div>
	</div>	
</div>	
@stop
