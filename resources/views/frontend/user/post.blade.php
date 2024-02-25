@extends('layouts.user')
@section('title', 'User Profile')
@section('content')
<div class="site-section bg-light">


    <div class="container-fluid p-0">
        <div class="row ">
            @include('frontend.user.partials.sidebar')

            <div class="col-sm-10 bg-light">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fa fa-list" aria-hidden="true"></i> Post List</h3>
                            <div class="card-title text-center text-danger text-bold pt-2"><i class="fa fa-life-ring"
                                    aria-hidden="true"></i>
                                User Total Post : ({{ $recentPost->count() }})</div>
                            <a href="{{ route('insert.post') }}" class="btn btn-primary">Create Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        @if ($recentPost->count() > 0)
                                            @foreach ($recentPost as $post)
                                                <div class="col-sm-3 mb-4">
                                                    <div class="card bg-light" style="height: 400px;">
                                                        <div class="card-body">

                                                            <img src="@if ($post->post_photo) {{ asset($post->post_photo) }} @else {{ asset('backend/post/default.jpg') }} @endif"
                                                                class="img-fluid img-rounded" alt=""
                                                                style="width:320px;height:190px">
                                                            <h4 class="card-title pt-2">{{ $post->post_title }}</h4>
                                                            <h4 class="card-title pt-2">Category of {{ $post->category->category_name }}</h4>
                                                            <p class="card-text text-justify pb-2">
                                                                {{ substr($post->post_description, 0, 40) }}
                                                            </p>

                                                        </div>
                                                        <div class="card-footer text-center d-flex justify-content-center align-item-center gap-2">
                                                            <a href="{{ route('post.view',$post->slug) }}"
                                                                class="btn btn-warning rounded mr-1"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i>View</a>
                                                            <a href="{{ route('post.edit',$post->id) }}"
                                                                class="btn btn-info rounded mr-1"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>Edit</a>
                                                            <form action="{{ route('post.delete',$post->id) }}"method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger rounded mr-1"><i
                                                                        class="fa fa-trash-o"
                                                                        aria-hidden="true"></i>Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <td colspan="3" class="text-center text-danger" style="font-size: 22px;">
                                                <span>Sorry This User No Post Here</span>
                                            </td>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-center">{{ $recentPost->links() }}</div>
                                {{-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection
