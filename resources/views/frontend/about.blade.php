@extends('frontend.layouts.frontend_master')
@section('title', 'About')
{{-- @section('styles')
    <link rel="shortcut icon" href="{{ asset($setting->site_favicon) }}">
@endsection --}}
@section('content')


<!--header area start-->
@include('frontend.partials.header');
<!--header area end-->

    <div class="py-5 bg-light">
        <div class="container">

            <div class="d-flex mt-4 justify-content-between">
                <div class="col-md-6">
                    <h4> {{ $user->name }}</h4>
                    <p class="text-justify"> {{ $user->description }}</p>
                </div>
                <div class="col-md-5 m-0">
                    <img src="@if ($user->image) {{ asset($user->image) }} @else {{  asset('frontend/images/user.png') }} @endif"
                        alt="Image placeholder" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-5 text-center">
                    <h2>Meet The Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus commodi blanditiis, soluta magnam
                        atque laborum ex qui recusandae</p>
                </div>
            </div>
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-md-6 col-lg-4 text-center border">

                        <div class="m-5">
                            <img src="@if ($team->team_img) {{ asset($team->team_img) }} @else
                        {{ asset('backend/user/user.png') }} @endif"
                                alt="Image" class="img-fluid rounded-circle mb-4" style="width: 150px;height: 150px;">

                            <h2 class="mb-3 h5">{{ $team->team_name }}</h2>
                            <p>{{ $team->designation }}</p>
                            {{ $team->team_deasc }}

                            <p class="mt-5">
                                <a href="#" class="bg-primary text-light rounded-circle p-3">
                                    <span class="icon-facebook"></span></a>
                                <a href="#" class="bg-info text-light rounded-circle p-3">
                                    <span class="icon-twitter"></span></a>
                                <a href="#" class="bg-primary text-light rounded-circle p-3">
                                    <span class="icon-linkedin"></span></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <section class="gradient-custom">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="text-center mb-4 pb-2">
                        <i class="fas fa-quote-left fa-3x text-white"></i>
                    </div>

                    <div class="card">
                        <div class="card-body px-4 py-5">
                            <!-- Carousel wrapper -->
                            <div id="carouselDarkVariant" class="carousel slide carousel-dark" data-mdb-ride="carousel">
                                <!-- Indicators -->
                                <div class="carousel-indicators mb-0">
                                    <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active"
                                        aria-current="true" aria-label="Slide 1"></button>
                                    <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1"
                                        aria-label="Slide 1"></button>
                                    <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2"
                                        aria-label="Slide 1"></button>
                                </div>

                                <!-- Inner -->
                                <div class="carousel-inner pb-5">
                                    <!-- Single item -->
                                    <div class="carousel-item active">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0" alt="woman avatar"
                                                            width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">Maria Smantha - Web Developer</h4>
                                                        <p class="mb-0 pb-3">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A
                                                            aliquam amet animi blanditiis consequatur debitis dicta
                                                            distinctio, enim error eum iste libero modi nam natus
                                                            perferendis possimus quasi sint sit tempora voluptatem. Est,
                                                            exercitationem id ipsa ipsum laboriosam perferendis.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single item -->
                                    <div class="carousel-item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0" alt="woman avatar"
                                                            width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">Lisa Cudrow - Graphic Designer</h4>
                                                        <p class="mb-0 pb-3">
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                            accusantium doloremque laudantium, totam rem aperiam, eaque
                                                            ipsa quae ab illo inventore veritatis et quasi architecto
                                                            beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                            quia voluptas sit aspernatur.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single item -->
                                    <div class="carousel-item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0" alt="woman avatar"
                                                            width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">John Smith - Marketing Specialist</h4>
                                                        <p class="mb-0 pb-3">
                                                            At vero eos et accusamus et iusto odio dignissimos qui
                                                            blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                            dolores et quas molestias excepturi sint occaecati cupiditate
                                                            non provident, similique sunt in culpa qui officia mollitia
                                                            animi id laborum et dolorum fuga.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Inner -->

                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant"
                                    data-mdb-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- Carousel wrapper -->
                        </div>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <i class="fas fa-quote-right fa-3x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
