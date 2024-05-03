<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center" style="height: 45px;">
        <div class="col-lg-8 text-center text-lg-start mb-lg-0">
            <div class="d-flex flex-wrap">
                <a href="tel:{{$phone_text->description}}" class="text-light me-4"><i class="fas fa-phone-alt text-primary me-2"></i>{{$phone_text->description}}</a>
                <a href="mailto:{{$email_text->description}}" class="text-light me-0"><i class="fas fa-envelope text-primary me-2"></i>{{$email_text->description}}</a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-flex align-items-center justify-content-end">
                <a href="{{$twitter_text->description}}" class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-twitter"></i></a>
                <a href="{{$linkedin_text->description}}" class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
