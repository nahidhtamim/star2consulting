@extends('layouts.admin')
@section('title')
Admin Dashboard | Star 2 Consulting Inc.
@endsection
@section('admin_content')
<div class="container-fluid pt-2">
    <div class="row my-5 py-5">
        <div class="col-md-12 my-5 py-5 text-center">
            <h1>Welcome To Star 2 Consulting Inc <br> Admin Dashboard</h1>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-12 mx-auto">
                    <div class="table-responsive">
                        {{-- <a href="" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#fontModal">+</a> --}}
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Places Used</th>
                                    <th scope="col">Font Size</th>
                                    <th scope="col">Font Size[Display: 1200px]</th>
                                    <th scope="col">Font Weight</th>
                                    <th scope="col">Line Height</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fonts as $font)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$font->name}}</td>
                                    <td>{{$font->used}}</td>
                                    <td>{{$font->font_size}}</td>
                                    <td>{{$font->min_width_font_size}}</td>
                                    <td>{{$font->font_weight}}</td>
                                    <td>{{$font->line_height}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('edit.font', ['id' => $font->id] )}}" class="btn btn-warning"><i
                                                    class="fa fa-pen"></i> </a></a>
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
    </div>
</div>

<div class="modal fade" id="fontModal" tabindex="-1" aria-labelledby="fontModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="fontModalLabel">Add Item</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save.font')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
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

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="used"> <b>Places Used<span class="text-danger">*</span></b> </label>
                                <input type="text" name="used" class="form-control @error('used') is-invalid @enderror" placeholder="Enter Places Used" required>
                                <span class="text-danger">
                                    @error('used')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="font_size"> <b>Font Size<span class="text-danger">*</span></b> </label>
                                <input type="text" name="font_size" class="form-control @error('font_size') is-invalid @enderror" placeholder="Enter Font Size" required>
                                <span class="text-danger">
                                    @error('font_size')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="min_width_font_size"> <b>Min Width: 1200px; Font Size<span class="text-danger">*</span></b> </label>
                                <input type="text" name="min_width_font_size" class="form-control @error('min_width_font_size') is-invalid @enderror" placeholder="Enter Font Size" required>
                                <span class="text-danger">
                                    @error('min_width_font_size')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="font_weight"> <b>Font Weight<span class="text-danger">*</span></b> </label>
                                <input type="text" name="font_weight" class="form-control @error('font_weight') is-invalid @enderror" placeholder="Enter Font Weight" required>
                                <span class="text-danger">
                                    @error('font_weight')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="line_height"> <b>Line Height<span class="text-danger">*</span></b> </label>
                                <input type="text" name="line_height" class="form-control @error('line_height') is-invalid @enderror" placeholder="Enter Line Height" required>
                                <span class="text-danger">
                                    @error('line_height')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
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
