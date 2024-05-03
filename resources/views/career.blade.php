@extends('layouts.frontend')
@section('title')
Career | Star 2 Consulting Inc.
@endsection
@section('content')

<style>
    .modal-backdrop{
        position: relative !important;
    } 
</style>

<!-- Feature Start -->
<div class="container-fluid feature  bg-light section-padding">
    <div class="container pt-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Join Us</h4>
            </div>
            <h1 class="display-3 mb-4">Careers</h1>
            <p>Star<sup>2</sup> Consulting invites you to explore our job openings and let us know if you are fit for the role. Our workforce is comprised of vibrant and diverse set of people where every skill is celebrated. Connect with us if you think you are right for the job. Send us your resume at <a href="mailto:hr@star2c.com">hr@star2c.com</a></p>
        </div>

    </div>
</div>
<!-- Feature End -->

@if(count($jobs) > 0)
<!-- Services Start -->
<div class="container-fluid service bg-light">
    <div class="container pb-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <!-- <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">Solutions</h4>
            </div> -->
            <h1 class="display-3 mb-4">Available Posts</h1>
        </div>
        <div class="row g-4">
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @elseif(session('warning'))
            <div class="alert alert-danger" role="alert">
                {{ session('warning') }}
            </div>
            @endif
                @foreach($jobs as $job)
                <div class="col-lg-4 mx-auto">
                    @php
                        
                        $createdAt = \Carbon\Carbon::parse($job->created_at);
                        $now = \Carbon\Carbon::now();

                        // Calculate the difference
                        $diff = $createdAt->diff($now);

                        // Access individual components of the difference
                        $days = $diff->days;
                        $hours = $diff->h;
                        $minutes = $diff->i;
                        $seconds = $diff->s;
                    @endphp
                <div class="service-item rounded" style="box-shadow: unset;">
                    <div class="service-content rounded bg-secondary p-4">
                        <div class="service-content-inner">
                            <h3 class="mb-4">{{$job->name}} 
                                
                            </h3>
                            
                            <small >
                                {{-- Display the difference --}}
                                @if ($diff->days > 0)
                                <p>Posted: {{ $days }} days ago</p>
                                @elseif ($diff->h > 0)
                                <p>Posted: {{ $hours }} hours ago</p>
                                @elseif ($diff->i > 0)
                                <p>Posted: {{ $minutes }} minutes ago</p>
                                @else
                                <p>Posted: {{ $seconds }} seconds ago</p>
                                @endif
                           </small>
                            
                            <p class="mb-4">{!! substr($job->description, 0, 400)."......" !!}</p>
                            
                            <br>
                            <button class="btn btn-primary rounded-pill px-3 text-white" data-bs-toggle="modal" data-bs-target="#jobModal{{$job->id}}"><i class="fa fa-eye"></i> Read More</button> 
                            <!-- Modal -->
                            <div class="modal fade" id="jobModal{{$job->id}}" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title text-primary" id="jobModalLabel">{{$job->title}}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="job-decription">
                                            <p>Details: </p>
                                            <p class="" style="color: #212121 !important;">{!!$job->description!!}</p>
                                        </div>
                                            <div class="application_section" id="applicationSection">
                                                <hr>
                                                <h3>Application Form</h3>
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
                                                <form action="{{url('/submit-application')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="">Name</label>
                                                        <input type="text" class="form-control" placeholder="Your Name" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Email</label>
                                                        <input type="email" class="form-control" placeholder="Your Email" required>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Cover Letter</label>
                                                        <textarea name="cover_letter" class="form-control" id="" placeholder="Write Cover Letter"></textarea>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Resume</label>
                                                        <input type="file" name="resume" class="form-control" id="">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        {!! NoCaptcha::renderJs() !!}
                                                        {!! NoCaptcha::display() !!}
                                                        <span class="text-danger">
                                                            @error('g-recaptcha-response')
                                                                <p class="alert alert-danger">{{$message}}</p> 
                                                            @enderror
                                                        </span>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <div class="btn-group w-100">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary text-light">Send Resume</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services End -->
@endif

@endsection
