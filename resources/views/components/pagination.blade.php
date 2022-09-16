<div class="row mt-4">
    <div class="col-sm-6">
        <div>
            <p class="mb-sm-0">Apresentando {{$paginator->firstItem() ?? 0}} a {{$paginator->lastItem() ?? 0}} de {{$paginator->total()}} registros</p>
        </div>
    </div>
    <div class="col-sm-6">
        <ul class="pagination pagination-rounded justify-content-center justify-content-sm-end mb-sm-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span  class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if (
                            $page <= $paginator->currentPage() + $paginator->onEachSide &&
                            $page >= $paginator->currentPage() - $paginator->onEachSide
                        )
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a href="{{ $url }}" class="page-link">{{$page}}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a href="{{ $url }}" class="page-link">{{$page}}</a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span  class="page-link"><i class="mdi mdi-chevron-right"></i></span>
                </li>
            @endif
        </ul>
    </div>
</div>