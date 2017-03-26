@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			
			@if(session('message'))
				<vuelma-notif type="success" text="{{ session('message') }}"></vuelma-notif>
			@endif

			@if(count($errors) > 0)
				<vuelma-notif type="danger" text="{{ $errors->first() }}"></vuelma-notif>
			@endif


			<form method="post" action="{{ route('new-skus') }}">
				
				{{ csrf_field() }}

				@if(isset($catalog))
					{{ method_field('PUT') }}
				@endif

				<div class="card">
					<div class="card-header">
						<p class="card-header-title">Parts Info</p>
					</div>
					<div class="card-content">

						<div class="columns is-multiline">
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Part Number</label>
								</div>
							</div>
							<div class="column is-9">
								<input name="part_number" type="text" class="input" value="@if(isset($catalog)){{ trim($catalog->part_number) }}@else{{ trim(old('part_number')) }}@endif" required>
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">PNE</label>
								</div>
							</div>
							<div class="column is-9">
								<span class="select is-fullwidth">
									<select name="pne_code" required>
										<option value="">Please select a PNE code</option>
										@foreach($pnes as $pne)
											<option @if(old('pne_code') == $pne->code || (isset($catalog) && $pne->code == $catalog->pne_code)){{ "selected" }}@endif value="{{ $pne->code }}">{{ $pne->code }}</option>
										@endforeach
									</select>
								</span>
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Brand</label>
								</div>
							</div>
							<div class="column is-9">
								<input name="brand" type="text" class="input" value="@if(isset($catalog)){{ $catalog->brand }}@else{{ old('brand') }}@endif">
							</div>
							
							<div class="column is-2 is-offset-4">
								<div class="control-label">
									<label class="checkbox">
										<input name="is_hazardous" type="checkbox" value="1" @if(isset($catalog) && $catalog->is_hazardous){{ "checked" }}@endif>
										Hazardous
									</label>
								</div>
							</div>
							<div class="column is-6">
								<div class="control-label">
									<label class="checkbox">
										<input name="has_expiration" type="checkbox" value="1" @if(isset($catalog) && $catalog->has_expiration){{ "checked" }}@endif>
										Expire
									</label>
								</div>
							</div>	
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Description</label>
								</div>
							</div>
							<div class="column is-9">
								<textarea name="description" class="textarea">@if(isset($catalog)){{ $catalog->description }}@else{{ old('description') }}@endif</textarea>
							</div>
						</div>

					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<p class="card-header-title">Stock Details</p>
					</div>
					<div class="card-content">

						<div class="columns is-multiline">
							<div class="column is-3">
								<div class="control-label">
									<label class="label">On Hand</label>
								</div>
							</div>
							<div class="column is-3">
								<input name="on_hand" type="number" min="0" step="1" class="input" value="@if(isset($catalog)){{ $catalog->on_hand }}@else{{ old('on_hand') }}@endif">
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Qty. Available</label>
								</div>
							</div>
							<div class="column is-3">
								<input name="available" type="number" min="0" step="1" class="input" value="@if(isset($catalog)){{ $catalog->available }}@else{{ old('available') }}@endif">
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Reserved</label>
								</div>
							</div>
							<div class="column is-3">
								<input name="reserved" type="number" min="0" step="1" class="input" value="@if(isset($catalog)){{ $catalog->reserved }}@else{{ old('reserved') }}@endif">
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Unserved</label>
								</div>
							</div>
							<div class="column is-3">
								<input name="unserved" type="number" min="0" step="1" class="input" value="@if(isset($catalog)){{ $catalog->unserved }}@else{{ old('unserved') }}@endif">
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Issued</label>
								</div>
							</div>
							<div class="column is-3">
								<input name="issued" type="number" min="0" step="1" class="input" value="@if(isset($catalog)){{ $catalog->issued }}@else{{ old('issued') }}@endif">
							</div>
						</div>

					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<p class="card-header-title">Pricing</p>
					</div>
					<div class="card-content">

						<div class="columns is-multiline">	
							<div class="column is-3">
								<div class="control-label">
									<label class="label">SRP</label>
								</div>
							</div>
							<div class="column is-9">
								<p class="control has-addons">
									<span class="select">
										<select name="srp_currency">
											@foreach($currencies as $currency)
												<option value="{{ $currency->code }}">{{ $currency->code }}</option>
											@endforeach
										</select>
									</span>
									<input name="srp" type="number" min="0.00" step="1" class="input" value="@if(isset($catalog)){{ $catalog->srp }}@else{{ old('srp') }}@endif" style="min-width: 0" required>
								</p>
							</div>
							<div class="column is-3">
								<div class="control-label">
									<label class="label">Cost</label>
								</div>
							</div>
							<div class="column is-9">
								<div class="control has-addons">
									<span class="select">
										<select name="cost_currency">
											@foreach($currencies as $currency)
												<option value="{{ $currency->code }}">{{ $currency->code }}</option>
											@endforeach
										</select>
									</span>
									<input name="cost" type="number" min="0.00" step="1" class="input" value="@if(isset($catalog)){{ $catalog->cost }}@else{{ old('cost') }}@endif" style="min-width: 0" required>
								</div>
							</div>
						</div>

					</div>
					<div class="card-footer">
						<div class="column is-2 is-offset-10">
							<button class="button is-pulled-right is-primary is-fullwidth">@if(isset($catalog)){{ "Update" }}@else{{ "Create" }}@endif</button>
						</div>
					</div>
				</div>

			</form>

		</div>
	</div>
</div>
@endsection