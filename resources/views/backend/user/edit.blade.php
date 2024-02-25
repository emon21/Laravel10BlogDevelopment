@extends('backend.layouts.admin_master')
@section('title','Edit | User Page')
@section('admin_content')
<div class="container">
    <div class="d-flex align-item-center justify-content-center">
        <div class="col-md-8" style="margin-top: 120px">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <div class="d-flex align-item-center justify-content-between">
                        <h2 class="card-title py-2 pt-2">Update User Information :)</h2>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-success border border-1 border-info" >All User </a>
                    </div>
                </div>
                    @if (session()->has('success'))
                         <strong class="text-success text-center mt-3">{{ session()->get('success') }}</strong>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('user.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="modal-body">
                            <div class="form-group mt-1">
                                <label for="category_namennameame">User Name:</label>
                                <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" value="{{ $user->name }}"  id="name" placeholder="Write Your Name..." name="name">
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                              <div class="form-group mt-1">
                                <label for="email">User Email:</label>
                                <input type="text" class="form-control mt-1 @error('email') is-invalid @enderror" value="{{ $user->email }}"  id="email" placeholder="Write Your Email..." name="email">
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                              <div class="form-group mt-1">
                                <label for="password">Password <small>(Enter password if you change)</small></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}"  id="password" placeholder="Your password..." name="password">
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                              <div class="form-group col-sm-4">
                                <label for="category_name">User Role:</label>

                                @if ($user->role_as == 0)
                                <span class="text-success">User</span>

                                @else
                                <span class="text-success">Admin</span>

                                @endif

                                <select name="user_role" class="form-control">
                                    <option value="" selected>User Role</option>
                                    <option value="0" class="" @if ($user->role_as == 0) selected @endif>User</option>
                                    <option value="1" class="" @if ($user->role_as == 1) selected @endif>Admin</option>
                                </select>
                              </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
