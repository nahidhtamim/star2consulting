@extends('layouts.frontend')
@section('title')
Corporate Social Responsiblity (CSR) | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- Services Start -->
<div class="container-fluid service bg-light section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <!-- <h4 class="sub-title pe-3 mb-0">About Us</h4> -->
            <h1 class="display-3 mb-4">{{$csr_text->title}}</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-8 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-details rounded">
                    <div class="service-img rounded-top">
                        <img src="{{asset('upload/web_content/'.$csr_text->media)}}" class="img-fluid rounded-top w-100" alt="">
                    </div>
                    <div class="service-content rounded-bottom bg-light p-4">
                        <div class="service-content-inner">
                            <span class="mt-3">{!! $csr_text->description !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

@endsection
