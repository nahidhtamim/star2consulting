@extends('layouts.frontend')
@section('title')
Solutions | Star 2 Consulting Inc.
@endsection
@section('content')


<!-- Services Start -->
<div class="container-fluid service bg-light section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <!-- <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Solutions</h4>
            </div> -->
            <h1 class="display-3 mb-4">{!!$solution_first_text->description!!}</h1>
            <p class="mb-0">{!!$solution_second_text->description!!}</p>
        </div>
        <div class="row g-4">
            <div class="solutions-carousel owl-carousel">

                @foreach($products as $product)
                <div class="service-item rounded" style="box-shadow: unset;">
                    <div class="service-img rounded-top">
                        <img src="{{asset('upload/product/'.$product->image)}}" class="img-fluid rounded-top w-100" alt="">
                    </div>
                    <div class="service-content rounded-bottom bg-secondary p-4">
                        <div class="service-content-inner">
                            <h5 class="mb-4">{{$product->name}}</h5>
                            <p class="mb-4">{!! substr($product->description, 0, 120)."......" !!}</p>
                            <a href="{{ route('solution.details', ['slug' => $product->slug] )}}" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Services End -->


@endsection
