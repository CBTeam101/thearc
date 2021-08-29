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
            ACBUS a data dashboard is an information management tool that visually tracks, analyzes and displays key performance indicators (KPI), metrics and key data points to monitor the health of a business, department or specific process.
          </div>
          <a href="crm.html" class="know-more">Know More <img src="{{asset('unipro/img/right-arrow.svg')}}" alt="img-logo"></a>

        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="login-wrapper">
          <form action="{{url('/register')}}" method="POST">
            @csrf
            <div class="login-screen">
              <div class="login-body">
                <a href="{{url('/register')}}" class="login-logo">
                  <img src="{{asset('shared/img/logo.png')}}" alt="logo">
                </a>
                <h6>Welcome to UniPro dashboard,<br>Create your account.</h6>
                <label for="">Personal Info</label>
                <div class="field-wrapper">
                  <input type="text" autofocus name="first_name" required>
                  <div class="field-placeholder">First Name<i class="text-danger">*</i></div>
                </div>
                <div class="field-wrapper">
                  <input type="text" name="middle_name">
                  <div class="field-placeholder">Middle Name(Optional)</div>
                </div>
                <div class="field-wrapper">
                  <input type="text" name="last_name" required>
                  <div class="field-placeholder">Last Name<i class="text-danger">*</i></div>
                </div>
                <label for="">Contact Info</label>
                <div class="field-wrapper">
                  <input type="text" name="contact_no" required>
                  <div class="field-placeholder">Contact No<i class="text-danger">*</i></div>
                </div>
                <div class="field-wrapper">
                  <input type="email" name="email" required>
                  <div class="field-placeholder">Email<i class="text-danger">*</i></div>
                </div>
                <label for="">Account Info</label>
                <div class="field-wrapper">
                  <input type="text" name="username" required>
                  <div class="field-placeholder">User ID<i class="text-danger">*</i></div>
                </div>
                <div class="field-wrapper">
                  <input type="password" name="password" required>
                  <div class="field-placeholder">Password<i class="text-danger">*</i></div>
                </div>
                <div class="field-wrapper mb-3">
                  <input type="password" name="password_confirmation" required>
                  <div class="field-placeholder">Confirm Password<i class="text-danger">*</i></div>
                </div>
                <div class="actions">
                  <button type="submit" class="btn btn-primary ms-auto">Sign Up</button>
                </div>
              </div>
              <div class="login-footer">
                <span class="additional-link">Have an account? <a href="{{url('/login')}}" class="btn btn-light">Login</a></span>
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