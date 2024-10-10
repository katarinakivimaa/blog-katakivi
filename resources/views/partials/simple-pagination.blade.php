@if ($paginator->hasPages())
    <nav>
        <ul class="pagination my-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <button class="disabled btn-disabled join-item btn btn-outline" aria-disabled="true">Previous page</span></button>
            @else
    
            <a class="join-item btn btn-outline" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="join-item btn">Previous Page</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <a class="join-item btn btn-outline" href="{{ $paginator->nextPageUrl() }}" rel="prev" aria-label="@lang('pagination.next')" class="join-item btn">Next Page</a>
            
            @else
            <button class="disabled btn-disabled join-item btn btn-outline" aria-disabled="true">Next page</span></button>
            @endif
        </ul>
    </nav>
@endif
