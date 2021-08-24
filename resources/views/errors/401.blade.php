@extends('errors::minimal')

@section('content')

<body class="error-page">

  <div id="particles-js"></div>
  <div class="countdown-bg"></div>

  <div class="error-screen">
    <h1>{{$exception->getStatusCode()}}</h1>
    <h5>We're sorry but it looks<br />like that {{$exception->getMessage()}}.</h5>
    <a href="{{url('/')}}" class="btn stripes-btn">Go back to Dashboard</a>
  </div>

  <!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
  <!-- Required jQuery first, then Bootstrap Bundle JS -->
  <script src="{{asset('unipro/js/jquery.min.js')}}"></script>
  <script src="{{asset('unipro/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('unipro/js/moment.js')}}"></script>

  <!-- *************
			************ Vendor Js Files *************
		************* -->
  <!-- Particles JS -->
  <script src="{{asset('unipro/vendor/particles/particles.min.js')}}"></script>
  <script src="{{asset('unipro/vendor/particles/particles-custom-error.js')}}"></script>

</body>
@endsection