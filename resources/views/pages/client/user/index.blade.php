@extends('layouts.client')

@section('title')
    <title>Users | Reddit</title>
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
                                <a href="index.html">
                                    <i class="ri-home-8-line"></i>
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                User
                            </li>
                        </ul>

                        <form class="aq-form">
                            <i class="ri-search-line"></i>
                            <input type="text" class="form-control" placeholder="Looking for specific user?">
                            <button class="aq-btn">
                                Search
                            </button>
                        </form>

                        <div class="wew-user-area">
                            <div class="row">
                                <div class="mb-5" id="message-follow">

                                </div>
                                @foreach($users as $user)
                                    @if(auth()->check() && $user->id == auth()->user()->id)
                                        @continue
                                    @endif
                                    <x-user_card :user="$user"></x-user_card>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



