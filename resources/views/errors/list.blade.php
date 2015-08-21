@if ($errors->any())
	<div class="flash flash-error shim-bottom">
		<strong>Error: </strong>
		@foreach ($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
@endif
