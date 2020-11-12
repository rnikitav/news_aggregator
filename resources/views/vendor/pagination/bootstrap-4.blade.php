@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
{{--                    <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
                    <div class="page-link btn_mange_pagging noBg" aria-hidden="true">
                        <i class="fa fa-long-arrow-left"></i>&nbsp; Previous
                    </div>

                </li>
            @else
                <li class="page-item">
                    <a class="page-link btn_mange_pagging" href="{{ $paginator->previousPageUrl() }}"
                       rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-long-arrow-left"></i>&nbsp; Previous</a>
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
                            <li class="page-item active" aria-current="page">
                                <span class="noHover">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item"><a class="btn_pagging" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link btn_mange_pagging" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <div class="page-link btn_mange_pagging noBg" aria-hidden="true">
                        Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;
                    </div>
{{--                    <span class="page-link" aria-hidden="true">&rsaquo;</span>--}}
                </li>
            @endif
        </ul>
    </nav>
@endif
