@extends('layouts.admin')
@section('title')
Faculties | My Alternance
@endsection
@section('admin_content')


<!-- Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-20 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="d-flex align-items-center justify-content-between my-4">
            <h3 class="mb-0">Faculties </h6>
            <a href="" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#facultyModal">Add New</a>
        </div>
    </div>
</div>
<!-- End -->

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <div class="col-12 p-2">
                <div class="row">
                    @foreach($faculties as $faculty)
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('upload/faculty/'.$faculty->img)}}" alt="" width="100%" class="card-img">
                            </div>
                            <div class="card-footer">
                                <div class="btn-group">
                                    <a href="{{ route('delete.faculty', ['id' => $faculty->id] )}}" class="btn btn-danger btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete faculty">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Add Modal -->

<div class="modal fade" id="facultyModal" tabindex="-1" aria-labelledby="facultyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="facultyModalLabel">Add Item</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save.faculty')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="img"> <b>Image</b> <sup>[Size: To maintain the design, please use image of same
                                        size
                                        ]</sup></label>
                                <input type="file" name="img" class="form-control @error('img') is-invalid @enderror" accept=".jpg, .jpeg, .png, .gif">
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