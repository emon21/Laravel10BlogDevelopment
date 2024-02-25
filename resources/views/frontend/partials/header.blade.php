<header class="site-navbar" role="banner">
    <div class="container-fluid">
    <div class="row align-items-center">
    <div class="col-12 search-form-wrap js-search-form">
    <form method="get" action="#">
    <input type="text" id="s" class="form-control" placeholder="Search...">
    <button class="search-btn" type="submit"><span class="icon-search"></span></button>
    </form>
    </div>
    <div class="col-4 site-logo">
    <a href="{{ route('website') }}" class="text-black h2 mb-0">Mini Blog</a>
    </div>
    <div class="col-8 text-right">
    <nav class="site-navigation" role="navigation">
    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">

        @if (Auth::check())
            @if ($currentUser->role_as == 0)
                <img src="@if ($currentUser->image) {{ asset($currentUser->image) }} @else {{ asset('frontend/user/user.png') }} @endif"
                    class="img-fluid rounded-circle img-rounded" alt="" style="width:45px;height:45px;overflow:hidden">
                <li><a href="{{ route('home') }}" class="">User Dashboard</a></li>
            @endif
            @else
            <li><a href="{{ route('login') }}">Login Here</a></li>
        @endif


    <li class="{{ Route::is('website') ? 'active' : '' }}"><a href="{{ route('website') }}">Home</a></li>
    <li><a href="{{ route('website.blog') }}">Blog</a></li>
    <li><a href="{{ route('website.category.list') }}">Category</a></li>
    {{-- <li><a href="{{ route('website.taglist') }}">Tag</a></li> --}}
    <li class="{{ Route::is('website.about') ? 'active' : '' }}"><a href="{{ route('website.about') }}" >About US</a></li>
    <li><a href="{{ route('website.contact') }}">Contact US</a></li>
    @foreach ($categories as $category)
    <li><a href="{{ route('website.category',$category->category_slug) }}">{{ $category->category_name }}</a></li>
    @endforeach

    {{-- <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li> --}}
    <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span
        class="icon-search"></span></a>
</li>
    </ul>

    </nav>
    </div>
    </div>
    </div>
    </header>
