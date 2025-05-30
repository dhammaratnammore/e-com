@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-card {
        background: #ffffff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
        width: 100%;
        max-width: 420px;
        text-align: center;
    }

    .login-card h2 {
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
        font-size: 1.8rem;
    }

    .login-card p {
        font-size: 14px;
        color: #666;
        margin-bottom: 30px;
    }

    .form-group {
        text-align: left;
        margin-bottom: 20px;
    }

    label {
        font-size: 13px;
        color: #555;
        margin-bottom: 6px;
        display: block;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px 16px;
        border: none;
        border-radius: 12px;
        background: #f0f0f0;
        box-shadow: inset 6px 6px 12px #d1d1d1, inset -6px -6px 12px #ffffff;
        font-size: 14px;
        color: #333;
        transition: box-shadow 0.3s;
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 0 2px #80bdff;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        background: #007bff;
        color: white;
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
        transition: background 0.3s ease;
    }

    .btn-submit:hover {
        background: #0056b3;
    }

    .forgot-pass,
    .register-link {
        font-size: 13px;
        color: #666;
        margin-top: 15px;
    }

    .forgot-pass a,
    .register-link a {
        color: #007bff;
        text-decoration: none;
    }

    .invalid-feedback {
        font-size: 13px;
        color: #d9534f;
        margin-top: 6px;
        display: block;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">
        <h2>{{ __('Login') }}</h2>
        <p>{{ __('Access your account securely') }}</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="@error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="@error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                {{ __('Sign In') }}
            </button>

            @if (Route::has('password.request'))
                <div class="forgot-pass">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </div>
            @endif

            @if (Route::has('register'))
                <div class="register-link">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
