@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @foreach ($element as $page => $url)
                {{--  Use three dots when current page is greater than 2.  --}}
                @if ($paginator->currentPage() > 3 && $page === 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                {{--  Show active page else show the first and last two pages from current page.  --}}
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif

                {{--  Use three dots when current page is awasy from end.  --}}
                @if ($paginator->currentPage() < $paginator->total() - 3 && $page === $paginator->total() - 1)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
            @endforeach
        @endforeach
    </ul>
@endif
