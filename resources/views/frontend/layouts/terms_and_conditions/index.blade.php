@extends('frontend.app')

@section('title', 'Terms and Conditions')

@section('content')
    <section class="work-process">
        <div class="my-container">
            <h1>{{ $terms_and_conditions->title ?? 'Terms and Conditions' }}</h1>
            <div class="content">
                {!! $terms_and_conditions->content ?? '<p>No terms and conditions available.</p>' !!}
            </div>
        </div>
    </section>
@endsection
