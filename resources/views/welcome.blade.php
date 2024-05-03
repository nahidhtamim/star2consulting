@extends('layouts.frontend')
@section('title')
Home | Star 2 Consulting Inc.
@endsection
@section('banner')
<!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    @foreach($sliders as $slider)
    <div class="header-carousel-item">
        <img src="{{asset('upload/slider/'.$slider->image)}}" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="carousel-caption-content p-3">
                <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">{{$slider->key_point}}</h5>
                <h1 class="display-1 text-capitalize text-white mb-4">{{$slider->title}}</h1>
                <p class="mb-5 fs-5">{!!$slider->description!!}</p>
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="{{route('contact')}}">Plan a Meeting</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- Carousel End -->
@endsection

@section('content')

<!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <!-- <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Solutions</h4>
            </div> -->
            <h1 class="display-3 mb-4">{!!$solution_first_text->description!!}</h1>
            <p class="mb-0">{!!$solution_second_text->description!!}</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded">
                    <div class="service-img rounded-top">
                        <img src="{{asset('upload/product/'.$product->image)}}" class="img-fluid rounded-top w-100" alt="">
                    </div>
                    <div class="service-content rounded-bottom bg-light p-4">
                        <div class="service-content-inner">
                            <h5 class="mb-4">{{$product->name}}</h5>
                            <p class="mb-4">{!! substr($product->description, 0, 120)."......" !!}</p>
                            <a href="{{ route('solution.details', ['slug' => $product->slug] )}}" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="{{ route('solutions')}}">More Services</a>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->


<!-- Feature Start -->
<div class="container-fluid feature py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Why Choose Us</h4>
            </div>
            <h1 class="display-3 my-4">Leadership skills</h1>
            
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

<!-- About Start -->
<div class="container-fluid about bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-img pb-5 ps-5">
                    <img src="{{asset('upload/web_content/'.$about_text->media)}}" class="img-fluid rounded w-100" style="object-fit: cover;" alt="Image">
                    <div class="about-img-inner">
                        <img src="{{asset('upload/web_content/'.$about_text->media_two)}}" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                    </div>
                    <!-- <div class="about-experience">15 years experience</div> -->
                </div>
            </div>
            <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                <div class="section-title text-start mb-5">
                    <h4 class="sub-title pe-3 mb-0">{{$about_text->title}}</h4>
                    <span class="mt-3">{!! substr($about_text->description, 0, 355)."......" !!}</span>
                    <br>
                    <a href="{{ route('about')}}" class="btn btn-primary rounded-pill text-white mt-3 py-3 px-5">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



<!-- Book Appointment Start -->
<div class="container-fluid appointment py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2">
                <div class="section-title text-start">
                    <h4 class="sub-title pe-3 mb-0">{{$best_solutions->title}}</h4>
                    <h1 class="display-4 mb-4">{!!$best_solutions->description!!}</h1>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4">
                                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i> {!!$quality_point_one->description!!}</h5>
                                </div>
                                <div class="mb-4">
                                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i> {!!$quality_point_two->description!!}</h5>
                                </div>
                                <div class="mb-4">
                                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i> {!!$quality_point_three->description!!}</h5>
                                </div>
                                <div class="text-start mb-4">
                                    <a href="{{ route('about')}}" class="btn btn-primary rounded-pill text-white py-3 px-5">More Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="video h-100">
                                <img src="{{asset('upload/web_content/'.$best_solutions->media)}}" class="img-fluid rounded w-100 h-100" style="object-fit: cover;" alt="">
                                <button type="button" class="btn btn-play" data-bs-toggle="modal" data-bs-target="#videoModal">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="appointment-form rounded p-5">
                    <p class="fs-4 text-uppercase text-primary">Get In Touch</p>
                    <h1 class="display-5 mb-4">Plan a Meeting</h1>
                    @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif(session('warning'))
                <div class="alert alert-danger" role="alert">
                    {{ session('warning') }}
                </div>
                @endif

                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                <form action="{{route('contact.send')}}" class="mt-5" method="POST"> 
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control bg-transparent border border-white" name="name" placeholder="Your Name" style="height: 55px;" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-floating">
                                <input type="email" class="form-control bg-transparent border border-white" name="email" placeholder="Your Email" style="height: 55px;" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-transparent border border-white py-3" rows="2" name="content" placeholder="Message" style="height: 100px;" required></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="text-danger">
                                    @error('g-recaptcha-response')
                                        <p class="alert alert-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary text-light w-100 py-3" type="submit">Send</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Star<sup>2</sup> Consulting Inc.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    @php
                        $extension = pathinfo($best_solutions->media_two, PATHINFO_EXTENSION);
                    @endphp

                    @if(in_array($extension, ['mp4', 'mkv']))
                        <video controls height="" width="100%" class="">
                            <source src="{{asset('upload/web_content/'.$best_solutions->media_two)}}" type="">
                        </video>
                    @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{asset('upload/web_content/'.$best_solutions->media_two)}}" alt="" height="150px" width="220px">
                    @else
                        <p>We are working on a video portfolio. Stay Tuned</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Book Appointment End -->



<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5 wow zoomInDown" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title mb-5">
            <div class="sub-style">
                <h4 class="sub-title text-white px-3 mb-0">Testimonial</h4>
            </div>
            <h1 class="display-3 mb-4">What Our Clients Say</h1>
        </div>
        <div class="testimonial-carousel owl-carousel">
            @foreach($reviews as $review)
            <div class="testimonial-item">
                <div class="testimonial-inner p-5">
                    <div class="testimonial-inner-img mb-4">
                        <img src="{{asset('upload/review/'.$review->img)}}" class="img-fluid rounded-circle" alt="">
                    </div>
                    <p class="text-white fs-7">{!!$review->description!!}</p>
                    <div class="text-center">
                        <h5 class="mb-2">{{$review->name}}</h5>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-star text-dark"></i>
                            <i class="fas fa-star text-dark"></i>
                            <i class="fas fa-star text-dark"></i>
                            <i class="fas fa-star text-dark"></i>
                            <i class="fas fa-star text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Our Blog</h4>
            </div>
            <h1 class="display-3 mb-4">Research and Access to Blogs </h1>
            <!-- <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p> -->
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($blogs as $blog)
            @php
                $createdAt = \Carbon\Carbon::parse($blog->created_at);
                $now = \Carbon\Carbon::now();

                // Calculate the difference
                $diff = $createdAt->diff($now);

                // Access individual components of the difference
                $days = $diff->days;
                $hours = $diff->h;
                $minutes = $diff->i;
                $seconds = $diff->s;
            @endphp
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="blog-item rounded">
                    <div class="blog-img">
                        <img src="{{asset('upload/blog/'.$blog->media)}}" class="img-fluid w-100" alt="Image">
                    </div>
                    <div class="blog-centent p-4">
                        <div class="d-flex justify-content-between mb-4">
                            @if ($diff->days > 0)
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> Posted: {{ $days }} days ago</p>
                            @elseif ($diff->h > 0)
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> Posted: {{ $hours }} hours ago</p>
                            @elseif ($diff->i > 0)
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> Posted: {{ $minutes }} minutes ago</p>
                            @else
                            <p class="mb-0 text-muted"><i class="fa fa-calendar-alt text-primary"></i> Posted: {{ $seconds }} seconds ago</p>
                            @endif
                        </div>
                        <a href="#" class="h4">{{$blog->title}}</a>
                        <p class="my-4">{!! substr($blog->description, 0, 120)."......" !!}</p>
                        <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-1">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
