@extends('_layouts.master')

@section('page-section')
	<h2><i class="fa fa-gavel lblue"></i> Admin Panel</h2>
@stop

@section('page-header')
  <h3 class="pull-left"><i class="fa fa-user lblue"></i> Employees</h3>
  <!-- Bread crumbs -->
  <div class="breads pull-right">
    <strong>Nav</strong> : <a href="/admins">Admin</a> / Employees
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
								{{ Sortable::makeHeader('admin.users.index', 'Name', 'first_name') }}
							</th>
							<th>
								{{ Sortable::makeHeader('admin.users.index', 'Group', 'team_id') }}
							</th>											
							<th>
								{{ Sortable::makeHeader('admin.users.index', 'Title', 'title') }}
							</th>
							<th>
								{{ Sortable::makeHeader('admin.users.index', 'Location', 'office_id') }}
							</th>
							<th>
								{{ Sortable::makeHeader('admin.users.index', 'Email', 'email') }}
							</th>
							<th>
								{{ Sortable::makeHeader('admin.users.index', 'Date Created', 'created_at') }}
							</th>
							<th>
								Role
							</th>
							<th>Action</th>
						</tr>

						@foreach($users as $user)
						<tr>
							<td><input type="checkbox"></td>
							<td>{{ $user->present()->fullName }}</td>
							<td>{{ $user->team->abbr }}</td>
							<td>{{ $user->title }}</td>
							<td>{{ $user->office->location }}</td>
							<td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->roles->first()->name }}</td>
							<td>
								<a href="/admin/users/{{ $user->id }}/edit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
								@if ( $user->id != Auth::user()->id )
									{{ Button::makeDelete($user->id) }} 
								@endif
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				
				<div class="pull-right">
					{{ $users->addQuery('order', $order)->addQuery('sort', $sort)->links() }}
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
</div>	
@stop
