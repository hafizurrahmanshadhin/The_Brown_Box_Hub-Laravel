@extends('frontend.user_dashboard')

@section('title', 'Security')

@section('content')
    <section class="custom-content">
        <form class="form-container payment-info-form-wrapper" method="POST" action="{{ route('update.user-Password') }}">
            @csrf
            @method('PUT')
            <div class="form-section-wrapper">
                <div class="form-group">
                    <label for="old_password">Current Password</label>
                    <input type="password" class="@error('old_password') is-invalid @enderror" name="old_password"
                        id="old_password" placeholder="***********">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="@error('password') is-invalid @enderror" name="password" id="password"
                        onpaste="return false" placeholder="***********">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Repeat New Password</label>
                    <input type="password" class="@error('password_confirmation') is-invalid @enderror"
                        onpaste="return false" name="password_confirmation" id="password_confirmation"
                        placeholder="***********">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-common btn--primary">
                        Change Password
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
