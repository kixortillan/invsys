@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<form method="post" action="{{ url('/parts/catalogs/catalog') }}">
				<div class="card">
					<div class="card-header">
						<p class="card-header-title">New Catalog</p>
					</div>
					<div class="card-content is-clearfix">
						@if(session('message'))
							<div class="notification is-success">
								<button class="delete"></button>
								{{ session('message') }}
							</div>
						@endif

						@if(count($errors) > 0)
							<div class="notification is-danger">
								<button class="delete"></button>
								{{ $errors->first() }}
							</div>
						@endif

						{{ csrf_field() }}

						@if(isset($catalog))
							{{ method_field('PUT') }}
						@endif

						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Part Number</label>
							</div>
							<div class="control">
								<input name="part_number" type="text" class="input" value="@if(isset($catalog)){{ trim($catalog->part_number) }}@else{{ trim(old('part_number')) }}@endif" required />
							</div>
						</div>
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Part Number Extension</label>
							</div>
							<div class="control">
								<span class="select is-fullwidth">
									<select name="pne_code" required>
										<option value="">Please select a PNE code</option>
										@foreach($pnes as $pne)
											<option @if(old('pne_code') == $pne->code){{ "selected" }}@endif value="{{ $pne->code }}">{{ $pne->code }}</option>
										@endforeach
									</select>
								</span>
								{{-- <input name="pne_code" type="text" class="input" value="@if(isset($catalog)){{ trim($catalog->pne_code) }}@else{{ trim(old('pne_code')) }}@endif" /> --}}
								{{-- <vuelma-select placeholder="Select your PNE code" :search="true" @type="search" :options="['TWN', 'JPN']"></vuelma-select> --}}
							</div>
						</div>
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Brand</label>
							</div>
							<div class="control">
								<input name="brand" type="text" class="input" value="@if(isset($catalog)){{ trim($catalog->brand) }}@else{{ trim(old('brand')) }}@endif" />
							</div>
						</div>
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="checkbox">
									<input name="is_hazardous" type="checkbox" value="1" />
									Hazardous
								</label>
							</div>
							<div class="control-label">
								<label class="checkbox">
									<input name="has_expiration" type="checkbox" value="1" />
									Expire
								</label>
							</div>
						</div>	
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Description</label>
							</div>
							<div class="control">
								<textarea name="description" class="textarea">@if(isset($catalog)){{ trim($catalog->description) }}@else{{ trim(old('description')) }}@endif</textarea>
							</div>
						</div>
						<button class="button is-pulled-right is-primary">@if(isset($catalog)){{ "Update" }}@else{{ "Create" }}@endif</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection