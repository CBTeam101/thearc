{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
<div class="col-md-6">
        
  <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-sm-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                      <a href="{!! url('/index'); !!}"><img src="{{ asset('images/axie-blockcolor_03.png') }}" alt="" style="width: 250px;"></a>
                    </div>
                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>First Name</strong></label>
                            <input type="text" class="form-control" placeholder="Juan" name="first_name">
                        </div>
                        @error('first_name')
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Middlename(Optional)</strong></label>
                            <input type="text" class="form-control" placeholder="A." name="middle_name">
                        </div>
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Last Name</strong></label>
                            <input type="text" class="form-control" placeholder="Dela Cruz" name="last_name">
                        </div>
                        @error('last_name')
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Contact No.</strong></label>
                            <input type="text" class="form-control" placeholder="09*********" name="contact_no">
                        </div>
                        @error('contact_no')
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Email</strong></label>
                            <input type="email" class="form-control" placeholder="juandelacruz@example.com" name="email">
                        </div>
                        @error('email')
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Username</strong></label>
                            <input type="text" class="form-control" placeholder="username" name="username">
                        </div>
                        @error('username')
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Password</strong></label>
                            <input type="password" class="form-control" placeholder="********" name="password">
                        </div>
                        @error('password')
                        <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Confirm Password</strong></label>
                            <input type="password" class="form-control" placeholder="********" name="password_confirmation">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                        </div>
                    </form>
                    <div class="new-account mt-3">
                        <p class="text-white">Already have an account? <a class="text-white" href="{!! url('/page-login'); !!}">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection