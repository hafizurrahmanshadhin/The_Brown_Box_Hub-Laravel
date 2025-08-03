@extends('auth.app')

@section('title', 'Reset Password')

@section('content')
    <div class="signup-container">
        {{-- Left Image Section --}}
        <div class="image-section">
            <img src="{{ asset('frontend/images/auth-bg.png') }}" alt="Reset Password" />
        </div>

        {{-- Right Form Section --}}
        <div class="auth-form-wrapper">
            <h2>Reset Your Password</h2>
            <p class="text-gray">
                Enter your email and new password below to reset your password.
            </p>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                {{-- Password Reset Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email Address --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        value="{{ old('email', $request->email) }}" required autofocus />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your new password" required />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your new password" required />
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-common btn--primary w-100">
                    Reset Password
                </button>
            </form>

            <p class="already-account mt-4">
                Remembered your password? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
@endsection
