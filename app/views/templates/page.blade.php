@include('templates.header')

<div class="container">
	@yield('header')
	<div class="container-content" role="content">
		@yield('content')
	</div>
</div>

@include('templates.footer')



