@if($PaginationData->currentPage() >= 2 &&
                        $PaginationData->currentPage() <= $PaginationData->lastPage())
    <div class="Pagination--Numbers">
        <ul class="Pagination__List">
            @php
                $PartDir = ($PartsViewNum - 1) / 2 ;
            @endphp
            @if($PaginationData->currentPage() > 1)
                <li class="Pagination__Previous">
                    <a href="#">Prev</a>
                </li>
            @endif
            @if($PaginationData->currentPage() - $PartDir > 1)
                <li class="Pagination__Number">
                    <a href="#">1</a>
                </li>
                <li class="Pagination__Points">....</li>
            @endif
            @for($i = $PartDir ; $i >= 1 ; $i--)
                @if($PaginationData->currentPage() - $i >= 1)
                    <li class="Pagination__Number">
                        <a href="#">{{$PaginationData->currentPage() - $i}}</a>
                    </li>
                @endif
            @endfor
            <li class="Pagination__Number">
                <a href="#" class="Current">{{$PaginationData->currentPage()}}</a>
            </li>
            @for($i = 1 ; $i <= $PartDir ; $i++)
                @if($PaginationData->currentPage() + $i <= $PaginationData->lastPage())
                    <li class="Pagination__Number">
                        <a href="#">{{$PaginationData->currentPage() + $i}}</a>
                    </li>
                @endif
            @endfor
            @if($PaginationData->currentPage() + $PartDir < $PaginationData->lastPage())
                <li class="Pagination__Points">....</li>
                <li class="Pagination__Number">
                    <a href="#">{{$PaginationData->lastPage()}}</a>
                </li>
            @endif
            @if($PaginationData->currentPage() < $PaginationData->lastPage())
                <li class="Pagination__Next">
                    <a href="#">Next</a>
                </li>
            @endif
        </ul>
    </div>
@endif

{{--
    $PaginationData : For All Page Data ,
    $PartsViewNum : For Detirmine Count of item we need view it between prev & next
--}}
