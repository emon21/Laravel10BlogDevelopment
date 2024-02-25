@extends('layouts.user')
@section('title','User Page')
@section('content')
<div class="mt-2">
    <div class="d-flex gap-2">
        <!--sidebar -->
        @include('frontend.user.partials.sidebar')
        <!--sidebar -->
        <div class="col-sm-10 bg-light">
            <div class="card">
                <div class="card-header">{{ __('Password Change') }}</div>
                @if (session()->has('success'))
                <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif
                @if (session()->has('error'))
                <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif
                <div class="card-body">
                    <form action="{{ route('update.password') }}" method="post">
                        @csrf
                        <div class="form-group mt-1">
                            <label for="current-password">Current Password:</label>
                            <input type="password" name="current_password" class="form-control mt-1 " id="current-password" placeholder="Your current-password..."  value="{{ old('current_password') }}" >
                          </div>
                          <div class="form-group mt-1">
                            <label>New Password:</label>
                            <input type="password" name="password" class="form-control mt-1 @error('password') is-invalid @enderror" placeholder="New password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>

                          {{-- <div class="form-group mt-1">
                            <label for="confirm-password">Confirm Password:</label>
                            <input type="password" name="confirm_password" class="form-control mt-1 d-block" id="confirm-password" placeholder="Confirm password" required>
                          </div> --}}

                         {{-- <div class="password-container">
                           <input type="password" placeholder="Password..." id="password">
                           <i class="fa fa-solid fa-eye" id="eye"></i>
                         </div> --}}
                       <button type="submit" class="btn btn-outline-success mt-2">Change Password</button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye");


eye.addEventListener("click", function(){
this.classList.toggle("fa-eye-slash")
const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
passwordInput.setAttribute("type", type)
})
</script>
@endsection
