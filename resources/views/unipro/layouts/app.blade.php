<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
    @include('unipro.layouts.shared.meta-app')
    @include('unipro.layouts.shared.app.styles')
    @yield('styles')
	</head>
	<body>

		@include('unipro.layouts.shared.loading')

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			@include('unipro.layouts.shared.sidebar')

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				@include('unipro.layouts.shared.page-header')

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					@yield('content')

					@include('unipro.layouts.shared.footer')

				</div>
				<!-- Content wrapper scroll end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

		</div>
		<!-- Page wrapper end -->
    @include('unipro.layouts.shared.app.scripts')
	</body>
</html>