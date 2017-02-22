@extends('layouts.app')

@section('content')
<div class="container">
	<div class="box is-clearfix">
		<div>
			<h1 class="title is-inline">Part Number Extension</h1>
			<a class="button is-pulled-right is-primary" href="{{ url('/parts/pnes/pne') }}">New</a>
		</div>
	</div>
	<div class="box datatable">
		<table class="table is-striped">
			<thead>
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Date Created</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(!$pnes->isEmpty())
					@foreach($pnes as $pne)
						<tr>
							<td>{{ $pne->code }}</td>
							<td>{{ ucwords($pne->description) }}</td>
							<td>{{ $pne->created_at->format('M. j,Y') }}</td>
							<td class="is-clearfix">
								<a class="button is-info is-pulled-left" href="{{ url("/parts/pnes/pne/$pne->code") }}">View</a>
								<form method="post" action="{{ url("/parts/pnes/pne/{$pne->code}") }}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="button is-pulled-left">Delete</button>
								</form>
							</td>
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
		{{ $pnes->links('utilities.partials.pagination.bulma') }}
	</div>
</div>
@endsection