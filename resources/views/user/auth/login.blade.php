@extends('user.layouts.app')

@section('title')
Login | Digitizing Portal
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
                        <!-- Login -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="brand-logo">
                                    <h2 class="brand-text text-primary ms-1">LOGIN</h2>
                                </a>

                                <h4 class="card-title mb-1">Welcome to Digitizing Portal! 👋</h4>
                                <p class="card-text mb-2">Please sign-in to your account for updates</p>
                                
                                <form class="auth-login-form mt-2" method="POST" action="{{ route('user.login') }}"onsubmit="return submitUserForm();">
                                    @csrf

                                    <div class="mb-1">
                                        <label for="email" class="form-label">{{ __('Username') }}</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus tabindex="1">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                                <a href="{{ route('user.password.request') }}">
                                                    <small>Forgot Password?</small>
                                                </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password" type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" tabindex="2">
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    @php
                                        $captcha = getCustomCaptcha($height = 46, $width = '100%', $bgcolor = '#003');
                                    @endphp

                                    @if($captcha)

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            @php echo  $captcha @endphp
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label>Enter The Code Below</label>
                                            <input type="text" class="form-control" name="captcha" maxlength="6" placeholder="@lang('Enter Code')" required>
                                        </div>
                                    </div>
                                    @endif

                                    @if(reCaptcha())
                                        <div class="col-lg-12 col-12">
                                            <div class="mb-1">
                                                @php echo reCaptcha(); @endphp
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} tabindex="3">

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit" tabindex="4">{{ __('Sign In') }}</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>New on our platform?</span>
                                    <a href="{{ route('user.register') }}">
                                        <span>Create an account</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Login -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    
@endsection


@push('script')
    <script>
        'use strict';

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span class="text-danger">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>

@if(Session::has('success'))
    <script type="text/javascript">
        // Display the toaster message using Toastr (you need to include Toastr library in your layout)
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
@endpush

