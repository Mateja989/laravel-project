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
                    <div class="user-profile-area">
                        <div class="profile-content d-flex justify-content-between align-items-center">
                            <div class="profile-img">
                                <img src="{{ asset($user->profile) }}" alt="Image">
                                <h3>{{ $user->first_name." ".$user->last_name }}</h3>
                                <span>Member since {{ $user->created_at->diffForHumans() }}</span>
                                <span>Last seen this week</span>
                                <button class="followers-btn">{{ $user->myFollowers->count() }} Followers</button>
                                <button class="followers-btn">{{ $user->myFollowing->count() }} Following</button>
                            </div>

                            @if(auth()->id() == $user->id)
                                <div class="edit-btn">
                                    <a href="/profile/{{ $user->username }}/edit" class="default-btn">Edit profile</a>
                                </div>
                            @else
                                <div class="edit-btn">
                                    <a href="/profile/{{ $user->username }}/edit" class="default-btn">Follow user</a>
                                </div>
                            @endif

                        </div>

                        <div class="profile-achive">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <div class="single-achive">
                                        <h2>{{ $user->answers->count() }}</h2>
                                        <span>Answers</span>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="single-achive">
                                        <h2>{{ $user->questions->count() }}</h2>
                                        <span>Question</span>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="single-achive">
                                        <h2>124</h2>
                                        <span>Best answers</span>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="single-achive">
                                        <h2>2M</h2>
                                        <span>Reached</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="top-posts">
                            <div class="d-flex justify-content-between">
                                <h3>Questions</h3>
                                @if(session('status'))
                                    <p>{{ session('status') }}</p>
                                @endif
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="votes-tab" data-bs-toggle="tab" data-bs-target="#votes" type="button" role="tab" aria-controls="votes" aria-selected="false">Votes</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="view-all" role="tabpanel" aria-labelledby="view-all-tab">

                                    <ul>
                                        @forelse($user->questions as $question)
                                            <li class="d-flex justify-content-between">
                                                <div class="top-posts-list">
                                                    <i class="ri-chat-2-fill"></i>
                                                    <span class="count">{{ $question->answers->count() }}</span>
                                                    <span><a href="/questions/{{ $question->slug }}">{{ $question->title }}</a></span>
                                                </div>
                                                @if(auth()->id() == $question->user_id)
                                                    <div><span><a href="/questions/{{ $question->slug }}/edit">Edit</a></span></div>
                                                    <form method="POST" action="/questions/{{ $question->slug }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>Delete</button>
                                                    </form>
                                                @endif
                                            </li>

                                        @empty
                                            <h3>There haven`t been posted questions yet.</h3>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




