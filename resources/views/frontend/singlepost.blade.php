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
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ asset($post->post_photo) }});">
   <div class="container">
      <div class="row same-height justify-content-center">
         <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
               <span class="post-category text-white bg-success mb-3">{{ $post->category->category_name }}</span>
               <h1 class="mb-4"><a href="javascript:void()">{{ $post->post_title }}</a></h1>
               <div class="post-meta align-items-center text-center">
                  <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="@if($post->user->image){{ asset($post->user->image) }} @else {{ asset('frontend/images/user.png') }} @endif" alt="Image" class="img-fluid"></figure>
                  <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                  <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d,Y') }}</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="site-section py-lg">
   <div class="container">
      <div class="row blog-entries element-animate">
         <div class="col-md-12 col-lg-8 main-content">
            <div class="post-content-body">
               <p>{{ $post->post_description }} </p>
               <div class="row mb-5 mt-5">
                  <div class="col-md-12 mb-4">
                     <img src="@if ($post->post_photo) {{ asset($post->post_photo) }} @else
                        {{ asset('frontend/images/default.jpg') }} @endif" alt="Image placeholder" class="img-fluid rounded">
                  </div>
                  <div class="col-md-6 mb-4">
                     <img src="@if ($post->post_photo) {{ asset($post->post_photo) }} @else
                        {{ asset('frontend/images/default.jpg') }} @endif" alt="Image placeholder" class="img-fluid rounded">
                  </div>
                  <div class="col-md-6 mb-4">
                     <img src="@if ($post->post_photo) {{ asset($post->post_photo) }} @else
                        {{ asset('frontend/images/default.jpg') }} @endif" alt="Image placeholder" class="img-fluid rounded">
                  </div>
               </div>
               <p>{{ $post->post_description }} </p>
            </div>
            <div class="pt-5">
               <p>
                  Categories: <a href="#">{{ $post->category->category_name }}</a>
                  @if ($post->tags()->count() >0)
                    Tags:
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('website.tag',['slug' => $tag->slug]) }}">{{ $tag->name }}</a>,
                        @endforeach
                  @endif
               </p>
            </div>
            <div class="pt-5">
               <h3 class="mb-5">Comments ( {{ $post->comments->count() }} )</h3>
               @if ($post->comments->count() > 0)
                    @foreach ($post->comments as $comment)
                            <ul class="comment-list">
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="@if ($comment->user->image) {{ asset($comment->user->image) }} @else
                                        {{ asset('frontend/images/user.png') }} @endif"
                                        alt="Image placeholder">
                                    </div>

                                    <div class="comment-body">
                                        <div class="row">
                                            <h3>{{ $comment->user->name }}</h3>

                                </div>
                                <div class="meta">
                                     @if ($comment->created_at)
                                    {{ $comment->created_at->format('M d Y H:i:s a') }} {{ $comment->created_at->diffForHumans() }}
                                    @endif
                                </div>
                                    <p>{{ $comment->message }}</p>
                                    @if (Auth::check())
                                            @if ($comment->user_id == Auth::user()->id)
                                            <form action="{{ route('comment.delete',$comment->id) }}"method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded mr-1 text-danger"><i
                                                        class="fa fa-trash-o"
                                                        aria-hidden="true"></i>Delete</button>
                                            </form>
                                        @endif

                                    @endif
                                </div>
                                </li>
                            </ul>
                    @endforeach
               @endif



               @if (Auth::check())

               <ul class="comment-list">
                   <li class="comment">
                       <div class="vcard">
                           <img src="@if ($post->user->post_photo) {{ asset($post->user->post_photo) }} @else
                         {{ asset('frontend/images/user.png') }} @endif"
                               alt="Image placeholder">
                       </div>
                       <div class="comment-body">
                           <h3>{{ Auth::user()->name }}</h3>
                           <form action="{{ route('userComment') }}" method="post"
                               class="p-2 bg-light">
                               @csrf
                               <input type="hidden" name="post_id"
                                   value="{{ $post->id }}">
                               <div class="form-group">
                                   {{-- <label for="message">Message</label> --}}
                                   <textarea name="comment" id="message" rows="5" class="form-control"></textarea>
                               </div>
                               <div class="form-group">
                                   <input type="submit" value="Post Comment"
                                       class="btn btn-primary">
                               </div>
                           </form>
                       </div>
                   </li>
               </ul>
               @else

                <div class="col-md-8 d-flex align-item-center border border-primary text-light rounded py-3">

                    <div class="d-flex flex-column">
                    <span class="alert alert-danger text-dark">Sorry Do Not Comment This Blog Please Login Here</span>
                </div>
                <a href="{{ route('login') }}" class="btn btn-success mt-4">
                    <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            </div>

               @endif

               </div>
            </div>
            <div class="col-md-12 col-lg-4 sidebar">
               <div class="sidebar-box search-form-wrap">
                  <form action="#" class="search-form">
                     <div class="form-group">
                        <span class="icon fa fa-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                     </div>
                  </form>
               </div>
               <div class="sidebar-box">
                  <div class="bio text-center">
                     <img src="@if($post->user->image){{ asset($post->user->image) }} @else {{ asset('frontend/images/user.png') }} @endif" alt="Image Placeholder" class="img-fluid mb-5">
                     <div class="bio-body">
                        <h2>{{ $post->user->name }}</h2>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                        <p>
                            <a href="{{ route('home') }}" class="btn btn-primary btn-sm rounded px-4 py-2">User Profile</a>
                        </p>
                        <p class="social">
                           <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                           <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                           <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                           <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="sidebar-box">
                  <h3 class="heading">Popular Posts</h3>
                  <div class="post-entry-sidebar">
                     <ul>
                        @foreach ($posts as $post)
                        <li>
                           <a href>
                              <img src="@if($post->post_photo){{ asset($post->post_photo) }} @else {{ asset('frontend/images/default.jpg') }} @endif" alt="Image placeholder" class="mr-4">
                              <div class="text">
                                 <h4>{{ $post->post_title }}</h4>
                                 <div class="post-meta">
                                    <span class="mr-2">{{ $post->created_at->format('M d,Y') }} </span>
                                 </div>
                              </div>
                           </a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               <div class="sidebar-box">
                  <h3 class="heading">Categories</h3>
                  <ul class="categories">
                     @foreach ($categoryList as $category)
                     <li><a href="{{ route('website.category',$category->category_slug) }}">{{ $category->category_name }} <span>( {{ $category->posts_count }} )</span></a></li>
                     @endforeach
                  </ul>

               </div>
               <div class="sidebar-box">
                  <h3 class="heading">Tags</h3>
                  <ul class="tags">
                     @foreach ($tags as $tag)
                     <li><a href="{{ route('website.tag',['slug' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
</section>
<div class="site-section bg-light">
<div class="container">
<div class="row mb-5">
<div class="col-12">
<h2>More Related Posts</h2>
</div>
</div>
<div class="row align-items-stretch retro-layout">
@foreach ($relatedpostlt as $post)
<div class="col-md-5 order-md-2">
<a href="{{ route('website.post',$post->slug) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ asset($post->post_photo) }}');">
<span class="post-category text-white bg-danger">{{ $post->category->category_name }}</span>
<div class="text">
<h2>{{ $post->post_title }}</h2>
<span>{{ $post->created_at->format('M d,Y') }}</span>
</div>
</a>
</div>
@endforeach
<div class="col-md-7">
@foreach ($relatedpostft as $post)
<a href="{{ route('website.post',$post->slug) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ asset($post->post_photo) }}');">
<span class="post-category text-white bg-success">{{ $post->category->category_name }}</span>
<div class="text text-sm">
<h2>{{ $post->post_title }}</h2>
<span>{{ $post->created_at->format('M d,Y') }}</span>
</div>
</a>
@endforeach
<div class="two-col d-block d-md-flex justify-content-between">
@foreach ($relatedpostml as $post)
<a href="{{ route('website.post',$post->slug) }}" class="hentry v-height img-2 gradient" style="background-image: url('{{ asset($post->post_photo) }}');">
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
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"8478ec1ab9d24ea1","b":1,"version":"2024.1.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
<!-- Mirrored from preview.colorlib.com/theme/miniblog/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jan 2024 18:24:14 GMT -->
</html>
@endsection
