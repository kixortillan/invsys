@extends('layouts.app')

@section('content')
<div class="container">
	@if(session('message'))
		<vuelma-notif type="success" text="{{ session('message') }}"></vuelma-notif>
	@endif
	<div class="box is-clearfix">
		<div>
			<h1 class="title is-inline">Brands</h1>
			<a class="button is-pulled-right is-primary" href="{{ route('new-brands-form') }}">New</a>
		</div>
	</div>
	<div class="box">
		<div class="columns is-multiline">
			<div class="column is-3-desktop is-offset-9-desktop is-half-tablet is-offset-half-tablet">
				<form method="get" action="{{ route('list-brands') }}">
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
							<th>Name</th>
							<th>Description</th>
							<th>Date Created</th>
						</tr>
					</thead>
					<tbody>
						@if(!$brands->isEmpty())
							@foreach($brands as $brand)
								<tr>
									<td>
										<a href="{{ route('view-brands', ['name' => $brand->name]) }}" class="is-flex">{{ $brand->name }}</a>
									</td>
									<td>{{ str_limit(ucwords($brand->description), 20) }}</td>
									<td>{{ $brand->created_at->format('M. j,Y') }}</td>
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
			<div class="column is-12">
				{{ $brands->links('utilities.partials.pagination.bulma') }}
			</div>
		</div>
	</div>
</div>
@endsection