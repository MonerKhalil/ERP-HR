@if($PaginationData instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $PaginationData->total()>$PaginationData->perPage())
    <div class="Pagination--Numbers">
        <ul class="Pagination__List">
            @php
                $PartDir = ($PartsViewNum - 1) / 2 ;
            @endphp
            @if($PaginationData->currentPage() > 1)
                <li class="Pagination__Previous">
                    <a href="{{$PaginationData->withQueryString()->links()->elements[0][$PaginationData->currentPage() - 1]}}">Prev</a>
                </li>
            @endif
            @if($PaginationData->currentPage() - $PartDir > 1)
                <li class="Pagination__Number">
                    <a href="{{$PaginationData->withQueryString()->links()->elements[0][1]}}">1</a>
                </li>
                <li class="Pagination__Points">....</li>
            @endif
            @for($i = $PartDir ; $i >= 1 ; $i--)
                @if($PaginationData->currentPage() - $i >= 1)
                    <li class="Pagination__Number">
                        <a href="{{$PaginationData->withQueryString()->links()->elements[0][$PaginationData->currentPage() - $i]}}">{{$PaginationData->currentPage() - $i}}</a>
                    </li>
                @endif
            @endfor
            <li class="Pagination__Number">
                <a href="{{$PaginationData->withQueryString()->links()->elements[0][$PaginationData->currentPage()]}}" class="Current">{{$PaginationData->currentPage()}}</a>
            </li>
            @for($i = 1 ; $i <= $PartDir ; $i++)
                @if($PaginationData->currentPage() + $i <= $PaginationData->lastPage())
                    <li class="Pagination__Number">
                        <a href="{{$PaginationData->withQueryString()->links()->elements[0][$PaginationData->currentPage() + 1]}}">{{$PaginationData->currentPage() + $i}}</a>
                    </li>
                @endif
            @endfor
            @if($PaginationData->currentPage() + $PartDir < $PaginationData->lastPage())
                <li class="Pagination__Points">....</li>
                <li class="Pagination__Number">
                    <a href="{{$PaginationData->withQueryString()->links()->elements[0][$PaginationData->currentPage()]}}">{{$PaginationData->lastPage()}}</a>
                </li>
            @endif
            @if($PaginationData->currentPage() < $PaginationData->lastPage())
                <li class="Pagination__Next">
                    <a href="{{$PaginationData->withQueryString()->links()->elements[0][$PaginationData->currentPage() + 1]}}">Next</a>
                </li>
            @endif
        </ul>
    </div>
@endif

{{--
    $PaginationData : For All Page Data ,
    $PartsViewNum : For Detirmine Count of item we need view it between prev & next
--}}
