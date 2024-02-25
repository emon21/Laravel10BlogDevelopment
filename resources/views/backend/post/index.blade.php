@extends('backend.layouts.admin_master')
@section('admin_content')

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
            <div class="card card-primary card-outline">
                <div class="card-header ">
                    <div class="d-flex align-item-center justify-content-between">
                        <h2 class="card-title py-2 pt-2">All Post</h2>

                        <a href="{{ route('post.create') }}" class="btn btn-outline-success ">Create Post</a>

                        {{-- <button type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#CategoryModal">
                            Create Post
                          </button> --}}
                    </div>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Auther</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts->count())

                            @foreach ($posts as $row)

                                <tr class="text-center">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src="{{ asset($row->post_photo) }}" alt="" width="180" height="150"></td>
                                    <td>{{ $row->post_title }}</td>
                                    <td>{{ $row->category->category_name }}</td>
                                    <td>
                                        @if($posts->count())
                                            <!-- Display data here -->
                                                @foreach ($row->tags as $tag)
                                                <span class="badge badge-primary">{{ $tag->name }}</span>
                                                @endforeach
                                        @else
                                            <!-- Display a message when no data is found -->
                                            <p>No Tag found.</p>

                                        @endif
                                    </td>
                                    <td>{{ $row->user->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('post.edit',$row->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('category.destroy',$row->id) }}" class="btn btn-danger btn-sm delete">Delete</a> --}}
                                        <form action="{{ route('post.destroy',$row->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete" ><i class="fas fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('post.show',$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>

                                @endforeach

                                @else
                                <tr>
                                    <td colspan="6">
                                       <h4 class="text-center text-danger">No Post Found</h4>
                                    </td>
                                </tr>

                                @endif
                            </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>tag</th>
                                <th>Auther</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>   <!-- /.content-wrapper -->


{{-- Model Card  --}}

<!-- Category insert The Modal -->

<div class="modal fade " id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group mt-1">
                <label for="post_name">Post Name:</label>
                <input type="text" class="form-control mt-1 @error('post_name') is-invalid @enderror" value="{{ old('post_name') }}"  id="post_name" placeholder="Write Your Post Name..." name="post_name">
              </div>

              {{-- <div class="form-group">
                <label>Tag List :</label>
                <select class="select2" name="tag_list" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
              </div> --}}


              {{-- <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
              </div> --}}


              <div class="form-group  align-item-center">
                    @foreach ($tags as $tag)
                        <div class="d-flex custom-control custom-checkbox">
                                <input class="custom-control-input" name="tag_list[]" type="checkbox" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                                <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                        </div>
                    @endforeach
              </div>

                <div class="form-group">
                    <label>Category :</label>
                    <select class="form-control" name="category_list"  data-placeholder="Choose Category">
                        <option value=""> >> Choose Category << </option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                  </div>

                <div class="form-group">
                    <label for="site_logo">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile"
                            name="post_picture">
                        <label class="custom-file-label" for="site_logo">Choose
                            file</label>
                    </div>
                </div>


              <div class="form-group">
                <label>Post Description</label>
                <textarea name="post_desc" class="form-control"  id="summernote" cols="30" rows="10"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  @push('script')
       <script>
         $(function () {

            bsCustomFileInput.init();
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        });

         //summernote editor js code
        //  $('#summernote').summernote([
        //     placeholder: 'Hello Bootstrap 4',
        //     tabsize: 2,
        //     height: 100,
        //     lang: 'ko-KR' // default: 'en-US'
        //     toolbar: [
        //     ['style', ['style']],
        //     ['font', ['bold', 'underline', 'clear']],
        //     ['color', ['color']],
        //     ['para', ['ul', 'ol', 'paragraph']],
        //     ['table', ['table']],
        //     ['insert', ['link', 'picture', 'video']],
        //     ['view', ['fullscreen', 'codeview', 'help']]
        //     ]
        // ]);

    });
    </script>

  @endpush

@endsection
