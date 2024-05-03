@extends('layouts.frontend')
@section('title')
Giveaways | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- Services Start -->
<div class="container-fluid service bg-light section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h1 class="display-3 mb-4">Star<sup>2</sup> Corporate Giveaways</h1>
            <p>Star<sup>2</sup> Consulting designs and provides specialized corporate giveaways at a competitive pricing. High quality with modern look and feel of all kinds of corporate giveaways is our USP. We are your one-stop solution to provide you innovatively designed and useful giveaways that are practical in todays’ work environment.  </p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($giveaways as $giveaway)
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded">
                    <div class="service-img rounded">
                        <img src="{{asset('upload/giveaway/'.$giveaway->img)}}" class="img-fluid rounded-top w-100" alt="">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services End -->

@endsection
