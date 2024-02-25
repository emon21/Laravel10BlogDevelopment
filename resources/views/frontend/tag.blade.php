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

    <div class="py-5 bg-light">
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <span>Tag</span>
    <h3>{{ $tag->name }} ( {{ $posts->count() }} )</h3>
    @if ($tag->description)
    <p>{{ $tag->description }}</p>
    @endif
    <p></p>
    </div>
    </div>
    </div>
    </div>
    <div class="site-section bg-white">
    <div class="container">
    <div class="row">
        @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="col-lg-4 mb-4">
            <div class="entry2">


            <a href="{{ route('website.post',$post->slug) }}"><img src="@if ($post->post_photo) {{ asset($post->post_photo) }} @else {{ asset('frontend/images/default.jpg') }} @endif" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{ $post->category->category_name }}</span>
            <h2><a href="{{ route('website.post',$post->slug) }}">{{ $post->post_title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
            <figure class="author-figure mb-0 mr-3 float-left"><img src="@if($post->user->image){{ asset($post->user->image) }} @else {{ asset('frontend/images/user.png') }} @endif" alt="Image" class="img-fluid"></figure>
            <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d,Y') }}</span>
            </div>
            <p>{{ $post->post_description }}</p>
            <p><a href="{{ route('website.post',$post->slug) }}">Read More</a></p>
            </div>
            </div>
            </div>
        @endforeach

        @else
        <span class="text-danger text-center py-4 mb-4"><strong>Sorry !!</strong>,No Data Found</span>

        @endif




    {{-- <div class="row text-center pt-5 border-top">
    <div class="col-md-12">
    <div class="custom-pagination">
    <span>1</span>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <span>...</span>
    <a href="#">15</a>
    </div>
    </div>
    </div> --}}

    </div>
    </div>
    <div class="site-footer">
    <div class="container">
    <div class="row mb-5">
    <div class="col-md-4">
    <h3 class="footer-heading mb-4">About Us</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
    </div>
    <div class="col-md-3 ml-auto">

    <ul class="list-unstyled float-left mr-5">
    <li><a href="#">About Us</a></li>
    <li><a href="#">Advertise</a></li>
    <li><a href="#">Careers</a></li>
    <li><a href="#">Subscribes</a></li>
    </ul>
    <ul class="list-unstyled float-left">
    <li><a href="#">Travel</a></li>
    <li><a href="#">Lifestyle</a></li>
    <li><a href="#">Sports</a></li>
    <li><a href="#">Nature</a></li>
    </ul>
    </div>
    <div class="col-md-4">
    <div>
    <h3 class="footer-heading mb-4">Connect With Us</h3>
    <p>
    <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
    <a href="#"><span class="icon-twitter p-2"></span></a>
    <a href="#"><span class="icon-instagram p-2"></span></a>
    <a href="#"><span class="icon-rss p-2"></span></a>
    <a href="#"><span class="icon-envelope p-2"></span></a>
    </p>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-12 text-center">
    <p>

    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>

    </p>
    </div>
    </div>
    </div>
    </div>
    </div>



@endsection
