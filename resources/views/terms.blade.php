@extends('layouts.frontend')
@section('title')
{{ $term_text->title}} | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- Services Start -->
<div class="container-fluid service bg-light section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <span>{!! $term_text->description!!}</span>
        </div>

    </div>
</div>
<!-- Services End -->



@endsection
