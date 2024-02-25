@extends('backend.layouts.admin_master')
@section('admin_content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Category Page</li>
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
                        <h2 class="card-title py-2 pt-2">All Categories</h2>
                        {{-- message --}}
                        {{-- @if (session()->has('success'))
                         <strong class="text-success text-center mt-2">{{ session()->get('success') }}</strong>
                    @endif

                        @if (session()->has('error'))
                         <strong class="text-danger text-center mt-2">{{ session()->get('error') }}</strong>
                    @endif --}}
                        {{-- message --}}
                        <a href="{{ route('category.create') }}" class="btn btn-outline-success "  data-toggle="modal" data-target="#CategoryModal">Add Categories</a>
                    </div>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($category->count())

                            @foreach ($category as $row)

                                <tr class="text-center">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $row->category_name }}</td>
                                    <td>{{ $row->category_slug }}</td>
                                    <td class="d-flex gap-2 align-item-center">
                                         <a href="{{ route('category.edit',$row->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('category.destroy',$row->id) }}" class="btn btn-danger btn-sm delete">Delete</a> --}}
                                        <form action="{{ route('category.destroy',$row->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete" ><i class="fas fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>

                                    </td>
                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <td class="" colspan="5">
                                       <h4 class="text-center text-danger">No Categories Found</h4>
                                    </td>
                                </tr>

                                @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Category name</th>
                                <th>Slug</th>
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



<!-- Category insert The Modal -->

<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="form-group mt-1">
                <label for="category_name">Category Name:</label>
                <input type="text" class="form-control mt-1 @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}"  id="category_name" placeholder="Write Your Category Name..." name="category_name">
                @error('category_name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
@endsection
