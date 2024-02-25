@extends('frontend.layouts.frontend_master')
@section('title', 'Category List')
@section('content')
<!--header area start-->
@include('frontend.partials.header');
<!--header area end-->
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span></span>
                    <h2>All Category</h2>
                    <h4>Category : {{ $categoryList->count() }}</h4>
                    <p class="bold">Total Posts : {{ $posts->count() }}</p>
                    <p>All Skills of Post List into Category</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($categoryList as $list)
                    <div class="col-md-4  order-md-2">
                        <div class="bg-warning rounded">
                            <a href="{{ route('website.category', $list->category_slug) }}" class="hentry"
                                style="height:260px;margin-bottom: 20px;text-align: center;">
                                <span class="post-category text-white bg-danger py-2 text-center"
                                    style="margin-top: 110px;">{{ $list->category_name }} ( {{ $list->posts_count }}
                                    )</span>
                                <div class="text-center text-white py-2">
                                    <span>{{ $list->created_at->format('M d, Y') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection
