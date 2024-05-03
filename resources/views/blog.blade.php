@extends('layouts.frontend')
@section('title')
Insights | Star 2 Consulting Inc.
@endsection
@section('content')


<!-- Blog Start -->
<div class="container-fluid blog bg-light section-padding">
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
                        @php
                            $extension = pathinfo($blog->media, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, ['mp4', 'mkv']))
                            <video controls class="img-fluid w-100" alt="Image">
                                <source src="{{asset('upload/blog/'.$blog->media)}}" type="">
                            </video>
                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{asset('upload/blog/'.$blog->media)}}" alt=""class="img-fluid w-100" alt="Image">
                        @else
                            <p>Unsupported media type</p>
                        @endif
                    </div>
                    <div class="blog-centent p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <p class="mb-0 text-muted">
                                <i class="fa fa-calendar-alt text-primary"></i>
                                @if ($diff->days > 0)
                                Posted: {{ $days }} days ago
                                @elseif ($diff->h > 0)
                                Posted: {{ $hours }} hours ago
                                @elseif ($diff->i > 0)
                                Posted: {{ $minutes }} minutes ago
                                @else
                                Posted: {{ $seconds }} seconds ago
                                @endif
                            </p>
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
