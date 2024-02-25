@extends('backend.layouts.admin_master')
@section('title','Edit | Post Page')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Post Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Post Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-success card-outline">
              <div class="card-header">
                <div class="d-flex align-item-center justify-content-between">
                    <h2 class="card-title py-2 pt-2">Edit Post</h2>
                    <a  href="{{ route('post.index') }}" class="btn btn-outline-success">
                        Back to Post List
                      </a>
                </div>
              </div>
                    @if (session()->has('success'))
                         <strong class="text-success text-center mt-3">{{ session()->get('success') }}</strong>
                    @endif
              <div class="card-body">
                <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="post_name">Post Name:</label>
                        <input type="text" class="form-control mt-1 @error('post_name') is-invalid @enderror" value="{{ $post->post_title }}"  id="post_name" placeholder="Write Your Post Name..." name="post_name">
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Category :</label>
                            <select class="form-control" name="category_list"  data-placeholder="Choose Category">
                                <option value=""> >> Choose Category << </option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>
                                    {{  $category->category_name }}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Tag List :</label>
                        <div class="form-group d-flex align-item-center ">
                            @foreach ($tags as $tag)
                                <div class="custom-control custom-checkbox ml-1">
                                <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                                @foreach ($post->tags as $tg )
                                    @if($tag->id == $tg->id) checked @endif
                                @endforeach>
                                <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                            </div>
                          @endforeach
                        </div>
                      </div>

                      <div class="d-flex align-item-center">
                        <div class="form-group col-sm-8">
                            <label for="comment">Description:</label>
                            <textarea id="summernote" name="post_desc" class="@error('post_desc') is-invalid @enderror">{!! $post->post_description !!}</textarea>

                            {{-- <textarea class="form-control @error('post_desc') is-invalid @enderror" name="post_desc" cols="25" rows="10" placeholder="Enter Description"></textarea> --}}
                            @error('post_desc')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="comment">Old Picture:</label>
                            <div class="" >
                                <img id="imagePreview" src="{{ asset($post->post_photo) }}" style="max-width: 230px;height: 252px;border-radius: 5px;" alt="" class="img-fluid">
                            </div>

                        </div>
                      </div>

                      <div class="col-sm-4">
                        <label for="site_logo">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageInput"
                                name="post_picture">
                            <label class="custom-file-label" for="site_logo">Choose
                                file</label>
                        </div>
                    </div>
                      <button type="submit" class="btn btn-outline-success mt-2">Update Post</button>
            </form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </div>
</div>


@push('script')
<script src="{{ asset('backend/dropify/dist/js/dropify.js') }}"></script>

<script>
  $(function () {

 //Initialize Select2 Elements
 $('.select2').select2();

 //Initialize Select2 Elements
 $('.select2bs4').select2({
 theme: 'bootstrap4'
 });

  //summernote editor js code
  $('#summernote').summernote({
     placeholder: 'Hello Bootstrap 4',
     tabsize: 2,
     height: 200,
  });


bsCustomFileInput.init();

});


$(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });


         //img upload and preview

imageInput.onchange = evt => {
        const [file] = imageInput.files
        if (file) {
            imagePreview.src = URL.createObjectURL(file)
        }
        }

</script>

@endpush
@endsection
