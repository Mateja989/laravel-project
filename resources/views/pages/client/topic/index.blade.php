@extends('layouts.client')

@section('title')
    <title>Home | Reddit</title>
@endsection


@section('content')
    <!-- Start Mail Content Area -->
    <div class="main-content-area ptb-100">
        <div class="container">
            <div class="row">
                @include('partial.__sidebar-left')
                <div class="col-lg-9">
                    <div class="middull-content">
                        <ul class="page-nish">
                            <li>
                                <a href="/">
                                    <i class="ri-home-8-line"></i>
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                Topics
                            </li>
                        </ul>



                        <div class="row justify-content-center">

                            @foreach($topics as $topic)
                            <div class="col-xl-4 col-sm-6">
                                <div class="single-communities-box mb-0">
                                    <img src="{{ asset($topic->icon) }}" alt="Image">
                                    <h3>
                                        {{ $topic->name }}
                                    </h3>
                                    <ul class="d-flex justify-content-between">

                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



