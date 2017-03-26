@extends('layouts.app')

@section('content')
<div class="container">
	<div class="box is-clearfix">
		<div>
			<h1 class="title is-inline">Parts Master File</h1>
			{{-- <form method="post" action="{{ url('/parts/catalogs/upload') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="file" name="file_catalogs" class="is-pulled-right">
				<button class="button">Upload</button>
			</form> --}}
			<a class="button is-pulled-right is-primary" href="{{ route('new-skus-form') }}">New</a>
		</div>
	</div>
	<div class="box">
		<div class="columns is-multiline">
			<div class="column is-3 is-offset-9">
				<form method="get" action="{{ route('list-skus') }}">
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
							<th>ID</th>
							<th>SKU</th>
							<th>Brand</th>
							<th>On Hand</th>
							<th>Qty. Available</th>
							<th>SRP</th>
							<th>Cost</th>
							<th>Hazardous</th>
							<th>Expires</th>
							<th>Date Created</th>
						</tr>
					</thead>
					<tbody>
						@if(!$catalogs->isEmpty())
							@foreach($catalogs as $catalog)
								<tr>
									<td>{{ str_pad($catalog->id, 10, "0", STR_PAD_LEFT) }}</td>
									<td><a href="{{ route('view-skus', ['id' => $catalog->id]) }}">{{ "{$catalog->part_number}-{$catalog->pne_code}" }}</a></td>
									<td>{{ $catalog->brand }}</td>
									<td>{{ $catalog->on_hand }}</td>
									<td>{{ $catalog->available }}</td>
									<td>{{ $catalog->price }}</td>
									<td>{{ $catalog->cost }}</td>
									<td>
										<input type="checkbox" disabled @if($catalog->is_hazardous){{ "checked" }}@endif>
									</td>
									<td>
										<input type="checkbox" disabled @if($catalog->has_expiration){{ "checked" }}@endif>
									</td>
									<td>{{ $catalog->created_at->format('M. j,Y') }}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td class="has-text-centered" colspan="10">No records found</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="column is-12">
				{{ $catalogs->links('utilities.partials.pagination.bulma') }}
			</div>
		</div>
	</div>
</div>
@endsection