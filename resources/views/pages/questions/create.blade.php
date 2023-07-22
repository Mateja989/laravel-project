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
                        <form class="your-answer-form" method="POST" action="/question/create">

                            @csrf
                            <div class="form-group">
                                <h3>Create a questions</h3>
                            </div>

                            <x-form.input name="title" margin="mb-3"/>
                            <x-form.input name="excerpt" margin="mb-3"/>
                            <x-form.input name="slug" margin="mb-3"/>


                            <div class="form-group">
                                <label for="topic_id">Topics</label>
                                <select class="form-select form-control" name="topic_id" aria-label="Default select example">
                                    <option selected>Select topics</option>
                                    @foreach($topics as $t)
                                        <option
                                            value="{{ $t->id }}"
                                            {{ old('topic_id') == $t->id ? 'selected' : '' }}
                                        >
                                            {{ $t->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-form.error name="topic_id"/>
                            </div>


                            <div class="form-group">
                                <label for="tag_id">Tags</label>
                                    @foreach($tags as $t)
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   value="{{ $t->id }}"
                                                   name="tags[]"
                                                   id="{{ $t->name }}"
                                            />
                                            <label class="form-check-label" for="{{ $t->name }}">
                                                {{ $t->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                <x-form.error name="tags"/>
                            </div>

                            <x-form.textarea name="body"/>


                            <div class="form-group">
                                <button type="submit" class="default-btn">Post your question</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



