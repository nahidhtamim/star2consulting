@extends('layouts.admin')
@section('title')
Testimonials | Star 2 Consulting Inc.
@endsection
@section('admin_content')


<!-- Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-20 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="d-flex align-items-center justify-content-between my-4">
            <h3 class="mb-0">Testimonials </h6>
            <a href="" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#testimonialModal">Add New</a>
        </div>
    </div>
</div>
<!-- End -->

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table text-start table-stripped table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designation, Company</th>
                            <th scope="col">Description</th>
                            <th scope="col">Media</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$testimonial->name}}</td>
                            <td>{{$testimonial->designation_company}}</td>
                            <td>{!! substr($testimonial->description, 0, 120)."......" !!}</td>
                            <td>
                                
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

                            </td>
                            <td>
                                @if ($testimonial->status == 0)
                                <b class="text-danger">Inactive</b>
                                <a href="{{ route('active.testimonial', ['id' => $testimonial->id] )}}" class="btn btn-success btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Active">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                                @else
                                <b class="text-success">Active</b>
                                <a href="{{ route('deactive.testimonial', ['id' => $testimonial->id] )}}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Inactive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('edit.testimonial', ['id' => $testimonial->id] )}}" class="btn btn-warning"><i
                                            class="fa fa-pen"></i> </a>
                                    <a href="{{ route('delete.testimonial', ['id' => $testimonial->id] )}}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete?')"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Add Modal -->

<div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="testimonialModalLabel">Add Item</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save.testimonial')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="name"> <b>Name<span class="text-danger">*</span></b> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                                <span class="text-danger">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="designation_company"> <b>Designation, Company</b> </label>
                                <input type="text" name="designation_company" class="form-control" placeholder="Enter Designation, Company">
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="description" class="form-label"><b>Description<span class="text-danger">*</span></b></label>
                                <textarea name="description" class="form-control description @error('description') is-invalid @enderror" id="description" cols="30" rows="5" placeholder="Write a description" required></textarea>
                                <span class="text-danger">
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span> 
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="img"> <b>Image</b> <sup>[Size: To maintain the design, please use image of same
                                        size
                                        ]</sup></label>
                                <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" accept=".jpg, .jpeg, .png, .gif">
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="status" class="form-label"><b>Status</b> <br></label>
                                <input type="checkbox" name="status" class="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection