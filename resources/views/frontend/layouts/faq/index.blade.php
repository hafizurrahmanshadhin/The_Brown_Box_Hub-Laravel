@extends('frontend.app')

@section('title', 'FAQ')

@section('content')
    <section class="faq-section">
        <div class="my-container">
            <div class="faq-content">
                <div class="faq-content-header">
                    <h2 data-aos="fade-down">Frequently Asked Questions</h2>
                    <p data-aos="fade-left">
                        {!! $systemSettings->description ?? '' !!}
                    </p>
                </div>

                <div class="faq-wrapper" data-aos="fade-up">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
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
    </section>
@endsection
