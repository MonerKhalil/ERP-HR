@if($PaginationData->currentPage() >= 2 &&
                        $PaginationData->currentPage() <= $PaginationData->lastPage())
    <div class="Pagination--Select">
        <div class="Pagination__List">
            <span class="Pagination__PageWord">@lang("page")</span>
            <form class="Form Form--Dark">
                <div class="Form__Group">
                    <div class="Form__Input">
                        <div class="Input__Area">
                            <input id="PageNumber" class="Input__Field" type="number"
                                   min="1" max="{{$PaginationData->lastPage()}}"
                                   name="PageNumber" value="{{$PaginationData->currentPage()}}">
                        </div>
                    </div>
                </div>
            </form>
            <span class="Pagination__PageOf">@lang("ofPage") {{$PaginationData->lastPage()}}</span>
        </div>
    </div>
@endif

{{--
    $PaginationData : For All Page Data
--}}
