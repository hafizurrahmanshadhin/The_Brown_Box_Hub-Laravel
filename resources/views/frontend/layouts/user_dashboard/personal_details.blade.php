@extends('frontend.user_dashboard')

@section('title', 'Edit Personal Details')

@section('content')
    <section class="custom-content">
        <form class="form-container" method="POST" action="{{ route('update.user-profile') }}">
            @csrf
            @method('PATCH')
            <div class="form-section-wrapper">
                <div class="form-group-wrapper">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="@error('firstName') is-invalid @enderror" id="firstName" name="firstName"
                            placeholder="Enter Your First Name" value="{{ old('firstName', Auth::user()->firstName) }}">
                        @error('firstName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="@error('lastName') is-invalid @enderror" id="lastName" name="lastName"
                            placeholder="Enter Your Last Name" value="{{ old('lastName', Auth::user()->lastName) }}">
                        @error('lastName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group-wrapper">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="@error('email') is-invalid @enderror" id="email" name="email"
                            placeholder="Enter Your Email" value="{{ old('email', Auth::user()->email) }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Phone</label>
                        <input type="text" class="@error('phone_number') is-invalid @enderror" id="phone_number"
                            name="phone_number" placeholder="Enter Your Phone Number"
                            value="{{ old('phone_number', Auth::user()->phone_number) }}">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group-wrapper">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="@error('address') is-invalid @enderror" id="address" name="address"
                            placeholder="Enter Your Address" value="{{ old('address', Auth::user()->address) }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-custom-group-wrapper">
                        <div class="form-group">
                            <label for="unit_or_apartment">Unit or Apartment</label>
                            <select class="form-select @error('unit_or_apartment') is-invalid @enderror"
                                id="unit_or_apartment" name="unit_or_apartment">
                                <option value="apartment"
                                    {{ old('unit_or_apartment', Auth::user()->unit_or_apartment) == 'apartment' ? 'selected' : '' }}>
                                    Apartment</option>
                                <option value="unit"
                                    {{ old('unit_or_apartment', Auth::user()->unit_or_apartment) == 'unit' ? 'selected' : '' }}>
                                    Unit</option>
                            </select>
                            @error('unit_or_apartment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="zip_code">Zip Code</label>
                            <input type="number" class="@error('zip_code') is-invalid @enderror" id="zip_code"
                                name="zip_code" placeholder="Enter Your zip_code"
                                value="{{ old('zip_code', Auth::user()->zip_code) }}">
                            @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-common btn--primary">
                        Save Change
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
