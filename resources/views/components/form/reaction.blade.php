@props(['action','icon','id','name','like' => 0,'number','btn' => 'btn-like','count' => 0,'reaction' => 'like'])
<form>
    @csrf
    <input type="hidden" id="question" value="{{ $id }}" name="post"/>
    <input type="hidden" id="reaction" value="{{ $like }}" name="like"/>
    <button type="button" id="{{ $btn }}" class="like-unlink-count like">
        <i class="{{ $icon }}"></i>
        <span>{{ $count }}</span>
    </button>
</form>
