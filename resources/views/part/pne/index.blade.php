@extends('layouts.app')

@section('content')
<div class="container">
	@if(session('message'))
		<div class="notification is-success">
			{{ session('message') }}
		</div>
	@endif
	<div class="box is-clearfix">
		<div>
			<h1 class="title is-inline">PNE</h1>
			<a class="button is-pulled-right is-primary" href="{{ route('new-pnes-form') }}">New</a>
		</div>
	</div>
	<div class="box">
		<div class="columns is-multiline">
			<div class="column is-3-desktop is-offset-9-desktop is-half-tablet is-offset-half-tablet">
				<form method="get" action="{{ route('list-pnes') }}">
					<p class="control has-addons">
						<input type="text" class="input is-expanded" name="search" value="{{ Request::query('search') }}" placeholder="Search">
						<button class="button is-primary">
							<i class="fa fa-search"></i>
						</button>
					</p>
				</form>
			</div>
			<div class="column is-12">
				<table class="table is-striped">
					<thead>
						<tr>
							<th>Code</th>
							<th>Description</th>
							<th>Date Created</th>
						</tr>
					</thead>
					<tbody>
						@if(!$pnes->isEmpty())
							@foreach($pnes as $pne)
								<tr>
									<td>
										<a href="{{ route('view-pnes', ['code' => $pne->code]) }}">{{ $pne->code }}</a>
									</td>
									<td>{{ ucwords($pne->description) }}</td>
									<td>{{ $pne->created_at->format('M. j,Y') }}</td>
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
		<div class="column is-12">
			{{ $pnes->links('utilities.partials.pagination.bulma') }}
		</div>
	</div>
</div>
@endsection