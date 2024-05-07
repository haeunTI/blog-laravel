@if($paginator->hasPages())
<ul class="pagination clearfix">
    {{-- Previous   Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <a href="#"><i class="fas fa-angle-left"></i></a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-left"></i></a>
        </li>
    @endif

    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><a href="#">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active" aria-current="page"><a href="{{ $url }}" class="current">{{ $page }}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-angle-right"></i> </a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true">
            <a href="#"><i class="fas fa-angle-right"></i></a>
        </li>
    @endif
   
</ul>
@endif
