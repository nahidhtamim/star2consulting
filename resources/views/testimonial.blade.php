@extends('layouts.frontend')
@section('title')
Testimonials | Star 2 Consulting Inc.
@endsection
@section('content')

<!-- Testimonial Start -->
<div class="container-fluid testimonial section-padding wow zoomInDown" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title mb-5">
            <div class="sub-style">
                <h4 class="sub-title text-white px-3 mb-0">Testimonial</h4>
            </div>
            <h1 class="display-3 mb-4">What Our Clients Say</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="{{asset('upload/review/'.$testimonial->img)}}" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="text-white fs-7">{!! $testimonial->description !!}</p>
                    <div class="text-center">
                        <h5 class="mb-2">{{$testimonial->name}}</h5>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                            <i class="fas fa-star text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Testimonial End -->


@endsection
