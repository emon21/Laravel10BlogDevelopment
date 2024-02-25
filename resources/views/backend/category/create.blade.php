@extends('backend.layouts.admin_master')
@section('title','Category Page')
@section('admin_content')
<div class="container">
    <div class="d-flex align-item-center justify-content-center">
        <div class="col-md-8" style="margin-top: 120px">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="d-flex align-item-center justify-content-between">
                        <h2 class="card-title py-2 pt-2">{{ __('Add New Category') }}</h2>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-success border border-1 border-info" >All Category</a>
                    </div>
                </div>
                    @if (session()->has('success'))
                         <strong class="text-success text-center mt-3">{{ session()->get('success') }}</strong>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group mt-1">
                              <label for="category_name">Category Name:</label>
                              <input type="text" class="form-control mt-1 @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}"  id="category_name" placeholder="Write Your Category Name..." name="category_name">
                                @error('category_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-success mt-2">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
