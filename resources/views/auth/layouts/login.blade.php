@extends('auth.app')

@section('title', 'Login')

@section('content')
    <div class="signup-container">
        {{-- Left Image Section --}}
        <div class="image-section">
            <img src="{{ asset('frontend/images/auth-bg.png') }}" alt="Signup" />
        </div>

        {{-- Right Form Section --}}
        <div class="auth-form-wrapper">
            <h2>Sign In Account!</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Please Enter Your Email"
                        value="{{ old('email') }}" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Please Enter Your Password"
                        value="{{ old('password') }}" />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-wrapper justify-content-between">
                    <div class="checkbox">
                        <input type="checkbox" id="terms" />
                        <label for="terms">Remember</label>
                    </div>

                    <a href="{{ route('password.request') }}" class="signup-options">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-common btn--primary w-100">
                    Sign In
                </button>
            </form>

            <p class="signup-options">Sign in with</p>
            <div class="social-icons">
                <a href="{{ route('facebook-login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                        fill="none">
                        <circle cx="16" cy="16" r="14" fill="url(#paint0_linear_73_16504)" />
                        <path
                            d="M21.2137 20.2816L21.8356 16.3301H17.9452V13.767C17.9452 12.6857 18.4877 11.6311 20.2302 11.6311H22V8.26699C22 8.26699 20.3945 8 18.8603 8C15.6548 8 13.5617 9.89294 13.5617 13.3184V16.3301H10V20.2816H13.5617V29.8345C14.2767 29.944 15.0082 30 15.7534 30C16.4986 30 17.2302 29.944 17.9452 29.8345V20.2816H21.2137Z"
                            fill="white" />
                        <defs>
                            <linearGradient id="paint0_linear_73_16504" x1="16" y1="2" x2="16"
                                y2="29.917" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#18ACFE" />
                                <stop offset="1" stop-color="#0163E0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </a>
                <a href="{{ route('google-login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                        fill="none">
                        <path
                            d="M30.0014 16.3109C30.0014 15.1598 29.9061 14.3198 29.6998 13.4487H16.2871V18.6442H24.1601C24.0014 19.9354 23.1442 21.8798 21.2394 23.1864L21.2127 23.3604L25.4536 26.58L25.7474 26.6087C28.4458 24.1665 30.0014 20.5731 30.0014 16.3109Z"
                            fill="#4285F4" />
                        <path
                            d="M16.2862 30C20.1433 30 23.3814 28.7555 25.7465 26.6089L21.2386 23.1865C20.0322 24.011 18.4132 24.5865 16.2862 24.5865C12.5085 24.5865 9.30219 22.1444 8.15923 18.7688L7.9917 18.7827L3.58202 22.1272L3.52435 22.2843C5.87353 26.8577 10.6989 30 16.2862 30Z"
                            fill="#34A853" />
                        <path
                            d="M8.16007 18.7689C7.85848 17.8978 7.68395 16.9644 7.68395 16C7.68395 15.0355 7.85849 14.1022 8.1442 13.2311L8.13621 13.0455L3.67126 9.64737L3.52518 9.71547C2.55696 11.6133 2.0014 13.7444 2.0014 16C2.0014 18.2555 2.55696 20.3866 3.52518 22.2844L8.16007 18.7689Z"
                            fill="#FBBC05" />
                        <path
                            d="M16.2863 7.4133C18.9688 7.4133 20.7783 8.54885 21.8101 9.4978L25.8418 5.64C23.3657 3.38445 20.1434 2 16.2863 2C10.699 2 5.87354 5.1422 3.52435 9.71549L8.14339 13.2311C9.30223 9.85555 12.5086 7.4133 16.2863 7.4133Z"
                            fill="#EB4335" />
                    </svg>
                </a>
            </div>

            <p class="already-account">
                Already have an account? <a href="{{ route('register') }}">Sign up</a>
            </p>
        </div>
    </div>
@endsection
