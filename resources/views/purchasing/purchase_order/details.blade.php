@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			@if(count($errors) > 0)
				<vuelma-notif type="danger" text="{{ $errors->first() }}"></vuelma-notif>
			@endif

			<div class="card">
				<div class="card-header">
					<p class="card-header-title">Upload Purchas Order</p>
				</div>
				<div class="card-content">
												
					<div class="columns is-multiline">
						<div class="column is-12 has-text-centered">
							<form action="{{ route('upload-purchase-order-file') }}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<vuelma-file-upload name="purchase_order" :is-multiple="false">
								</vuelma-file-upload>
								<button class="button">Go</button>
							</form>
						</div>
						<div class="column is-12">
							<vue-handsontable></vue-handsontable>
						</div>
					</div>
					{{-- <section class="section">
						<purchase-order-table></purchase-order-table>
					</section> --}}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection