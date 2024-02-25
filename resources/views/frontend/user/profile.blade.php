@extends('layouts.user')

@section('content')
    <div class="mt-2">
        <div class="d-flex justify-content-between gap-2">
            @include('frontend.user.partials.sidebar')
            <div class="col-sm-10 bg-light">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Update User Information</h3>

                        </div>
                        @if (session()->has('update'))
                    <strong class="text-success text-center py-4">{{ session()->get('update') }}</strong>
                    @endif
                    @if (session()->has('error'))
                    <strong class="text-danger">{{ session()->get('error') }}</strong>
                    @endif
                    </div>
                    <div class="card-body">
                        <div class="d-flex ">
                            <div class="col-sm-9">
                                <!-- form start -->
                                <form action="{{ route('UserUpdateProfile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">User Name</label>
                                                    <input type="text"
                                                        class="form-control mt-1 @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $user->name }}" id="exampleInputEmail1">
                                                    @error('name')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-1">
                                                    <label for="exampleInputEmail1">User Email</label>
                                                    <input type="text"
                                                        class="form-control mt-1 @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $user->email }}" id="exampleInputEmail1"
                                                        placeholder="Enter Email">
                                                    @error('email')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-1">
                                                        <label for="exampleInputEmail1">User Password <small
                                                            class="text-danger">( Enter Password if you Changed )</small>
                                                        </label>
                                                    <input type="text"
                                                        class="form-control mt-1 @error('password') is-invalid @enderror"
                                                        name="password" value="{{ old('password') }}"
                                                        id="exampleInputEmail1" placeholder="Enter Password ">
                                                    @error('password')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="fileInput">Picture</label>
                                                    <div class="input-group">
                                                        <div class="">
                                                            <input type="file" class="form-control"
                                                                id="fileInput" name="user_picture">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-1">
                                                    <label>User Description</label>
                                                    <textarea class="form-control mt-1" rows="4" name="desc" placeholder="Write your profile description">{{ $user->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class=" btn btn-primary mt-2">Update Profile</button>
                                    </div>



                                </form>
                            </div>
                            <div class="col-sm-3">
                                <div style="width: 150px;height: 176px;overflow: hidden;border-radius: 10px;margin-top: 62px;">
                                    <img src="{{ asset($user->image) }}"
                                        class="img-fluid img-rounded" id="previewimage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
            </div>
        </div>
    </div>

<script>

    //password show and hide
    const passwordInput = document.querySelector("#password")
    const eye = document.querySelector("#eye");


    eye.addEventListener("click", function(){
    this.classList.toggle("fa-eye-slash")
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
    passwordInput.setAttribute("type", type)
    });

</script>


<script>

    //image upload and preview image

    const fileInput = document.getElementById("fileInput");
    const previewImage = document.getElementById("previewimage");

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
