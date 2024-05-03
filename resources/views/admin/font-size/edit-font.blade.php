@extends('layouts.admin')
@section('title')
Edit Font | Star 2 Consulting Inc.
@endsection
@section('admin_content')


<!-- blog Heading -->
<div class="font-center">
    <h1 class="h3 mb-0 font-gray-800 font-center" >Edit Font</h1>
</div>
<hr>

<!-- Content Row -->
<div class="row">
    <div class="col-10 m-auto">
        <!-- DataTales Example -->
        <div class="card bg-light shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold font-primary">Edit Font Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update.font', ['id' => $font->id] )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="name"> <b>Name<span class="text-danger">*</span></b> </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$font->name}}" required readonly>
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
                                <input type="text" name="used" class="form-control @error('used') is-invalid @enderror" value="{{$font->used}}" required readonly>
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
                                <input type="text" name="font_size" class="form-control @error('font_size') is-invalid @enderror" value="{{$font->font_size}}" required>
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
                                <input type="text" name="min_width_font_size" class="form-control @error('min_width_font_size') is-invalid @enderror" value="{{$font->min_width_font_size}}" required>
                                <span class="text-danger">
                                    @error('min_width_font_size')
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
