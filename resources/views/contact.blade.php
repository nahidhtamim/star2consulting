@extends('layouts.frontend')
@section('title')
Contact | Star 2 Consulting Inc.
@endsection
@section('content')

<!-- Contact Start -->
<div class="container-fluid contact section-padding">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style mb-4">
                <h4 class="sub-title text-white px-3 mb-0">Contact Us</h4>
            </div>
            <p class="mb-0 text-black-50">What are you waiting for, let's get in touch.</p>
        </div>
        <div class="row g-4 align-items-center">
            <div class="col-lg-5 col-xl-5 contact-form wow fadeInLeft" data-wow-delay="0.1s">
                <h2 class="display-5 text-white mb-2">Get in Touch</h2>
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
            <div class="col-lg-2 col-xl-2 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-transparent rounded">
                    <div class="d-flex flex-column align-items-center text-center mb-4">
                        <div class="bg-white d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="fa fa-map-marker-alt fa-2x text-primary"></i></div>
                        <h4 class="text-dark">Addresses</h4>
                        <p class="mb-0 text-white">{!!$location_text->description !!}</p>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center mb-4">
                        <div class="bg-white d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="fa fa-phone-alt fa-2x text-primary"></i></div>
                        <h4 class="text-dark">Mobile</h4>
                        <p class="mb-0 text-white">{!!$phone_text->description !!}</p>
                    </div>
                    
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="bg-white d-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; border-radius: 50px;"><i class="fa fa-envelope-open fa-2x text-primary"></i></div>
                        <h4 class="text-dark">Email</h4>
                        <p class="mb-0 text-white">{!!$email_text->description !!}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-xl-5 wow fadeInRight" data-wow-delay="0.3s">
                <div class="d-flex justify-content-center mb-4">
                    <a class="btn btn-lg-square btn-light rounded-circle mx-2" href="{!!$twitter_text->description !!}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg-square btn-light rounded-circle mx-2" href="{!!$linkedin_text->description !!}"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="rounded h-100">
                    <span>{!!$location_iframe->description!!}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->



@endsection
