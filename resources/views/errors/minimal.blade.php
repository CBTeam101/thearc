<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="E-Tokens we sell and buy token's it's like crypto.">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>{{env('APP_NAME')}} - {{$exception->getStatusCode()}} - Error Page</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset('unipro/css/bootstrap.min.css')}}">
		
		<!-- Main css -->
        <link rel="stylesheet" href="{{asset('unipro/css/main.css')}}">
        
        <!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- Particles CSS -->		
		<link rel="stylesheet" href="{{asset('unipro/vendor/particles/particles.css')}}">

    </head>
    
    @yield('content')
</html>