@extends('errors::minimal')

@section('content')

<body class="maintenance-page">

  <div class="container">
    <!-- Row start -->
    <div class="row justify-content-between">
      <div class="col-xl-5 col-lg-5 col-md-6 col-sm-7 col-12">
        <div class="maintenance-message">
          <h1>OOPS!</h1>
          <h4>Under Construction</h4>
          <p>Sorry for the inconvenience but we are performing some maintenance at the moment. We will be back online shortly!</p>
          <div class="mt-4">
            <a href="{{url('/')}}" class="btn btn-info stripes-btn">Go Back to Dashboard</a>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 col-12">
        <img src="{{asset('unipro/img/maintenance.png')}}" class="img-fluid" alt="Maintenance" />
      </div>
    </div>
    <!-- Row end -->
  </div>

</body>
@endsection