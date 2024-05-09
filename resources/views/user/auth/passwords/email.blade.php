@extends('layouts.app')

@section('title')
Reset | Digitizing Portal
@endsection

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
                                <p class="card-text mb-2">Please verify your email address</p>
                                
                                 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-1">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus tabindex="1">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                            <button type="submit" class="btn btn-primary w-100" tabindex="2">
                                    {{ __('Send Password Reset Link') }}
                                </button>
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
