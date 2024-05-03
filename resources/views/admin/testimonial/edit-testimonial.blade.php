@extends('layouts.admin')
@section('title')
Edit Testimonial | Star 2 Consulting Inc.
@endsection
@section('admin_content')


<!-- blog Heading -->
<div class="text-center">
    <h1 class="h3 mb-0 text-gray-800 text-center" >Edit testimonial</h1>
</div>
<hr>

<!-- Content Row -->
<div class="row">
    <div class="col-10 m-auto">
        <!-- DataTales Example -->
        <div class="card bg-light shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Testimonial Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update.testimonial', ['id' => $testimonial->id] )}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name"> <b>Name<span class="text-danger">*</span></b> </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$testimonial->name}}" required>
                        <span class="text-danger">
                            @error('name')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="designation_company"> <b>Designation, Company</b> </label>
                            <input type="text" name="designation_company" class="form-control" value="{{$testimonial->designation_company}}">
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description" class="form-label"><b>Description<span class="text-danger">*</span></b></label>
                            <textarea name="description" class="form-control description @error('description') is-invalid @enderror" id="description" cols="30" rows="5" placeholder="Write a description" required>{{$testimonial->description}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span> 
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="img"> <b>Image</b> <sup>[Size: To maintain the design, please use image of same
                                size
                                ]</sup></label>
                        <input type="file" name="img" class="form-control" accept="">
                        <br>
                        @php
                            $extension = pathinfo($testimonial->img, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, ['mp4', 'mkv']))
                            <video controls height="150px" width="150px">
                                <source src="{{asset('upload/review/'.$testimonial->img)}}" type="">
                            </video>
                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{asset('upload/review/'.$testimonial->img)}}" alt="" height="150px" width="150px">
                        @else
                            <p>Unsupported media type</p>
                        @endif
                        
                    </div>
                    <br>
                    <div class="form-group text-right">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
