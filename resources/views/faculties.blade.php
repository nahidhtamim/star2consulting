@extends('layouts.frontend')
@section('title')
Faculties | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- Services Start -->
<div class="container-fluid service bg-light section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h1 class="display-3 mb-4">Star<sup>2</sup> Faculties</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($faculties as $faculty)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded">
                    <div class="service-img rounded">
                        <img src="{{asset('upload/faculty/'.$faculty->img)}}" class="img-fluid rounded-top w-100" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services End -->

@endsection
