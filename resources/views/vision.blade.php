@extends('layouts.frontend')
@section('title')
Vision | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- About Start -->
<div class="container-fluid about bg-light section-padding">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-img pb-5 ps-5">
                    <img src="{{asset('upload/web_content/'.$vision_text->media)}}" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                </div>
            </div>
            <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                <div class="section-title text-start mb-5">
                    <h1 class="display-3 mb-4">{{$vision_text->title}}</h1>
                    <span class="mt-3">{!! $vision_text->description !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection
