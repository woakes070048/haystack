@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-compass lblue"></i> Applicant Tracker</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-file lblue"></i> View Application</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/">Tracker</a> / <a href="/applications">Applications</a> / View
  </div>
@stop

@section('content')
			
	@include('_partials.notifications')
	<div class="row">
		<div class="col-md-5">
			
			<!-- Project widget -->
			<div class="widget">
				
				<div class="widget-head br-lblue">
					<h3 style="display:inline-block">
						<i class="fa fa-desktop"></i> Candidate Information 
					</h3>
					@if ( $application->claimed_at > '0000-00-00 00:00:00' )
						<span class="label label-warning pull-right">
							Interviewing with {{ $application->claimer->team->abbrv }}
						</span>
					@endif
				</div>
				
				<div class="widget-body">
					{{ Form::open(array('url' => "applications/$application->id", 'class' => 'form-horizontal', 'method' => 'put')) }}

						<div class="form-group">
							<label class="col-lg-4 control-label">Name</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $application->candidate->name }}" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Email</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $application->candidate->email }}" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Requisition Number</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="requisition_number" value="{{ $application->requisition_number }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Preferred Position</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="preferred_title" value="{{ $application->preferred_title }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Preferred Team</label>
							<div class="col-lg-8">
								{{ Dropdown::teams('preferred_team', 'form-control', $application->preferred_team) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Preferred Locations</label>
							<div class="col-lg-8">
								{{ Dropdown::offices('preferred_location1', 'form-control', $application->preferred_location1) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">&nbsp;</label>
							<div class="col-lg-8">
								{{ Dropdown::offices('preferred_location2', 'form-control', $application->preferred_location2) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">&nbsp;</label>
							<div class="col-lg-8">
								{{ Dropdown::offices('preferred_location3', 'form-control', $application->preferred_location3) }}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Referring Employee</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="referring_employee" value="{{ $application->referring_employee }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Recruiting Contact</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="recruiting_contact" value="{{ $application->recruiting_contact }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Resume Path</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="network_path" value="{{ $application->network_path }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Created By</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $application->creator->present()->fullName }}" disabled>
							</div>
						</div>					
				</div>
				
				<div class="widget-foot">
					{{ Form::submit('Update Application', array('class' => 'btn btn-success pull-right' )) }}
					<div class="clearfix"></div>
				</div>

				{{ Form::close() }}
				
			</div>			
		</div>

		<div class="col-md-7">
			
			<!-- Project widget -->
			<div class="widget">
				
				<div class="widget-head br-lblue">
					<h3 style="display:inline-block">
						<i class="fa fa-caret-square-o-right"></i> Application Status
					</h3>
				</div>
				
				<div class="widget-body">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#one" data-toggle="tab">Phone Screen</a></li>
						<li class=""><a href="#two" data-toggle="tab">Profile</a></li>
						<li class=""><a href="#three" data-toggle="tab">Content</a></li>
						<li class=""><a href="#three" data-toggle="tab">Content</a></li>
						<li class=""><a href="#three" data-toggle="tab">Content</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade" id="one">
							<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
						</div>
						<div class="tab-pane fade" id="two">
							<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four.</p>
						</div>
						<div class="tab-pane fade active in" id="three">
							<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer.</p>
						</div>
						<div class="tab-pane fade active in" id="four">
							<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer.</p>
						</div>
						<div class="tab-pane fade active in" id="five">
							<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer.</p>
						</div>
					</div>					
				</div>
				
				<div class="widget-foot">

					@if ( $application->closed_at === '0000-00-00 00:00:00')
						<button class="btn btn-success pull-right" style="margin-left: 10px">
							<i class="fa fa-thumbs-o-up"></i> Move Forward
						</button>
					
						{{ Button::makeDelete($application->id, 'applications.destroy', 'btn btn-danger pull-right', 'fa-minus-circle', 'Close Application') }} 
					@else
						{{ Form::open(array('url' => "applications/$application->id/reopen")) }}
							<span class="label label-warning">
								<b>Closed By:</b> {{ $application->closer->present()->fullName }}, 
								{{ $application->closer->team->abbrv }} / {{ $application->closer->office->location }}
							</span>

							<button class="btn btn-success pull-right">
								<i class="fa fa-plus-square"></i> Reopen
							</button>
						{{ Form::close() }}						
					@endif

					<div class="clearfix"></div>
				</div>
				
			</div>

			<div class="widget chat-widget">
				
				<div class="widget-head br-lblue">
					<h3 style="display:inline-block">
						<i class="fa fa-comments"></i> Comments
					</h3>
				</div>
				
				<div class="widget-body scroll">
					<ul class="list-unstyled">
						@foreach($application->comments->reverse() as $comment)
							@if( $comment->user_id === Auth::user()->id )
								<li class="by-me">
									<!-- Use the class "pull-left" in avatar -->
									<div class="avatar pull-left">
									  <img src="http://naijaticketshop.com/images/default_profile.jpg" alt="">
									</div>

									<div class="chat-content">
										<!-- In meta area, first include "name" and then "time" -->
										<div class="chat-meta"> {{ Auth::user()->present()->fullName }} 
											<span class="pull-right">{{ $comment->created_at}} ({{ $comment->present()->commentAge }})</span>
										</div>
									  	{{ $comment->message }}

										<div class="pull-right">
									  		{{ Button::makeCommentsDelete($comment->id, $comment->application_id, 'applications.comments.destroy', 'red', 'fa-trash-o' )}}
									 	 </div>

									  <div class="clearfix"></div>
									  
									</div>
								 </li>
							@else
								<li class="by-other">
									<!-- Use the class "pull-left" in avatar -->
									<div class="avatar pull-right">
									  <img src="http://naijaticketshop.com/images/default_profile.jpg" alt="">
									</div>

									<div class="chat-content">
									  <!-- In meta area, first include "name" and then "time" -->
									  <div class="chat-meta"> {{ $comment->user->present()->fullName }}
									  	<span class="pull-right">{{ $comment->created_at}} ({{ $comment->present()->commentAge }})</span>
									  </div>
									  {{ $comment->message }}
	
									  <div class="clearfix"></div>
									</div>
								 </li>
							@endif		
						@endforeach
					</ul>
				</div>
				
				<div class="widget-foot">
					{{ Form::open(array('url' => "applications/$application->id/comments", 'class' => 'form-inline')) }}
						
						{{ Form::text('message', Input::old('message'), array(
							'class' => 'form-control', 
							'style' => 'width: 87%', 
							'placeholder' => 'Enter a message...')
						) }}

						{{ Form::submit('Send', array('class' => 'btn btn-info btn-sm')) }}
						
					{{ Form::close() }}
					<div class="clearfix"></div>
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