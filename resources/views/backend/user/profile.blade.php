@extends('backend.layouts.admin_master')
@section('title','User Profile')
@section('admin_content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset($user->image) }}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Followers</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

              <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
                <span class="tag tag-success">Coding</span>
                <span class="tag tag-info">Javascript</span>
                <span class="tag tag-warning">PHP</span>
                <span class="tag tag-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item { 'changeprofile' == request()->path() ? 'active' : '' }}"><a class="nav-link @if(route('profile')) active  @error('old_password')  @enderror @endif" href="#changeprofile" data-toggle="tab">Change Profile</a></li>
                <li class="nav-item"><a class="nav-link @error('old_password') active @enderror" href="#changepassword" data-toggle="tab">Change Password</a></li>

              </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane @if(route ('profile')) @error('old_password') @else active @enderror @endif" id="changeprofile">
                     {{--  Change Profile Start --}}
                     {{-- <div id="home" class="container tab-pane @if(url('admin/profile')) @error('old_password') @else active @enderror @endif"><br> --}}
                        <form action="{{ route('profile.update',$user->id) }}" method="post"
              enctype="multipart/form-data">
              @csrf
                    <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="category_namennameame">User Name:</label>
                                    <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" value="{{ $user->name }}"  id="name" placeholder="Write Your Name..." name="name">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">User Email:</label>
                                    <input type="text" class="form-control mt-1 @error('email') is-invalid @enderror" value="{{ $user->email }}"  id="email" placeholder="Write Your Email..." name="email">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" id=""  rows="5" placeholder="Write your profile Description">{{ $user->description }}</textarea>
                                </div>

                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">User Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="file-input">
                                        <label class="custom-file-label" >Choose file</label>
                                    </div>
                                </div>
                                <div style="width: 265px;height: 280px; overflow: hidden;" class="m-auto">
                                    <img src="{{ asset($user->image) }}" class="mx-auto d-block img-fluid img-rounded" id="preview-image">
                                </div>
                            </div>
                    </div>

                          <button type="submit" class="btn btn-outline-success">Update Profile</button>
                      </form>

                  {{--  Change Profile End  --}}
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane @if(route ('password.change')) @error('old_password') @else active @enderror @endif" id="changepassword">
                   {{--  Change Password Start  --}}
                   {{-- <div id="changepassword" class="container tab-pane  @error('old_password') active @enderror"><br> --}}

                    @if (session()->has('success'))
                    <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if (session()->has('error'))
                    <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif
                    @if(session('status'))
                        <div class="alert alert-success"> {{ session('status') }}</div>
                    @endif
                   <form action="{{ route('update.password') }}" method="post" enctype="multipart/form-data">
            {{--  <form action="{{ url('admin/profile/changeprofile') }}" method="post" enctype="multipart/form-data">  --}}
                        @csrf
                         {{-- <input type="hidden" name="userid" value="{{ $user->id }}"> --}}
                        <div class="form-group">
                            <label>Old Password:</label>
                            <input type="password" class="form-control"
                                placeholder="Enter Old Password...!!" value="{{ old('old_password') }}"
                                name="old_password">
                                @error('old_password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>New Password:</label>
                            <input type="password" class="form-control" placeholder="Enter New Password...!!"
                                value="{{ old('new_password') }}" name="new_password">
                                  @error('new_password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success">Change Password</button>
                    </form>
                </div>
                {{--  Change Password End  --}}
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<script>

    const fileInput = document.getElementById("file-input");
    const previewImage = document.getElementById("preview-image");

        fileInput.addEventListener("change", function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            previewImage.setAttribute("src", this.result);
            previewImage.style.display = "block";
        });

        reader.readAsDataURL(file);
        });

      //custom file

      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
</script>
@endsection
