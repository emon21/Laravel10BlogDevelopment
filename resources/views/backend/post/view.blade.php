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
                        <h2 class="card-title py-2 pt-2">View Post</h2>
                        <a  href="{{ route('post.index') }}" class="btn btn-outline-success">
                            Back to Post List
                          </a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="max-width:80px">Image</th>
                                <td><img src="{{ asset($post->post_photo) }}" alt="" width="180" height="150"></td>
                            </tr>

                            <tr>
                                <th style="max-width: 80px">Post Title</th>
                                <td>{{ $post->post_title }}</td>
                            </tr>

                            <tr>
                                <th style="max-width: 80px">Category Name</th>
                                <td>{{ $post->category->category_name }}</td>
                            </tr>

                            <tr>
                                <th style="max-width: 80px">Post Tags</th>
                                <td>@foreach ($post->tags as $tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach</td>
                            </tr>

                            <tr>
                                <th style="max-width:80px">Auther</th>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <th style="max-width:80px">Status</th>
                                <td>{{ $post->status }}</td>
                            </tr>
                            <tr>
                                <th style="max-width: 180px">Description</th>
                                <td>{!! $post->post_description !!}</td>
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
