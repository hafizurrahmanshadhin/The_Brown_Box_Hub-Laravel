@extends('frontend.app')

@section('title', 'Pricing')

@section('content')
    <section class="basic-plan">
        <div class="my-container">
            <div class="plan-wrapper">
                <div class="plan-section" data-aos="fade-right">
                    <h2>{{ $subscription->name ?? '' }}</h2>
                    <div class="plan-details">
                        <p class="amount"><span>${{ $subscription->price ?? '' }}</span> /{{ $subscription->deadline ?? '' }}
                        </p>
                        <ul>
                            @foreach ($subscription->features as $feature)
                                <li>{{ $feature->feature_name ?? '' }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <form class="form-section" data-aos="fade-left" method="POST"
                    action="{{ auth()->check() ? route('subscription.checkout') : route('login') }}">
                    @csrf
                    <div class="form-container">
                        <h2>Let's Collect Your Key Details</h2>
                        <div class="form-section-wrapper">
                            <div class="form-group-wrapper">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone_number"
                                        value="{{ auth()->user()->phone_number ?? '' }}" placeholder="Phone" />
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ auth()->user()->address ?? '' }}"
                                        placeholder="Address" />
                                </div>
                            </div>
                            <div class="form-group-wrapper">
                                <div class="form-group">
                                    <label>Unit or Apartment</label>
                                    <select class="form-select" name="unit_or_apartment">
                                        <option value="Apartment"
                                            {{ auth()->check() && auth()->user()->unit_or_apartment == 'Apartment' ? 'selected' : '' }}>
                                            Apartment
                                        </option>
                                        <option value="Unit"
                                            {{ auth()->check() && auth()->user()->unit_or_apartment == 'Unit' ? 'selected' : '' }}>
                                            Unit
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" name="zip_code" value="{{ auth()->user()->zip_code ?? '' }}"
                                        placeholder="Zip Code" />
                                </div>
                            </div>
                            <div class="form-buttons">
                                @if (auth()->check())
                                    <button type="submit" class="btn-common btn--primary next-btn">Subscribe</button>
                                @else
                                    <a href="{{ route('login') }}" class="btn-common btn--primary next-btn">Login to
                                        Subscribe</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="subscription_name" value="{{ $subscription->name ?? '' }}">
                    <input type="hidden" name="subscription_price" value="{{ $subscription->price ?? '' }}">
                    <input type="hidden" name="subscription_id" value="{{ $subscription->id ?? '' }}">
                </form>



            </div>
        </div>
    </section>
@endsection
