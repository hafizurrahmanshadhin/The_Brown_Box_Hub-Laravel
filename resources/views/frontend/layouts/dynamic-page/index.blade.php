@extends('frontend.app')

@section('title', $pageData ? $pageData->page_title : '')

@section('content')
    <section class="work-process">
        <div class="my-container">
            <h2>{{ $pageData ? $pageData->page_title : '' }}</h2>
            <p>{!! $pageData ? $pageData->page_content : '' !!}</p>
        </div>
    </section>
@endsection
