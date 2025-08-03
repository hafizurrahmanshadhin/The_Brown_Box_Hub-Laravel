@extends('frontend.app')

@section('title', 'Privacy Policy')

@section('content')
    <section class="work-process">
        <div class="my-container">
            <h1>{{ $privacyPolicy->title ?? 'Privacy Policy' }}</h1>
            <div class="content">
                {!! $privacyPolicy->content ?? '<p>No Privacy Policy Available.</p>' !!}
            </div>
        </div>
    </section>
@endsection
