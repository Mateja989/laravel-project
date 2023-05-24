@extends('layouts.client')

@section('title')
    <title>My following | Reddit</title>
@endsection


@section('topic')
    <x-topic_ddl action="/myfollowing"/>
@endsection

@section('content')
    <!-- Start Mail Content Area -->
    <div class="main-content-area ptb-100">
        <div class="container">
            <div class="row">
                @include('partial.__sidebar-left')

                <div class="col-lg-6">
                    <div class="middull-content">
                        <x-keyword action="/myfollowing"/>


                        <ul class="nav nav-tabs questions-tabs d-flex justify-content-between" id="myTab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="recent-questions-tab" data-bs-toggle="tab"
                                        data-bs-target="#recent-questions" type="button" role="tab"
                                        aria-controls="recent-questions" aria-selected="true">
                                    My followers`s questions
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="recent-questions" role="tabpanel"
                                 aria-labelledby="recent-questions-tab">
                                @forelse($questions as $q)
                                    <x-question_card
                                        :id="$q->id"
                                        :title="$q->title"
                                        :slug="$q->slug"
                                        :topic="$q->topic->name"
                                        :user="$q->user->first_name. ' ' .$q->user->last_name"
                                        :username="$q->user->username"
                                        :excerpt="$q->excerpt"
                                        :tags="$q->tags->pluck('name')"
                                        :avatar="$q->user->avatar"
                                        :like="$q->reactions->where('reaction',0)->count()"
                                        :dislike="$q->reactions->where('reaction',1)->count()"
                                    ></x-question_card>
                                @empty
                                    <h3 class="mt-5">No question.</h3>
                                @endforelse
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




