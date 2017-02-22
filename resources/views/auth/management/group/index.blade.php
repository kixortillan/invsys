@extends('layouts.app')

@section('content')
<div class="container">
	<div class="box">
		<table class="table is-striped is-narrow">
			<thead>
				<tr>
					<td>Name</td>
					<td>Description</td>
					<td>Date Created</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="3">{{ $groups->links('utilities.partials.pagination.bulma') }}</td>
				</tr>
			</tfoot>
			<tbody>
				@if(!$groups->isEmpty())
					@foreach($groups as $group)
						<tr>
							<td>{{ ucwords($group->name) }}</td>
							<td>{{ ucfirst($group->desc) }}</td>
							<td>{{ $group->created_at }}</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="has-text-centered" colspan="3">No records found</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection