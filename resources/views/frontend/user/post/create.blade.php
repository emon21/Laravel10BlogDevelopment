@extends('layouts.user')
@section('title', 'User Profile')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            @include('frontend.user.partials.sidebar')
            <div class="col-sm-10 bg-light">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">User Post</h3>
                            <a href="" class="btn btn-primary">Go Back User List</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if (session('update'))
                        <div class="alert alert-success">
                            {{ session('update') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <!-- form start -->
                                <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Post Name</label>
                                                    <input type="text"
                                                        class="form-control @error('post_name') is-invalid @enderror"
                                                        name="post_name" value="{{ old('post_name') }}" id="exampleInputEmail1"
                                                        placeholder="Enter Your Post Name">
                                                    @error('post_name')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-1">
                                                    <label>Post Description</label>
                                                    <textarea class="form-control py-1" rows="5" name="post_desc" placeholder="Write your profile description"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6 mt-2">
                                                        <label for="sel1">Category List:</label>
                                                        <select
                                                            class="form-control pt-2  @error('category_list') is-invalid @enderror"
                                                            id="sel1" name="category_list">
                                                            <option style="display: none" selected
                                                                class="@error('category_list') is-invalid @enderror"> Select Category </option>
                                                            @foreach ($categories as $category)
                                                                <option class="form-control" value="{{ $category->id }}">
                                                                    {{ $category->category_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Status Start -->
                                                    <div class="form-group col-sm-6" style="margin-top:2px">
                                                        <label for="exampleInputFile">Status</label>
                                                        <div class="mt-2">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio"
                                                                    class="custom-control-input @error('status') is-invalid @enderror"
                                                                    id="customRadio" name="status" value="publish">
                                                                <label class="custom-control-label"
                                                                    for="customRadio">Publish</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio"
                                                                    class="custom-control-input custom-control-input-danger @error('status') is-invalid @enderror"
                                                                    id="customRadio2" name="status" value="unpublish">
                                                                <label class="custom-control-label"
                                                                    for="customRadio2">Unpublish</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Status End --->
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Picture</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile" name="post_picture">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- checkbox -->
                                                <div class="form-group col-sm-12">
                                                    <label for="sel1">Choose Tag List:</label>
                                                    <div class="d-flex flex-wrap">
                                                        @foreach ($tags as $tag)
                                                            <div class="custom-control custom-checkbox mr-2">
                                                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                                                    type="checkbox" name="tags[]"
                                                                    id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                                                                <label for="tag{{ $tag->id }}"
                                                                    class="custom-control-label px-1 py-1">{{ $tag->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Create Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
