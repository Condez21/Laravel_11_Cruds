@extends('layouts.app')

@section('content')
<style>
    @keyframes fadeOut {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
    
    .page-transition {
        animation: fadeOut 0.5s ease-in-out forwards;
    }
</style>

<div class="container-fluid py-5" style="background-color: #000000; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4 border-0">
                    <h4 class="mb-0">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </h4>
                    <p class="text-light mb-0 small mt-2">{{ __('Welcome back!') }}</p>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block mt-2">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Enter your password') }}">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block mt-2">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none small">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg" onclick="transitionOnLogin(event)">
                                <i class="fas fa-sign-in-alt me-2"></i>{{ __('Login') }}
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="text-muted small mb-0">
                                {{ __("Don't have an account?") }}
                                <a href="{{ route('register') }}" class="text-decoration-none fw-bold" onclick="transitionToRegister(event)">
                                    {{ __('Register here') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function transitionToRegister(event) {
        event.preventDefault();
        const registerUrl = event.target.href;
        
        document.documentElement.classList.add('page-transition');
        
        setTimeout(() => {
            window.location.href = registerUrl;
        }, 500);
    }
    
    function transitionOnLogin(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        
        document.documentElement.classList.add('page-transition');
        
        setTimeout(() => {
            form.submit();
        }, 500);
    }
</script>
@endsection 