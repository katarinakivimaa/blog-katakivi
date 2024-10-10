@if ($paginator->hasPages())
<div class="join">
         {{-- Previous Page Link --}}
         @if ($paginator->onFirstPage())
         <button aria-hidden="true" class="disabled" aria-disabled="true"  aria-label="@lang('pagination.previous')" aria-hidden="true" class="join-item btn btn-disabled">«</button>
     @else
         <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="join-item btn">«</a>
     @endif

     {{-- Pagination Elements --}}
     @foreach ($elements as $element)
         {{-- "Three Dots" Separator --}}
         @if (is_string($element))
         <button aria-hidden="true" class="disabled" aria-disabled="true"  aria-label="@lang('pagination.previous')" aria-hidden="true" class="join-item btn">{{ $element }}</button>
         @endif

         {{-- Array Of Links --}}
         @if (is_array($element))
             @foreach ($element as $page => $url)
                 @if ($page == $paginator->currentPage())
                 <button class="join-item btn btn-active">{{ $page }}</button>
                 @else
                    <a href="{{ $url }}">{{ $page }}</a>
                 @endif
             @endforeach
         @endif
     @endforeach

     {{-- Next Page Link --}}
     @if ($paginator->hasMorePages())
     <button href="{{ $paginator->nextPageUrl() }}"  rel="next" class="join-item btn">{{ $page }}»</button>
     @else
     <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="join-item btn btn-disabled"></a>
     @endif
</div>
    
@endif
