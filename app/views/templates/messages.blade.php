<div id="system-messages">

	@if (Session::has('message_error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Oops!</strong> {{ Session::get('message_error') }}
	</div>
	@endif
	@if(isset($message_error))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Oops!</strong> {{ $message_error }}
	</div>
	@endif


	@if (Session::has('message_success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> {{ Session::get('message_success') }}
	</div>
	@endif
	@if(isset($message_success))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Success!</strong> {{ $message_success }}
	</div>
	@endif

	@if (Session::has('message_warning'))
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Warning!</strong> {{ Session::get('message_warning') }}
	</div>
	@endif
	@if(isset($message_warning))
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Warning!</strong> {{ $message_warning }}
	</div>
	@endif

	@if (Session::has('message_info'))
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Info</strong> {{ Session::get('message_info') }}
	</div>
	@endif
	@if(isset($message_info))
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Info</strong> {{ $message_info }}
	</div>
	@endif

</div>