@extends('layouts.admin')
@section('title')
Edit Job | Star 2 Consulting Inc.
@endsection
@section('admin_content')


<!-- blog Heading -->
<div class="text-center">
    <h1 class="h3 mb-0 text-gray-800 text-center" >Edit job</h1>
</div>
<hr>

<!-- Content Row -->
<div class="row">
    <div class="col-10 m-auto">
        <!-- DataTales Example -->
        <div class="card bg-light shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Job Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update.job', ['id' => $job->id] )}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name"> <b>Name<span class="text-danger">*</span></b> </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$job->name}}" required>
                        <span class="text-danger">
                            @error('name')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description"> <b>Description<span class="text-danger">*</span></b> </label>
                            <textarea name="description" class="form-control description @error('description') is-invalid @enderror" id="description" cols="30" rows="5" required>{{$job->description}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span>
                            {{-- <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$job->description}}" required>
                            <span class="text-danger">
                                @error('description')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span> --}}
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="keywords"> <b>Keywords<span class="text-danger">*</span></b> </label>
                        <input type="text" name="keywords" class="form-control" value="{{$job->keywords}}" >
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
