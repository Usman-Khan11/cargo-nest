@extends('layouts.app')

@section('content')
   
<!-- BEGIN: Content-->
    <div class="app-content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Reset -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="brand-logo">
                                    <h2 class="brand-text text-primary ms-1">RESET PASSWORD</h2>
                                </a>

                                <h4 class="card-title mb-1">Welcome to Digitizing Portal! 👋</h4>
                                <p class="card-text mb-2">Please Reset your pasword with new credentials</p>
                                
                                <form class="auth-login-form mt-2" method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-1">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus  tabindex="1">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" tabindex="2">
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" tabindex="3">
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                   
                                    <button class="btn btn-primary w-100" type="submit" tabindex="4">{{ __('Reset Password') }}</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Go Back To Login?</span>
                                    <a href="{{ route('login') }}">
                                        <span>Login</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Reset-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
