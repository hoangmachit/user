@if ($paginator->hasPages())
    <style>
        .render-paginate {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .pagination .page-item .page-link {
            font-size: 14px;
            color: #000;
            line-height: 1;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .pagination .page-item.active .page-link {
            background: #000;
            color: #Fff;
            border-color: #000;
        }

        .page-link:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, .25)
        }

        .page-item:first-child .page-link {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .page-item:last-child .page-link {
            border-bottom-right-radius: 3px;
            border-top-right-radius: 3px;
        }
    </style>
    <nav aria-label="navigation pt-1 pb-1">
        <ul class="pagination justify-content-end mb-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                </li>
            @endif
        </ul>
@endif
