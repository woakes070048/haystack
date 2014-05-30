<!-- Sidebar starts -->
<div class="sidebar">
	<div class="sidey">
		<!-- Logo -->
		<div class="logo">
			<h1><a href="/">FTI Consulting</h1>
		</div>
		<!-- Sidebar navigation starts -->
		<div class="sidebar-dropdown">
			<a href="#" class="br-red"><i class="fa fa-bars"></i></a>
		</div>
		<div class="side-nav">
			<div class="side-nav-block">
				<h4>Applicant Tracker</h4>
				<ul class="list-unstyled">
					<li><a href="/"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="/applications"><i class="fa fa-user"></i> Applications</a></li>
				</ul>
			</div>
			@if ( $current_user->hasRole('admin') )
			<div class="side-nav-block">
				<h4>Admin</h4>
				<ul class="list-unstyled">
					<li><a href="/admin/users"><i class="fa fa-user"></i> Employees</a></li>
					<li><a href="/admin/teams"><i class="fa fa-group"></i> Teams</a></li>
					<li><a href="/admin/offices"><i class="fa fa-location-arrow"></i> Offices</a></li>
				</ul>
			</div>
			@endif
			<div class="side-nav-block">
				<h4>Support</h4>
				<ul class="list-unstyled">
					<li><a href="mailto:scott.cruwys@fticonsulting.com?Subject=Haystack%20Feedback"><i class="fa fa-thumbs-o-up"></i> Feedback</a></li>
					<li><a href="mailto:scott.cruwys@fticonsulting.com?Subject=Haystack%20Bugs"><i class="fa fa-bug"></i> Bugs</a></li>
					<li><a href="mailto:scott.cruwys@fticonsulting.com?Subject=Haystack%20Help"><i class="fa fa-question-circle"></i> Help</a></li>
				</ul>
			</div>
		</div>
		<!-- Sidebar navigation ends -->
	</div>
</div>
<!-- Sidebar ends -->