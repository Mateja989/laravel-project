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

                <div class="col-lg-6">
                    <div class="middull-content">
                        <ul class="page-nish">
                            <li>
                                <a href="/">
                                    <i class="ri-home-8-line"></i>
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                Tags
                            </li>
                        </ul>


                        <div class="tag-content">
                            <div class="row justify-content-center">
                                @foreach($tags as $t)
                                    <div class="col-lg-6 col-md-6">
                                    <div class="single-tags-box">
                                        <ul class="tag-mark">
                                            <li>
                                                <i class="ri-price-tag-3-line"></i>
                                                <span>{{ $t->name }}</span>
                                            </li>
                                        </ul>
                                        <p>{{ $t->description }}</p>
                                        <ul class="tag-btn d-flex justify-content-between">
                                            <li>
                                                <button>
                                                    <a class="default-btn active" href="/tags/{{ $t->name }}">Questions</a>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3">
                    @include('partial.__sidebar-right')
                </div>
            </div>
        </div>
    </div>
@endsection




