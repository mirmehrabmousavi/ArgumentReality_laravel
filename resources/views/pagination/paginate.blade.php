<!-- Pagination -->
@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <ul class="pagination p-center">
                @if ($paginator->onFirstPage())
                    <li></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{$paginator->previousPageUrl()}}" aria-label="Previous">
                            <span class="ti-arrow-right"></span>
                            <span class="sr-only">قبل</span>
                        </a>
                    </li>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item"><a class="page-link" href="#">{{$element}}</a></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link" href="#">{{$page}}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{$page}}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <span class="ti-arrow-left"></span>
                            <span class="sr-only">بعد</span>
                        </a>
                    </li>
                @else
                    <li></li>
                @endif
            </ul>
        </div>
    </div>
@endif
