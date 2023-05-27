@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewEOFs") ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => __("titleViewUsers")
                ])
            </div>
            <div class="ViewUsers__Content">
                <div class="Container--MainContent">
                    <div class="MessageProcessContainer">
                        @include("System.Components.messageProcess")
                    </div>
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewUsers__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF" action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx" action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="Card__InnerGroup">
                                            <div class="Card__Inner py1">
                                                <div class="Table__Head">
                                                    <div class="Card__ToolsGroup">
                                                        <div class="Card__Tools Table__BulkTools">
                                                                                                                        @include("System.Components.bulkAction" , [
                                                                                                                            "Options" => [ [
                                                                                                                                "Label" => __("print") , "Action" => "#" , "Method" => "B"
                                                                                                                            ] , [
                                                                                                                                "Label" => __("normalDelete")
                                                                                                                                , "Action" => route("users.multi.delete")
                                                                                                                                , "Method" => "delete"
                                                                                                                            ] ]
                                                                                                                        ])
                                                        </div>
                                                        <div class="Card__Tools Card__SearchTools">
                                                            <ul class="SearchTools">
                                                                <li title="Filter">
                                                                    <i class="OpenPopup material-icons IconClick SearchTools__FilterIcon"
                                                                       data-popUp="SearchAbout">filter_list
                                                                    </i>
                                                                </li>
                                                                <li>
                                                                    <span class="SearchTools__Separate"></span>
                                                                </li>
                                                                {{--                                                                <li class="Table__PrintMenu">--}}
                                                                {{--                                                                    <i class="material-icons IconClick PrintMenu__Button"--}}
                                                                {{--                                                                       title="Print">print</i>--}}
                                                                {{--                                                                    <div class="Dropdown PrintMenu__Menu">--}}
                                                                {{--                                                                        <ul class="Dropdown__Content">--}}
                                                                {{--                                                                            <li class="Dropdown__Item">--}}
                                                                {{--                                                                                <a href="javascript:document.PrintAllTablePDF.submit()">--}}
                                                                {{--                                                                                    @lang("printTablePDFFile")--}}
                                                                {{--                                                                                </a>--}}
                                                                {{--                                                                            </li>--}}
                                                                {{--                                                                            <li class="Dropdown__Item">--}}
                                                                {{--                                                                                <a href="javascript:document.PrintAllTableXlsx.submit()">--}}
                                                                {{--                                                                                    @lang("printTableXlsxFile")--}}
                                                                {{--                                                                                </a>--}}
                                                                {{--                                                                            </li>--}}
                                                                {{--                                                                        </ul>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </li>--}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($data) > 0)
                                                <div class="Card__Inner p0">
                                                    <div class="Table__ContentTable">
                                                        <div class="Table__Table">
                                                            <div class="Item HeaderList">
                                                                <div class="Item__Col Item__Col--Check">
                                                                    <input id="ItemRow_Main" class="CheckBoxItem"
                                                                           type="checkbox" hidden>
                                                                    <label for="ItemRow_Main" class="CheckBoxRow">
                                                                        <i class="material-icons ">
                                                                            check_small
                                                                        </i>
                                                                    </label>
                                                                </div>
                                                                <div class="Item__Col">#</div>
                                                                <div class="Item__Col"><span>@lang("employee id")</span></div>
                                                                <div class="Item__Col"><span>@lang("EOS reason")</span></div>
                                                                <div class="Item__Col"><span>@lang("EOS date")</span></div>
                                                                <div class="Item__Col"><span>@lang("EOS finish date")</span></div>
                                                            </div>
                                                            @foreach($data as $item)
                                                                <div class="Item DataItem">
                                                                    <div class="Item__Col Item__Col--Check">
                                                                        <input id="ItemRow_{{$item["id"]}}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="EOFs[]" value="{{$item["id"]}}" hidden>
                                                                        <label for="ItemRow_{{$item["id"]}}" class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="Item__Col">{{$item["id"]}}</div>
                                                                    <div class="Item__Col">{{$item["employee_id"]}}</div>
                                                                    <div class="Item__Col">{{$item["reason"]}}</div>
                                                                    <div class="Item__Col">{{$item["start_break_date"]}}</div>
                                                                    <div class="Item__Col">{{$item["end_break_date"]}}</div>
                                                                    <div class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="RoleMore_{{$item["id"]}}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="RoleMore_{{$item["id"]}}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{route("system.data_end_services.show" , $item["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        @lang("viewDetails")
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{route("system.data_end_services.edit" , $item["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        @lang("editDetails")
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                @include("System.Components.noData")
                                            @endif
                                            <div class="Card__Inner">
                                                <div class="Card__Pagination">
                                                    @include("System.Components.paginationNum" , [
                                                        "PaginationData" => $data ,
                                                        "PartsViewNum" => 5
                                                    ])
                                                    @include("System.Components.paginationSelect" , [
                                                        "PaginationData" => $data
                                                    ])
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@section("PopupPage")--}}
{{--    @include("System.Components.searchForm" , [--}}
{{--        'InfoForm' => ["Route" => "" , "Method" => "get"] ,--}}
{{--        'FilterForm' => [ ['Type' => 'text' , 'Info' =>--}}
{{--                ['Name' => "filter[name]" , 'Placeholder' => __("roleName")]] , ['Type' => 'number' , 'Info' =>--}}
{{--                    ['Name' => "filter[id]" , 'Placeholder' => __("id")]--}}
{{--                ] , ['Type' => 'dateRange' , 'Info' => ['Placeholder' => __("createDate") ,--}}
{{--                 'StartDateName' => "filter[start_date]" , 'EndDateName' => "filter[end_date]"--}}
{{--                ]--}}
{{--            ] ]--}}
{{--    ])--}}
{{--    @include("System.Components.fileOptions")--}}
{{--@endsection--}}
