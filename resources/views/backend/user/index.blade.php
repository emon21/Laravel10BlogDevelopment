@extends('backend.layouts.admin_master')
@section('admin_content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">User Page</li>
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
                        <h2 class="card-title py-2 pt-2">All User List</h2>
                        <a href="{{ route('user.create') }}" class="btn btn-outline-success"  data-toggle="modal" data-target="#CategoryModal">Create User</a>
                    </div>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($user->count())

                            @foreach ($user as $row)

                                <tr class="text-center">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td class="d-flex gap-2 align-item-center">
                                         <a href="{{ route('user.edit',$row->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('category.destroy',$row->id) }}" class="btn btn-danger btn-sm delete">Delete</a> --}}
                                        <form action="{{ route('user.destroy',$row->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete" ><i class="fas fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('user.show',$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>

                                    </td>
                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <td class="" colspan="5">
                                       <h4 class="text-center text-danger">No User Found</h4>
                                    </td>
                                </tr>

                                @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>User name</th>
                                <th>Email</th>
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
          <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="form-group mt-1">
                <label for="category_namennameame">User Name:</label>
                <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" value="{{ old('name') }}"  id="name" placeholder="Write Your Name..." name="name">
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group mt-1">
                <label for="email">User Email:</label>
                <input type="text" class="form-control mt-1 @error('email') is-invalid @enderror" value="{{ old('email') }}"  id="email" placeholder="Write Your Email..." name="email">
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="d-flex align-item-center justify-content-between">
                <div class="form-group col-sm-8">
                    <label for="password">Password:</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}"  id="password" placeholder="Write Your Password..." name="password">
                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="category_name">User Role:</label>
                    <select name="user_role" class="form-control">
                        <option value="">User Role</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>

                    {{-- <input type="text" class="form-control mt-1 @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}"  id="category_name" placeholder="Write Your Category Name..." name="category_name">
                    @error('category_name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Create User</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
