@extends('admin.layouts.app')

@section('title')
    Admin Login | Realvisory
@endsection

@section('content')
    <style>
        .auth-inner {
            display: grid;
            align-items: center;
            justify-content: center;
            max-width: 400px;
            margin: 0 auto;
        }
    </style>

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
                                <a href="#" class="brand-logo text-center mx-auto">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" width="70%" />
                                    <h2 class="brand-text text-primary mt-2">LOGIN</h2>
                                </a>

                                <form class="auth-login-form mt-2" method="POST" action="{{ route('admin.login') }}">
                                    @csrf

                                    <div class="mb-1">
                                        <label for="email" class="form-label">{{ __('Username') }}</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required autocomplete="username"
                                            autofocus tabindex="1">

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
                                            <input id="password" type="password"
                                                class="form-control form-control-merge @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" tabindex="2">
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary w-100" type="submit"
                                        tabindex="4">{{ __('Sign In') }}</button>
                                </form>


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
        $("form.auth-login-form").on('submit', function() {
            localStorage.setItem("openedWindows", JSON.stringify({}));
        })
    </script>
    @if (Session::has('success'))
        <script type="text/javascript">
            // Display the toaster message using Toastr (you need to include Toastr library in your layout)
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
@endpush
