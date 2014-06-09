@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-user lblue"></i> Support</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-cogs lblue"></i> Support</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/support">Support</a>
  </div>
@stop


@section('content')
	@include('_partials.notifications')				

	<div class="row">
		<div class="col-md-6">
			<!-- Project widget -->
			<div class="widget projects-widget">
				
				<div class="widget-head br-lblue">
					<h3><i class="fa fa-envelope"></i> Send Message</h3>							
				</div>
				
				<div class="widget-body">

					{{ Form::open(array('url' => 'support/message', 'class' => 'form-horizontal')) }}

						<div class="form-group">
							<label class="col-lg-4 control-label">From</label>
							<div class="col-lg-8">
								<input type="text" value="{{ Auth::user()->present()->fullName }}" class="form-control" disabled>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Subject</label>
							<div class="col-lg-8">
								<select name="subject" id="subject" class="form-control">
									<option value="feedback">I have some feedback</option>
									<option value="bugs">I found a bug</option>
									<option value="questions">I have a question</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Message</label>
							<div class="col-lg-8">
								{{ Form::textarea('messageBody', Input::old('messageBody'), array('class' => 'form-control', 'style' => 'resize:none')) }}								
							</div>	
						</div>								
				</div>
				
				<div class="widget-foot">
					<button type="submit" class="btn btn-info pull-right">Send</button>
					<div class="clearfix"></div>
				</div>
			
				{{ Form::close() }}

			</div>
		</div>
	</div>
@stop