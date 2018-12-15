@if ($paginator->hasPages())
    <footer class="p-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="p-pagination__link--previous" href="">
                <span class="p-pagination__label">First page.</span>
            </a>
        @else
            <a class="p-pagination__link--previous" href="{{ $paginator->previousPageUrl() }}">
                <span class="p-pagination__label">Previous</span>
            </a>
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
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="p-pagination__link--next" href="{{ $paginator->nextPageUrl() }}">
                <span class="p-pagination__label">Next</span>
            </a>
        @else
            <a class="p-pagination__link--next" href="">
                <span class="p-pagination__label">No posts found.</span>
            </a>
        @endif
    </footer>
@endif
