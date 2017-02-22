@extends('layouts.app')

@section('content')
<div class="container">
	<div class="box">
		<table class="table is-striped">
			<thead>
				<tr>
					<th>Email</th>
					<th>Name</th>
					<th>Date Created</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(!$users->isEmpty())
					@foreach($users as $user)
						<tr>
							<td>{{ $user->email }}</td>
							<td>{{ ucwords($user->name) }}</td>
							<td>{{ $user->created_at }}</td>
							<td><a class="button" href="{{ url("app/management/users/$user->id") }}">View</a></td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="has-text-centered" colspan="4">No records found</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
	<div class="box">
		{{ $users->links('utilities.partials.pagination.bulma') }}
	</div>
</div>
@endsection