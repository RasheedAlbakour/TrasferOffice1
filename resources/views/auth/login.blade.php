<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="background-color: #001f3ff5; border-radius: 1rem; color: white;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h3 class="fw-bold mb-2 text-uppercase">{{ __('auth-login.login_title') }}</h3>
                                <p class="text-white-50 mb-5">{{ __('auth-login.login_subtitle') }}</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                        <label class="form-label" for="email">{{ __('auth-login.email') }}</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        <label class="form-label" for="password">{{ __('auth-login.password') }}</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50"
                                            href="{{ route('password.request') }}">{{ __('auth-login.forgot_password') }}</a>
                                    </p>

                                    <button class="btn btn-outline-light btn-lg px-5"
                                        type="submit">{{ __('auth-login.login_button') }}</button>
                                </form>

                            </div>

                            <div>
                                <p class="mb-0">{{ __('auth-login.no_account') }} <a href="#!"
                                        class="text-white-50 fw-bold">{{ __('auth-login.sign_up') }}</a></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
