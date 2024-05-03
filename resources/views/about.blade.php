@extends('layouts.frontend')
@section('title')
About | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- About Start -->
<div class="container-fluid about bg-light section-padding">
    <div class="container py-3">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.2s" sty>
                <h4 class="sub-title pe-3 mb-2">{{$about_text->title}}</h4>
                
                    <p class="text-justify">{!! $about_page_text->description !!}</p>
                    
            </div>
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-img pb-5 ps-5">
                    <img src="{{asset('upload/web_content/'.$about_text->media)}}" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                    <div class="about-img-inner">
                        <img src="{{asset('upload/web_content/'.$about_text->media_two)}}" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                    </div>
                    <!-- <div class="about-experience">15 years experience</div> -->
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="section-title text-start mb-5">
                    <span class="mt-3">{!! $about_text->description !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection
