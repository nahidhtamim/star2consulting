@extends('layouts.frontend')
@section('title')
Powerskills | Star 2 Consulting Inc.
@endsection

@section('content')

<!-- Feature Start -->
<div class="container-fluid feature bg-light section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-3 mb-4">Leadership skills</h1>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($leader_skills as $leader)
            <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp mx-auto" data-wow-delay="0.1s">
                <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                        <div class="feature-icon mb-4">
                            <div class="p-3 d-inline-flex bg-white rounded">
                                <i class="{{$leader->icon}} fa-4x text-primary"></i>
                            </div>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-4">{{$leader->title}}</h5>
                            <p class="mb-0">{!!$leader->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
         <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-3 my-4">Powerskills</h1>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach($power_skills as $power)
            <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp mx-auto" data-wow-delay="0.1s">
                <div class="row-cols-1 feature-item p-4">
                    <div class="col-12">
                        <div class="feature-icon mb-4">
                            <div class="p-3 d-inline-flex bg-white rounded">
                                <i class="{{$power->icon}} fa-4x text-primary"></i>
                            </div>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-4">{{$power->title}}</h5>
                            <p class="mb-0">{!!$power->description!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</div>
<!-- Feature End -->

@endsection
