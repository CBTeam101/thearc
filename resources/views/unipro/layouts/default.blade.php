<!doctype html>
<html lang="en">
	<head>
		@include('unipro.layouts.shared.meta')
    @include('unipro.layouts.shared.default.styles')
    @yield('styles')
	</head>
	<body class="authentication">
    @include('unipro.layouts.shared.loading')
		@yield('content')
		@include('unipro.layouts.shared.default.scripts')
	</body>
</html>