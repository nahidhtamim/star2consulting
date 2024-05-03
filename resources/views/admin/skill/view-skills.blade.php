@extends('layouts.admin')
@section('title')
Skills | Star 2 Consulting Inc.
@endsection
@section('admin_content')


<!-- Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-20 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="d-flex align-items-center justify-content-between my-4">
            <h3 class="mb-0">Skills </h6>
            <a href="" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#skillModal">Add New</a>
        </div>
    </div>
</div>
<!-- End -->

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Type</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td> <i class="{{$skill->icon}}"></i></td>
                            <td>
                                @if($skill->type == 1)
                                Powerskills
                                @elseif($skill->type == 2)
                                Leadership Skills
                                @endif
                            </td>
                            <td>{{$skill->title}}</td>
                            <td>{!!$skill->description!!}</td>
                            {{-- <td>
                                @if ($skill->status == 0)
                                <b class="text-danger">Inactive</b>
                                <a href="{{ route('active.skill', ['id' => $skill->id] )}}" class="btn btn-success btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Active">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                                @else
                                <b class="text-success">Active</b>
                                <a href="{{ route('deactive.skill', ['id' => $skill->id] )}}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Inactive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td> --}}
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('edit.skill', ['id' => $skill->id] )}}" class="btn btn-warning"><i
                                            class="fa fa-pen"></i> </a></a>
                                    <a href="{{ route('delete.skill', ['id' => $skill->id] )}}" class="btn btn-danger"
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



<!-- Add Eco System Modal -->

<div class="modal fade" id="skillModal" tabindex="-1" aria-labelledby="skillModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="skillModalLabel">Add Item</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save.skill')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="title"> <b>Skill Type<span class="text-danger">*</span></b> </label>
                                <select name="type" id="" class="form-select" required>
                                    <option value="" selected>Select A Value</option>
                                    <option value="1">Powerskills</option>
                                    <option value="2">Leadership Skills</option>
                                </select>
                                <span class="text-danger">
                                    @error('type')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="icon"> <b>Icon<span class="text-danger">*</span></b> </label>
                                <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="Enter Icon" required>
                                <span class="text-danger">
                                    @error('icon')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="title"> <b>Title<span class="text-danger">*</span></b> </label>
                                <input type="skill" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" required>
                                <span class="text-danger">
                                    @error('title')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="description"> <b>Description<span class="text-danger">*</span></b> </label>
                                <input type="skill" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" required>
                                <span class="text-danger">
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
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