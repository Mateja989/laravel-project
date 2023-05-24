@props(['action'])
<div class="right-siderbar-common">
    <div class="category">
        <h3>
            <i class="ri-list-unordered"></i>
            Topics
        </h3>
        <form
            method="get"
            action="{{ $action }}" >
            @csrf
            <select class="form-select" id="topic-ddl" name="topic" aria-label="Default select example">
                <option value="0" selected>Select topic</option>
                @foreach($topics as $topic)
                    <option value="{{ $topic->slug }}">{{ $topic->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>

