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

	@include('_partials.notifications')				

	<div class="row">

		<div class="col-md-8">
			<div class="widget pages-widget">
											
				<div class="widget-head br-lblue">
					<h3><i class="fa fa-search"></i> View Teams</h3>
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
									<th>Action</th>
								</tr>

								@foreach($teams as $team)
								<tr>
									<td>{{ $team->name }}</td>
									<td>{{ $team->abbrv }}</td>
									<td>{{ $team->practice }}</td>
									<td>{{ $team->present()->employeeCount }}</td>
									<td>
										<a href="#"><i class="fa fa-edit lblue"></i></a> &nbsp; 
										{{ Button::makeDelete($team->id, 'admin.teams.destroy', 'red', 'fa-trash-o') }} 
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
		<div class="col-md-4">
			<div class="widget pages-widget">
										
				<div class="widget-head br-lblue">
					<h3><i class="fa fa-plus"></i> Create Team</h3>
				</div>
			
				<div class="widget-body">
					{{ Form::open(array('url' => 'admin/teams', 'class' => 'form-horizontal')) }}
						<div class="form-group">
							<div class="col-md-12">
								{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name' )) }}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								{{ Form::text('abbrv', Input::old('abbrv'), array('class' => 'form-control', 'placeholder' => 'Acronym' )) }}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								{{ Form::text('practice', 'Forensic &amp; Litigation Consulting', array('class' => 'form-control', 'placeholder' => 'Practice', 'readonly' )) }}
							</div>
						</div>
				</div>
				<div class="widget-foot">
					<div class="form-group">
						<div class="pull-right">
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-info" id="create-user">Add</button>
						</div>
					</div>				
					<div class="clearfix"></div>
				</div>
					{{ Form::close() }}
			</div>
		</div>	
	</div>	
@stop

@section('javascripts')
<script>
  $(function(){
  	$('[data-delete]').click(function(e){
    	e.preventDefault();
	    if (confirm('Do you really want to remove this team?')) {
	        // Get the route URL
	        var url = $(this).prop('href');
	        // Get the token
	        var token = $(this).data('delete');
	        // Create a form element
	        var $form = $('<form/>', {action: url, method: 'post'});
	        // Add the DELETE hidden input method
	        var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: 'delete'});
	        // Add the token hidden input
	        var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
	        // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
	        $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
	    }	
	});

	$('td').click( function() {
		if ( !$(this).hasClass('row-controls') ) {
			window.location = $(this).parent().find('a').attr('href');
		}
	}).hover( function() {
		$(this).toggleClass('hover');
	});
  });
</script>
@stop
