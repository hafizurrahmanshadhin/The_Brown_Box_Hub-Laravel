@extends('frontend.app')

@section('title', 'Pricing')

@section('content')
    <section class="pricing" id="pricing">
        <div class="my-container">
            <div class="section-header">
                <h4>pricing</h4>
                <h2 class="section-title">Our pricing plans</h2>
            </div>

            <div class="pricing-cards">
                @foreach ($subscriptions as $subscription)
                    <div class="pricing-card">
                        <h3 class="plan-title">{{ $subscription->name ?? '' }}</h3>
                        <p class="plan-description">{!! $subscription->description ?? '' !!}</p>
                        <p class="plan-price"><span class="price">${{ $subscription->price ?? '' }}</span>
                            /{{ $subscription->deadline ?? '' }}</p>
                        <h4 class="included-title">What's included</h4>
                        <ul class="included-list">
                            @foreach ($subscription->features as $feature)
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27"
                                            viewBox="0 0 26 27" fill="none">
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
                        <a href="{{ route('subscription-details', $subscription->id) }}" class="btn-common">See Plan</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="my-container">
            <div class="testimonial-header">
                <h2 data-aos="fade-down">WHAT OUR CLIENTS SAY</h2>
                <p data-aos="fade-left">
                    {!! $systemSettings->description ?? '' !!}
                </p>
            </div>

            <div class="testimonial-cards-wrapper owl-carousel owl-theme">
                @foreach ($clientsFeedback as $feedback)
                    <div class="testimonial-card">
                        <div class="ratings">
                            @for ($i = 0; $i < $feedback->rating; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20"
                                    fill="none">
                                    <g clip-path="url(#clip0_253_67290)">
                                        <path
                                            d="M20.0659 9.10291C20.2584 8.91667 20.3945 8.67999 20.4587 8.41998C20.5228 8.15997 20.5125 7.88714 20.4288 7.63275C20.347 7.37762 20.1949 7.1507 19.9901 6.97802C19.7852 6.80533 19.5359 6.69386 19.2706 6.65638L14.428 5.95273C14.3264 5.93797 14.2299 5.89873 14.1469 5.83838C14.0639 5.77803 13.9968 5.69838 13.9514 5.60632L11.7864 1.21865C11.6687 0.978029 11.4857 0.775423 11.2581 0.634047C11.0306 0.492671 10.7679 0.418243 10.5001 0.419292C10.2323 0.418318 9.96963 0.492781 9.7422 0.634154C9.51477 0.775526 9.33176 0.978091 9.21412 1.21865L7.04872 5.60672C6.95661 5.79374 6.77799 5.9231 6.57174 5.95313L1.72913 6.65678C1.46384 6.69426 1.21448 6.80573 1.00964 6.97842C0.804791 7.15111 0.65275 7.37802 0.570943 7.63315C0.487235 7.88754 0.476873 8.16037 0.541044 8.42038C0.605214 8.6804 0.741323 8.91708 0.933778 9.10331L4.43758 12.5186C4.58696 12.6644 4.65544 12.8742 4.6202 13.0793L3.79361 17.9019C3.75621 18.1068 3.76488 18.3175 3.81898 18.5186C3.87307 18.7198 3.97125 18.9064 4.10639 19.0649C4.5333 19.5723 5.27859 19.7269 5.87451 19.4137L10.2053 17.1366C10.2966 17.09 10.3976 17.0657 10.5001 17.0657C10.6025 17.0657 10.7035 17.09 10.7948 17.1366L15.126 19.4137C15.3314 19.5232 15.5605 19.5806 15.7932 19.5807C16.2165 19.5807 16.6178 19.3925 16.8937 19.0649C17.0289 18.9064 17.1271 18.7198 17.1812 18.5186C17.2353 18.3175 17.2439 18.1068 17.2065 17.9019L16.3795 13.0793C16.3622 12.978 16.3698 12.8741 16.4016 12.7764C16.4334 12.6787 16.4885 12.5903 16.5621 12.5186L20.0659 9.10291Z"
                                            fill="#FBBC05" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_253_67290">
                                            <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            @endfor
                        </div>

                        <p class="testimonial-desc">
                            {!! $feedback->description ?? '' !!}
                        </p>

                        <div class="author">
                            <h5>{{ $feedback->name ?? '' }}</h5>
                            <p>{{ $feedback->title ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="faq-common">
        <div class="my-container">
            <div class="faq-content-wrapper">
                <div class="faq-left" data-aos="fade-down">
                    <h2>Still have Questions? We have answers!</h2>
                    <p>
                        {!! $systemSettings->description ?? '' !!}
                    </p>
                </div>

                <div class="faq-right" data-aos="fade-up">
                    <div class="faq-wrapper">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                            {{ $faq->question ?? '' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $faq->answer ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
