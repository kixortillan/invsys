@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns is-multiline">
		<div class="column is-offset-one-quarter is-half">
			<div class="card">
				<div class="card-header">
					<p class="card-header-title is-primary">User Information</p>
				</div>
				<div class="card-content">
					<form method="post" action="{{ url('') }}" class="is-clearfix">
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Email</label>
							</div>
							<div class="control is-grouped">
								<input class="input" value="{{ $user->email }}" placeholder="Name here" required />
							</div>
						</div>
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Name</label>
							</div>
							<div class="control is-grouped">
								<input class="input" value="{{ $user->name }}" placeholder="Email here" required />
							</div>
						</div>
						<button class="button is-pulled-right">Update</button>
					</form>
				</div>
			</div>
		</div>
		<div class="column is-offset-one-quarter is-half">
			<div class="card">
				<div class="card-header">
					<p class="card-header-title">User Permissions</p>
				</div>
				<div class="card-content">
					<table class="table">
						<thead>
							<tr>
								<th>Access</th>
								<th>Permission</th>
							</tr>
						</thead>
						<tbody>
							@foreach($userPermission as $permission)
								<tr>
									<td>{{ $permission->name }}</td>
									<td>{{ $permission->pivot->permission }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="column is-offset-one-quarter is-half">
			<div class="card">
				<div class="card-header">
					<p class="card-header-title">Member of Group</p>	
				</div>
				<div class="card-content">
					{{-- <table class="table">
						<thead>
							<tr>
								<th>Access</th>
								<th>Group</th>
								<th>Permission</th>
							</tr>
						</thead>
						<tbody>
							@foreach($groupPermission as $permission)
								@foreach($gp->groups as $group)
								<tr>
									<td>{{ $group->name }}</td>
									<td>{{ $group-> }}</td>
									<td></td>
								</tr>
								@endforeach
							@endforeach
						</tbody>
					</table> --}}

						<table class="table">
							<thead>
								<tr>
									<th>Group Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($groupPermission as $name => $permissions)
								<tr>
									<td>{{ $name }}</td>
									<td><a class="button">View</a></td>
								</tr>
							@endforeach
							</tbody>
						</table>
				</div>
			</div>
		</div>			
	</div>
</div>
@endsection