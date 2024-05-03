@extends('layouts.admin')
@section('title')
Edit Web Content | Star 2 Consulting Inc.
@endsection
@section('admin_content')


<!-- blog Heading -->
<div class="text-center">
    <h1 class="h3 mb-0 text-gray-800 text-center" >Edit Web Content</h1>
</div>
<hr>

<!-- Content Row -->
<div class="row">
    <div class="col-10 m-auto">
        <!-- DataTales Example -->
        <div class="card bg-light shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Web Content Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update.web.content', ['id' => $web_content->id] )}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title"> <b>Title<span class="text-danger">*</span></b> </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$web_content->title}}" required>
                        <span class="text-danger">
                            @error('title')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description" class="form-label"><b>Description<span class="text-danger">*</span></b></label>
                            <textarea name="description" class="form-control description @error('description') is-invalid @enderror" id="description" cols="30" rows="5" placeholder="Write a description" required>{{$web_content->description}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span> 
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="media"> <b>Media</b> <sup>[Size: To maintain the design, please use image of same
                                size
                                ]</sup></label>
                        <input type="file" name="media" class="form-control" accept="">
                        <br>
                        @php
                            $extension = pathinfo($web_content->media, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, ['mp4', 'mkv']))
                            <video controls height="150px" width="220px">
                                <source src="{{asset('upload/web_content/'.$web_content->media)}}" type="">
                            </video>
                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{asset('upload/web_content/'.$web_content->media)}}" alt="" height="150px" width="220px">
                        @else
                            <p>Unsupported media type</p>
                        @endif
                        
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="media_two"> <b>Media Two</b> <sup>[Size: To maintain the design, please use image of same
                                size
                                ]</sup></label>
                        <input type="file" name="media_two" class="form-control" accept=".mp4, .mkv, .jpg, .jpeg, .png, .gif">
                        <br>
                        @php
                            $extension = pathinfo($web_content->media_two, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, ['mp4', 'mkv']))
                            <video controls height="150px" width="220px">
                                <source src="{{asset('upload/web_content/'.$web_content->media_two)}}" type="">
                            </video>
                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{asset('upload/web_content/'.$web_content->media_two)}}" alt="" height="150px" width="220px">
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
