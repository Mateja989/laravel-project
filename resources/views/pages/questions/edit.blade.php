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
                        <form class="your-answer-form" method="POST" action="/question/{{ $question->slug }}/edit">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <h3>Edit question: {{ $question->title }}</h3>
                            </div>

                            <x-form.edit_input name="title" :value="old('title',$question->title)"/>
                            <x-form.edit_input name="excerpt" :value="old('excerpt',$question->excerpt)"/>
                            <x-form.edit_input name="slug" :value="old('slug',$question->slug)"/>


                            <div class="form-group">
                                <label for="category_id">Category</label>

                                <select class="form-select form-control" name="topic_id" aria-label="Default select example">
                                    <option selected>Selete topics</option>
                                    @foreach($topics as $t)
                                        <option
                                            value="{{ $t->id }}"
                                            {{ old('topic_id', $question->topic_id) == $t->id ? 'selected' : '' }}
                                        >{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                <x-form.error name="topic_id"/>
                            </div>

                            <x-form.textarea name="body">
                                {{ old('body', $question->body) }}
                            </x-form.textarea>

                            <div class="form-group">
                                <button type="submit" class="default-btn">Post your answer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



