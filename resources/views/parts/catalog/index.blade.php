@extends('layouts.app')

@section('content')
<div class="container">
	<div class="box is-clearfix">
		<div>
			<h1 class="title is-inline">Catalog</h1>
			<form method="post" action="{{ url('/parts/catalogs/upload') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="file" name="file_catalogs" class="is-pulled-right">
				<button class="button">Upload</button>
			</form>
			<a class="button is-pulled-right is-primary" href="{{ url('/parts/catalogs/catalog') }}">New</a>
		</div>
	</div>
	<div class="box datatable">
		<table class="table is-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Part Number</th>
					<th>Part Number Extension</th>
					<th>Brand</th>
					<th>Hazardous</th>
					<th>Expires</th>
					<th>Date Created</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@if(!$catalogs->isEmpty())
					@foreach($catalogs as $catalog)
						<tr>
							<td>{{ $catalog->id }}</td>
							<td>{{ $catalog->part_number }}</td>
							<td>{{ $catalog->pne_code }}</td>
							<td>{{ $catalog->brand }}</td>
							<td>
								<input type="checkbox" disabled @if($catalog->is_hazardous){{ "checked" }}@endif>
							</td>
							<td>
								<input type="checkbox" disabled @if($catalog->has_expiration){{ "checked" }}@endif>
							</td>
							<td>{{ $catalog->created_at->format('M. j,Y') }}</td>
							<td class="is-clearfix">
								<a class="button is-info is-pulled-left" href="{{ url("/parts/catalogs/catalog/{$catalog->id}") }}">View</a>
								<form method="post" action="{{ url("/parts/catalogs/catalog/{$catalog->id}") }}">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button class="button is-pulled-left">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td class="has-text-centered" colspan="8">No records found</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
	<div class="box">
		{{ $catalogs->links('utilities.partials.pagination.bulma') }}
	</div>
</div>
@endsection