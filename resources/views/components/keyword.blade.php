@props(['action'])
<form class="aq-form" action="{{ $action }}" method="get">
    @csrf
    <i class="ri-search-line"></i>
    <input type="text"
           class="form-control"
           placeholder="Have a question? Ask or enter a search"
           name="keyword"
           id = 'keyword'
           value="{{ request('keyword') }}"
    >
</form>
