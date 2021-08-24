@extends('unipro.layouts.default')

@section('styles')
<style>
</style>
@endsection

@section('content')
<!-- *************
			************ Login container start *************
		************* -->
<div class="login-container">

  <div class="container-fluid h-100">

    <!-- Row start -->
    <div class="row g-0 h-100">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="login-about">
          <div class="slogan">
            <span>Earning</span>
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
          <form action="{{url('/login')}}" method="POST">
            @csrf
            <div class="login-screen">
              <div class="login-body">
                <a href="{{url('/')}}" class="login-logo">
                  <img src="{{asset('shared/img/logo.png')}}" alt="img-logo">
                </a>
                <h6>Welcome back,<br>Please login to your account.</h6>
                <div class="field-wrapper">
                  <input type="email" autofocus required>
                  <div class="field-placeholder">User ID<i class="text-danger">*</i></div>
                </div>
                <div class="field-wrapper mb-3">
                  <input type="password" required>
                  <div class="field-placeholder">Password<i class="text-danger">*</i></div>
                </div>
                <div class="actions">
                  <a href="{{url('/forgot-password')}}">Forgot password?</a>
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
              <div class="login-footer">
                <span class="additional-link">No Account? <a href="{{url('/register')}}" class="btn btn-light">Sign Up</a></span>
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