@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-compass lblue"></i> Applicant Tracker</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-file lblue"></i> Applications</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/">Tracker</a> / Applications
  </div>
@stop

@section('content')
<div class="page-users">

	@include('_partials.notifications')				

	<div class="page-tabs">

		@include('tracker.applications._nav')
		
		<div class="tab-content">
			<div class="tab-pane fade active in" id="ausers">
				<!-- Users table -->
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr class="active">
							<th><input type="checkbox"></th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Name', 'name') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Group', 'preferred_team') }}
							</th>											
							<th>
								{{ Sortable::makeHeader('applications.index', 'Title', 'preferred_title') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Location', 'preferred_location1') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Date Created', 'created_at') }}
							</th>
							<th>
								{{ Sortable::makeHeader('applications.index', 'Date Closed', 'closed_at') }}
							</th>
							<th>
								Interviewer
							</th>
							<th>Action</th>
						</tr>

						@foreach($applications as $application)
						<tr class="applicant-line">
							<td><input type="checkbox"></td>
							<td>
								<a class="applicant-link" href="/applications/{{ $application->id }}">
									{{ $application->candidate->name }}
								</a>
							</td>
							<td>{{ $application->team->abbrv }}</td>
							<td>{{ $application->preferred_title }}</td>
							<td>{{ $application->office(1)->first()->location }}</td>
							<td>{{ $application->created_at }}</td>
							<td>{{ ( $application->closed_at != "0000-00-00 00:00:00" ) ? $application->closed_at : " " }}</td>
							<td>
								@if($application->claimer)
									{{ $application->claimer->abbrv }}
								@endif
							</td>
							<td class="action-controls">
								<a href="/applications/{{ $application->id }}" class="btn btn-info btn-xs">
									<i class="fa fa-info-circle"></i>
								</a>
								{{ Button::makeDelete($application->id, 'applications.destroy', 'btn btn-danger btn-xs', 'fa-minus-circle') }} 
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				
				<div class="pull-right">
					{{ $applications->addQuery('order', $order)->addQuery('sort', $sort)->links() }}
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
</div>	
<!-- Modal -->
<div id="search-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="search-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h4 class="modal-title">Search for an Application</h4>
			</div>
			<div class="modal-body">
				{{ Form::open(array('url' => 'applications')) }}

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Search</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>		
@stop

@section('javascripts')
<script>
  $(function(){
	$('td').click( function() {
		if ( !$(this).hasClass('action-controls') ) {
			window.location = $(this).parent().find('a').attr('href');
		}
	});

	$('tr').hover( function() {
		$(this).find('td').toggleClass('applicant-hover');
	});

  	$('[data-delete]').click(function(e){
    	e.preventDefault();
	    if (confirm('Do you really want to close this application?')) {
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
  });
</script>
@stop