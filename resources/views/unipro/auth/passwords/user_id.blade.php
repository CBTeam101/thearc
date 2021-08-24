@extends('unipro.layouts.default')
@section('content')
<!-- *************
			************ Login container start *************
		************* -->
<div class="login-container">

  <div class="container-fluid h-100">

    <!-- Row start -->
    <div class="row no-gutters h-100">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="login-about">
          <div class="slogan">
            <span>Design</span>
            <span>Made</span>
            <span>Simple.</span>
          </div>
          <div class="about-desc">
            UniPro a data dashboard is an information management tool that visually tracks, analyzes and displays key performance indicators (KPI), metrics and key data points to monitor the health of a business, department or specific process.
          </div>
          <a href="crm.html" class="know-more">Know More <img src="{{asset('unipro/img/right-arrow.svg')}}" alt="img-logo"></a>

        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="login-wrapper">
          <form action="reports.html">
            <div class="login-screen">
              <div class="login-body pb-4">
                <a href="{{url('/forgot-password')}}" class="login-logo">
                  <img src="{{asset('shared/img/logo.png')}}" alt="logo">
                </a>
                <h6>In order to access your UniPro account, please enter the email id you provided during the registration process.</h6>
                <div class="field-wrapper mb-3">
                  <input type="email" autofocus placeholder="Enter your emial id">
                  <div class="field-placeholder">User ID</div>
                </div>
                <div class="actions">
                <a href="{{url('/login')}}">Back to Login</a>
                  <button type="submit" class="btn btn-danger ms-auto">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Row end -->


  </div>
</div>
<!-- *************
			************ Login container end *************
		************* -->
@endsection