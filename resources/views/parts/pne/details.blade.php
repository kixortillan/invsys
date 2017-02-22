@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<form method="post" action="{{ url('/parts/pnes/pne') }}">
				<div class="card">
					<div class="card-header">
						<p class="card-header-title">New Part Number Extension</p>
					</div>
					<div class="card-content is-clearfix">
						@if(count($errors) > 0)
							<div class="notification is-danger">
								<button class="delete"></button>
								{{ $errors->first() }}
							</div>
						@endif

						{{ csrf_field() }}

						@if(isset($pne))
							{{ method_field('PUT') }}
						@endif

						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Part Number Extension</label>
							</div>
							<div class="control">
								<input name="code" type="text" class="input" value="@if(isset($pne)){{ trim($pne->code) }}@else{{ trim(old('code')) }}@endif" />
							</div>
						</div>
						<div class="control is-horizontal">
							<div class="control-label">
								<label class="label">Description</label>
							</div>
							<div class="control">
								<textarea name="description" class="textarea">@if(isset($pne)){{ trim($pne->description) }}@else{{ trim(old('description')) }}@endif</textarea>
							</div>
						</div>
						<button class="button is-pulled-right is-primary">@if(isset($pne)){{ "Update" }}@else{{ "Create" }}@endif</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection