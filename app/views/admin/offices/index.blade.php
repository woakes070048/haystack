@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-gavel lblue"></i> Admin Panel</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-location-arrow lblue"></i> Offices</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/admins">Admin</a> / Offices
  </div>
@stop

@section('content')
<div class="row">
	<div class="col-md-7">
		<div class="widget pages-widget">
										
			<div class="widget-head br-red">
				<h3><i class="fa fa-file"></i> View Offices</h3>
			</div>
			
			<div class="widget-body no-padd">
				
				<div class="table-responsive">
					<table class="table table-bordered">
						<!-- Table heading -->
						<tbody>
							<tr> 
								<th>Location</th>
								<th>Employees</th>
								<th>Action</th>
							</tr>

							@foreach($offices as $office)
							<tr>
								<td>{{ $office->location }}</td>
								<td>{{ $office->present()->employeeCount }}</td>
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
		
	</div>
</div>		
@stop
