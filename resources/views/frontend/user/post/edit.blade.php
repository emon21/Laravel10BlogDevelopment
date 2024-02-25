@extends('layouts.user')

@section('title', 'User Post Edit')

@section('content')
    <div class="container-fluid mb-4">
        <div class="row mt-2 border-top">
            @include('frontend.user.partials.sidebar')

            <div class="col-sm-10 bg-light">
                <!-- Create Post Start -->
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Post Edit</h3>
                            <a href="{{ route('user.post') }}" class="btn btn-primary text-light"><i class="fa fa-reply"
                                    aria-hidden="true"></i>&nbsp; Go back Post List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-9 justify-content-center mx-auto d-block">

                                    <!-- general form elements -->
                                    <div class="card card-primary">

                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Post Name</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="post_title" value="{{ $post->post_title }}" id="exampleInputEmail1"
                                                        placeholder="Enter Post Name">
                                                    @error('post_title')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Description:</label>
                                                    <textarea name="post_desc" class="form-control @error('post_desc') is-invalid @enderror">{{ $post->post_description }}</textarea>

                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="site_logo">Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="imageInput"
                                                                name="post_picture">
                                                            <label class="custom-file-label" for="site_logo">Choose
                                                                file</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-5">
                                                        <label for="sel1">Category List:</label>
                                                        <select
                                                            class="form-control  @error('category_list') is-invalid @enderror"
                                                            id="sel1" name="category_list">
                                                            <option style="display: none" selected
                                                                class="@error('category_list') is-invalid @enderror"> Select Category </option>
                                                            @foreach ($categories as $category)
                                                                <option class="mt-4" value="{{ $category->id }}"
                                                                    @if ($post->category_id == $category->id) selected @endif>
                                                                    {{ $category->category_name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <!-- Status Start -->
                                                <div class="form-group col-sm-4" style="margin-top:-2px">
                                                    <label for="custom-control-label">Status</label>
                                                    <div class="">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio"
                                                                @if ($post->status == 'publish') checked @endif
                                                                class="custom-control-input @error('status') is-invalid @enderror"
                                                                id="customRadio" name="status" value="publish">
                                                            <label class="custom-control-label"
                                                                for="customRadio">Publish</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio"
                                                                @if ($post->status == 'unpublish') checked @endif
                                                                class="custom-control-input custom-control-input-danger @error('status') is-invalid @enderror"
                                                                id="customRadio2" name="status" value="unpublish">
                                                            <label class="custom-control-label"
                                                                for="customRadio2">Unpublish</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Status End ---> --}}

                                                <!-- checkbox -->
                                                <div class="form-group col-sm-12">
                                                    <label>Choose Tag List:</label>
                                                    <div class="d-flex flex-wrap">
                                                        @foreach ($tags as $tag)
                                                            <div class="custom-control custom-checkbox mr-2">
                                                                <input
                                                                    class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                                                    type="checkbox" name="tags[]"
                                                                    id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                                                                    @foreach ($post->tags as $item) @if ($tag->id == $item->id) checked @endif
                                                                    @endforeach>
                                                                <label for="tag{{ $tag->id }}"
                                                                    class="custom-control-label px-1 py-1">{{ $tag->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Button --->
                                                <div class="form-group col-sm-4">
                                                    <button type="submit" class="btn btn-success w-50">Update Post</button>
                                                </div>
                                                <!-- Button --->

                                            </div>
                                            <!-- /.card-body -->
                                        </form>

                                    </div>
                                    <!-- /.card -->

                                </div>
                                <div class="col-sm-3">
                                    <div
                                        style="width: 280px;height:250px;border-radius: 10px;">
                                        <img id="imagePreview" src="{{ asset($post->post_photo) }}"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend/dropify/dist/js/dropify.js') }}"></script>
    <script>
        //dropify image upload
        $('.dropify').dropify({
            messages: {
                'default': 'Add a File Upload',
                'replace': 'Drag and drop or click to replace',
                'error': 'Ooops, something wrong happended.'

            }
        });
        //summernote editor
        $(function() {
            // Summernote
            //$('#summernote').summernote()
            $('#summernote').summernote({
                height: 150, //set editable area's height
                title: 'Enter Title',
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });


        });

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        bsCustomFileInput.init();

        imageInput.onchange = evt => {
        const [file] = imageInput.files
        if (file) {
            imagePreview.src = URL.createObjectURL(file)
        }
        }
    </script>
@endsection
