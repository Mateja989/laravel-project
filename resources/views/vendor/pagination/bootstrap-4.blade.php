@if ($paginator->hasPages())
    <nav class="pagination-area">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled next page-numbers" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="ri-arrow-left-line"></i>
                </li>
            @else
                <li class="page-item">
                    <a class="next page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="ri-arrow-left-line"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers" rel="next" aria-label="@lang('pagination.next')">
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </li>
            @else
                <li class=" disabled next page-numbers" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="ri-arrow-right-line"></i>
                </li>
            @endif
        </ul>
    </nav>
@endif
