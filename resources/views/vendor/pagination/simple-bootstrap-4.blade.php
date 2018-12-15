@if ($paginator->hasPages())
    <footer class="p-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="p-pagination__link--previous" href="">
                <span class="p-pagination__label">First page</span>
            </a>
        @else
            <a class="p-pagination__link--previous" href="{{ $paginator->previousPageUrl() }}">
                <span class="p-pagination__label">Previous</span>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="p-pagination__link--next" href="{{ $paginator->nextPageUrl() }}">
                <span class="p-pagination__label">Next</span>
            </a>
        @else
            <a class="p-pagination__link--next" href="">
                <span class="p-pagination__label">Last page</span>
            </a>
        @endif
    </footer>
    <br />
@endif
