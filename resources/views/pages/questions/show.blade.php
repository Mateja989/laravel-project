@extends('layouts.client')

@section('title')
    <title> {{ $question->title }} | Reddit</title>
@endsection

@section('content')
    <!-- Start Mail Content Area -->
    <div class="main-content-area ptb-100">
        <div class="container">
            <div class="row">
                @include('partial.__sidebar-left')
                <div class="col-lg-9">
                    <div class="middull-content">
                        <div class="question-details-area">
                            <x-question
                                :id="$question->id"
                                :title="$question->title"
                                :slug="$question->slug"
                                :topic="$question->topic->name"
                                :user="$question->user->first_name. ' ' .$question->user->last_name"
                                :username="$question->user->username"
                                :body="$question->body"
                                :excerpt="$question->excerpt"
                                :avatar="$question->user->avatar"
                            >
                            </x-question>

                            <ul class="answerss d-flex justify-content-between align-items-center">
                                <li>
                                    <h3>{{ $question->answers->count() }} Answers</h3>
                                </li>
                            </ul>
                            <div id="answers-area">
                                @forelse($question->answers as $answer)
                                    <x-answer
                                        :id="$answer->id"
                                        :body="$answer->body"
                                        :username="$answer->author->username"
                                        :date="$answer->created_at->diffForHumans()"
                                        :avatar="$answer->author->avatar"
                                    >
                                    </x-answer>
                                @empty
                                    <p>Answers for this question has not exist yet</p>
                                @endforelse
                                <div id="message-area">

                                </div>
                            </div>
                            @if(auth()->check())
                                <form class="your-answer-form" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <h3>Your Answer</h3>
                                    </div>
                                    <input type="hidden" value="{{ $question->id }}" id="question">
                                    <x-form.textarea name="body"/>
                                    <div class="form-group" id="button">
                                        <button type="button" id="btn-answer" class="default-btn">Post your answer</button>
                                    </div>
                                </form>
                            @else
                                <p>Only register member can ask on the question.Please
                                    <a href="/register">register</a>
                                    or
                                    <a href="/login">log in</a> now.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



