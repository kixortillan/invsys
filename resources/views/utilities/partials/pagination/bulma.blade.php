<nav class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <a class="pagination-previous is-disabled">Previous</span></a>
    @else
        <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">Previous</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">Next Page</a>
    @else
        <a class="pagination-next is-disabled">Next Page</a>
    @endif

    
    <ul class="pagination-list">
        @if($paginator->total() > 0)
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">{{ $element }}&hellip;</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
    </ul>
</nav>