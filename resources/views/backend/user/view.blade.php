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
                        <h2 class="card-title py-2 pt-2">User Information :)</h2>
                        <a  href="{{ route('user.index') }}" class="btn btn-outline-success">
                            Back to User List
                          </a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="max-width:80px">Image</th>
                                <td><img class="img-fluid img-rounded" src="{{ asset($user->image) }}" alt="" width="180" height="150"></td>
                            </tr>

                            <tr>
                                <th style="max-width: 80px">User Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>


                            <tr>
                                <th style="max-width:80px">User Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th style="max-width:80px">User Role</th>
                                <td>@if ($user->role_as == 0)
                                    <span class="text-success">User</span>

                                    @else
                                    <span class="text-success">Admin</span>

                                    @endif</td>
                            </tr>
                            <tr>
                                <th style="max-width: 180px">Description</th>
                                <td>{!! $user->description !!}</td>
                            </tr>

                        </thead>


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



@endsection
