<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <img src="{{asset('frontend/img/logo-white.png')}}" alt="logo" width="80%">
                    <p>Star<sup>2</sup> Consulting strives to better you and your workforce by creating innovative and flexible leaders. 
                    </p>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-share fa-2x text-white me-2"></i>

                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href="{{$twitter_text->description}}"><i class="fab fa-twitter"></i></a>

                        <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href="{{$linkedin_text->description}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Quick Links</h4>
                    <a href="{{route('about')}}"><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="{{route('contact')}}"><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                    <a href="{{route('privacy')}}"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                    <a href="{{route('terms')}}"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                    <a href="{{route('blogs')}}"><i class="fas fa-angle-right me-2"></i> Our Blog & News</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Solutions</h4>
                    @foreach($products as $solution)
                    <a href="{{ route('solution.details', ['slug' => $solution->slug] )}}"><i class="fas fa-angle-right me-2"></i> {{ $solution->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Contact Info</h4>
                    <a href="#"><i class="fa fa-map-marker-alt me-2"></i> {!!$location_text->description!!}</a>
                    <a href="mailto:{{$email_text->description}}"><i class="fas fa-envelope me-2"></i> {{$email_text->description}}</a>
                    <a href="tel:{{$phone_text->description}}"><i class="fas fa-phone me-2"></i>{{$phone_text->description}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-12 text-center mb-md-0">
                <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Star<sup>2</sup> Consulting Inc.</a>, All right reserved.</span>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
