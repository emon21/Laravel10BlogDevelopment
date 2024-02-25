@extends('frontend.layouts.frontend_master')
@section('content')


<div class="site-wrap">
    <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
    <span class="icon-close2 js-menu-toggle"></span>
    </div>
    </div>
    <div class="site-mobile-menu-body"></div>
    </div>

    <!--header area start-->
        @include('frontend.partials.header');
    <!--header area end-->

    <div class="site-section bg-light">
    <div class="container">
    <div class="row align-items-stretch retro-layout-2">

    <div class="col-md-4">
        @foreach ($postsFirst as $first)
            <a href="{{ route('website.post',$first->slug) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset($first->post_photo) }}');">
            <div class="text">
                <div class="post-categories mb-3">
                <span class="post-category bg-success">{{ $first->category->category_name }}</span>
                {{-- <span class="post-category bg-primary">Food</span> --}}
                </div>
            <h2>{{ $first->post_title }}</h2>
            <span class="date">{{ $first->created_at->format('M d,Y') }}</span>
            </div>
            </a>
        @endforeach
    </div>

    <div class="col-md-4">
        @foreach ($postsMiddle as $middle)
            <a href="{{ route('website.post',$middle->slug) }}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{ asset($middle->post_photo) }}');">
            <div class="text">
            <div class="post-categories mb-3">
            <span class="post-category bg-primary">{{ $middle->category->category_name }}</span>
            </div>
            <h2>{{ $middle->post_title }}</h2>
            <span class="date">{{ $middle->created_at->format('M d,Y') }}</span>
            </div>
            </a>
        @endforeach
    </div>
    <div class="col-md-4">
        @foreach ($postsLast as $last)
            <a href="{{ route('website.post',$last->slug) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ asset($last->post_photo) }}');">
            <div class="text">
                <div class="post-categories mb-3">
                <span class="post-category bg-warning">{{ $last->category->category_name }}</span>
                </div>
            <h2>{{ $last->post_title }}</h2>
            <span class="date">{{ $last->created_at->format('M d,Y') }}</span>
            </div>
            </a>
        @endforeach
    </div>

    </div>
    </div>
    </div>
    <div class="site-section">
    <div class="container">
    <div class="row mb-5">
    <div class="col-12">
    <h2>Recent Posts</h2>
    </div>
    </div>
    <div class="row">

        @foreach ($recentPost as $post)
            <div class="col-lg-4 mb-4">
            <div class="entry2">
            <a href="{{ route('website.post',$post->slug) }}"><img src="@if($post->post_photo){{ asset($post->post_photo) }} @else {{ asset('frontend/images/default.jpg') }} @endif" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-success mb-3">{{ $post->category->category_name }}</span>
            <h2><a href="{{ route('website.post',$post->slug) }}">{{ $post->post_title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="@if($post->user->image){{ asset($post->user->image) }} @else {{ asset('frontend/images/user.png') }} @endif" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d,Y') }}</span>
            </div>
            <p>{{ Str::limit($post->post_description,100) }}</p>
            <p><a href="{{ route('website.post',$post->slug) }}">Read More</a></p>
            </div>
            </div>
            </div>
        @endforeach

    </div>

    <div class="row text-center pt-5 border-top">
        {{-- {{ $recentPost->links() }} --}}
    {{-- <div class="col-md-12">
    <div class="custom-pagination">
    <span>1</span>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <span>...</span>
    <a href="#">15</a>
    </div>
    </div> --}}
    </div>
    </div>
    </div>
    <div class="site-section bg-light">
    <div class="container">
    <div class="row align-items-stretch retro-layout">
        @foreach ($footerpostsLast as $post )
            <div class="col-md-5 order-md-2">
            <a href="{{ route('website.post',$post->slug) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ asset($post->post_photo) }}');">
            <span class="post-category text-white bg-danger">{{ $post->category->category_name }}</span>
            <div class="text">
            <h2>{{ $post->post_title }}</h2>
            <span>February 12, 2019</span>
            </div>
            </a>
            </div>
        @endforeach
    <div class="col-md-7">
        @foreach ($footerpostsFirst as $post )
            <a href="{{ route('website.post',$post->slug) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ asset($post->post_photo) }}');">
            <span class="post-category text-white bg-success">{{ $post->category->category_name }}</span>
            <div class="text text-sm">
            <h2>{{ $post->post_title }}</h2>
            <span>{{ $post->created_at->format('M d,Y') }}</span>
            </div>
            </a>
        @endforeach
        <div class="two-col d-block d-md-flex gap-4">
            @foreach ($footerpostsMiddle as $post )
                <a href="{{ route('website.post',$post->slug) }}" class="hentry v-height img-2 gradient " style="background-image: url('{{ asset($post->post_photo) }}');">
                <span class="post-category text-white bg-primary">{{ $post->category->category_name }}</span>
                <div class="text text-sm">
                <h2>{{ $post->post_title }}</h2>
                <span>{{ $post->created_at->format('M d,Y') }}</span>
                </div>
                </a>
            @endforeach
        </div>

    </div>
    </div>
    </div>
    </div>

    <div class="site-section bg-lightx">
    <div class="container">
    <div class="row justify-content-center text-center">
    <div class="col-md-5">
    <div class="subscribe-1 ">
    <h2>Subscribe to our newsletter</h2>
    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
    <form action="#" class="d-flex">
    <input type="text" class="form-control" placeholder="Enter your email address">
    <input type="submit" class="btn btn-primary" value="Subscribe">
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    <!-- footer area start -->
    @include('frontend.partials.footer')
    <!-- footer area end -->

    </div>


@endsection
