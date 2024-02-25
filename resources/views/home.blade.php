@extends('layouts.user')

@section('content')
    <div class="mt-2">
        <div class="d-flex justify-content-between gap-2">
            @include('frontend.user.partials.sidebar')
            <div class="col-sm-10 bg-light">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fa fa-list" aria-hidden="true"></i> Post List</h3>
                            <div class="card-title text-center text-danger text-bold"><i class="fa fa-life-ring"
                                    aria-hidden="true"></i>
                                User Total Post : 10</div>
                            <a href="" class="btn btn-primary">Go Back User List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center pt-2 text-success">Well Come To User DashBoard</h4>
                    </div>
                    <div class="card-footer">
                        see Here
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
