@extends('backend.layouts.admin_master')
@section('title','Edit | Tag Page')
@section('admin_content')
<div class="container">
    <div class="d-flex align-item-center justify-content-center">
        <div class="col-md-8" style="margin-top: 120px">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="d-flex align-item-center justify-content-between">
                        <h2 class="card-title py-2 pt-2">Update Tag</h2>
                        <a href="{{ route('tag.index') }}" class="btn btn-outline-success border border-1 border-info" >All Tag</a>
                    </div>
                </div>
                    <div class="card-body">
                        <form action="{{ route('tag.update',$tag->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mt-1">
                              <label for="tag_name">Tag Name:</label>
                              <input type="text" class="form-control mt-1 @error('tag_name') is-invalid @enderror" value="{{ $tag->name }}"  id="tag_name" placeholder="Write Your tag Name..." name="tag_name">
                                @error('tag_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-success mt-2">Update tag</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
