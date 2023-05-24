@extends('layouts.client')

@section('title')
    <title>Tag questions | Reddit</title>
@endsection


@section('content')
    <!-- Start Mail Content Area -->
    <div class="main-content-area ptb-100">
        <div class="container">
            <div class="row">
                @include('partial.__sidebar-left')


                <div class="col-lg-6">
                    <div class="middull-content">
                        <form class="aq-form">
                            @csrf
                            <i class="ri-search-line"></i>
                            <input type="text" class="form-control"
                                   placeholder="Have a question? Ask or enter a search">
                        </form>

                        <ul class="nav nav-tabs questions-tabs d-flex justify-content-between" id="myTab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="recent-questions-tab" data-bs-toggle="tab"
                                        data-bs-target="#recent-questions" type="button" role="tab"
                                        aria-controls="recent-questions" aria-selected="true">
                                    Recent Questions
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="recent-questions" role="tabpanel"
                                 aria-labelledby="recent-questions-tab">
                                @foreach($questions as $q)
                                    <x-question_card
                                        :id="$q->id"
                                        :title="$q->title"
                                        :slug="$q->slug"
                                        :topic="$q->topic->name"
                                        :user="$q->user->first_name. ' ' .$q->user->last_name"
                                        :username="$q->user->username"
                                        :excerpt="$q->excerpt"
                                        :tags="$q->tags->pluck('name')"
                                    ></x-question_card>
                                @endforeach
                                @include('partial.__pagination')
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



