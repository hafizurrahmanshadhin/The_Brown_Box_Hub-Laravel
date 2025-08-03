@extends('frontend.user_dashboard')

@section('title', 'Package')

@section('content')
    <section class="custom-content">
        <div class="pricing-cards">
            @if ($subscription)
                <div class="pricing-card">
                    <h3 class="plan-title">{{ $subscription->name ?? 'No Subscription' }}</h3>
                    <p class="plan-description">{!! $subscription->description ?? 'No description available.' !!}</p>
                    <p class="plan-price"><span class="price">${{ $subscription->price ?? '0.00' }}</span>
                        /{{ $subscription->deadline ?? 'N/A' }}</p>
                    <h4 class="included-title">What's included</h4>
                    <ul class="included-list">
                        @foreach ($subscription->features as $feature)
                            <li>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27"
                                        fill="none">
                                        <path
                                            d="M13 26.9558C20.1799 26.9558 26 21.1357 26 13.9558C26 6.77591 20.1799 0.955811 13 0.955811C5.8201 0.955811 0 6.77591 0 13.9558C0 21.1357 5.8201 26.9558 13 26.9558Z"
                                            fill="#775138" />
                                        <path d="M7.11682 14.7961L10.4786 18.158L18.8832 9.75342" stroke="white"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                {{ $feature->feature_name ?? '' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p>No subscription found. Please subscribe to a plan to access your package details.</p>
            @endif
        </div>
    </section>

@endsection
