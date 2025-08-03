@extends('auth.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="signup-container">
        {{-- Left Image Section --}}
        <div class="image-section">
            <img src="{{ asset('frontend/images/auth-bg.png') }}" alt="Forgot Password" />
        </div>

        {{-- Right Form Section --}}
        <div class="auth-form-wrapper">
            <h2>Forgot Your Password?</h2>
            <p class="text-gray">
                No problem. Just let us know your email address, and we will email you a password reset link to choose a new
                one.
            </p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Please Enter Your Email"
                        value="{{ old('email') }}" required autofocus />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-common btn--primary w-100">
                    Send Password Reset Link
                </button>
            </form>

            <p class="already-account mt-4">
                Remembered your password? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
@endsection
