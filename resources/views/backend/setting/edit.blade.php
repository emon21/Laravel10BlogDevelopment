@extends('backend.layouts.admin_master')
@section('title','Edit | Site Setting')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('backend/dropify/dist/css/dropify.css') }}">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting Page</li>
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
                    <h2 class="card-title py-2 pt-2">Edit Setting</h2>
                </div>
              </div>

              <div class="card-body">
                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-sm-12">
                        <label for="site_name">Site Name:</label>
                        <input type="text" class="form-control mt-1 @error('site_name') is-invalid @enderror" value="{{ $setting->site_name }}"  id="site_name" placeholder="Write Your Post Name..." name="site_name">
                      </div>

                      <div class="d-flex aligin-item-center justify-content-between mt-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text" class="form-control mt-1 @error('facebook') is-invalid @enderror" value="{{ $setting->facebook }}"  id="facebook" placeholder="Write Your Facebook..." name="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter:</label>
                                        <input type="text" class="form-control mt-1 @error('twitter') is-invalid @enderror" value="{{ $setting->twitter }}"  id="twitter" placeholder="Write Your Twitter..." name="twitter">
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="instagram">Instagram:</label>
                                    <input type="text" class="form-control mt-1 @error('instagram') is-invalid @enderror" value="{{ $setting->instagram }}"  id="instagram" placeholder="Write Your Instagram..." name="instagram">
                                </div>
                                    <div class="form-group">
                                        <label for="reddit">Reddit:</label>
                                        <input type="text" class="form-control mt-1 @error('reddit') is-invalid @enderror" value="{{ $setting->reddit }}"  id="reddit" placeholder="Write Your Reddit..." name="reddit">
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control mt-1 @error('email') is-invalid @enderror" value="{{ $setting->email }}"  id="email" placeholder="Write Your Email..." name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="copyright">Copyright:</label>
                                        <input type="text" class="form-control mt-1 @error('copyright') is-invalid @enderror" value="{{ $setting->copyright }}"  id="copyright" placeholder="Write Copyright..." name="copyright">
                                    </div>
                            </div>
                    </div>

                      <div class="d-flex align-item-center">
                            <div class="form-group col-sm-8">
                                <label for="comment">Site Description:</label>
                                <textarea id="summernote" name="about_site" class="@error('about_site') is-invalid @enderror">{!! $setting->about_site !!}</textarea>
                                @error('about_site')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="comment">Site Logo:</label>
                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="imageInput" name="site_logo">
                                    <label class="custom-file-label" for="site_logo">Choose file</label>
                                </div>
                                <div class="form-group" >
                                    <img id="imagePreview" src="@if ($setting->site_logo) {{ asset($setting->site_logo) }} @else {{ asset('backend/post/default.jpg') }} @endif " style="
                                    max-height:310px;" alt="" class=" img-fluid img-rounded">
                                </div>
                            </div>
                      </div>
                      <div class="form-group ml-2">
                        <button type="submit" class="btn btn-outline-success">Update Setting</button>
                    </div>
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
     height: 300,
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
