{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
<div class="col-md-6">
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <a href="{!! url('/index'); !!}"><img src="{{ asset('images/axie_logo_login.png') }}" alt=""></a>
                    </div>
                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Username</strong></label>
                            <input type="text" class="form-control" placeholder="juandelacruz" name="username">
                        </div>
                        @error('username')
                            <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Password</strong></label>
                            <input type="password" class="form-control" placeholder="*************" name="password">
                        </div>
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ml-1 text-white">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="text-white" href="{!! url('/page-forgot-password'); !!}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                        </div>
                    </form>
                    <div class="new-account mt-3">
                        <p class="text-white">Don't have an account? <a class="text-white" href="{{ route('register') }}">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection