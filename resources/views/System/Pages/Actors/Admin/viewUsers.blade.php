@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewUsers") ,
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
                                <form name="PrintAllTablePDF" action="{{route("users.pdf")}}"
                                      method="post">
                                    @csrf
                                </form>
                                <form name="PrintAllTableXlsx" action="{{route("users.xls")}}"
                                      method="post">
                                    @csrf
                                </form>
                                <form action="#" method="post">
                                    @csrf
                                    <div class="Card__InnerGroup">
                                        <div class="Card__Inner p1">
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
                                                            <li class="Table__PrintMenu">
                                                                <i class="material-icons IconClick PrintMenu__Button"
                                                                   title="Print">print</i>
                                                                <div class="Dropdown PrintMenu__Menu">
                                                                    <ul class="Dropdown__Content">
                                                                        <li class="Dropdown__Item">
                                                                            <a class="AnchorSubmit"
                                                                               data-form="PrintAllTablePDF">
                                                                                Print Table PDF File
                                                                            </a>
                                                                        </li>
                                                                        <li class="Dropdown__Item">
                                                                            <a class="AnchorSubmit"
                                                                               data-form="PrintAllTableXlsx">
                                                                                Print Table Xlsx File
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(count($users) > 0)
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
                                                            <div class="Item__Col"><span>@lang("user")</span></div>
                                                            <div class="Item__Col">@lang("id")</div>
                                                            <div class="Item__Col"><span>@lang("email")</span></div>
                                                            <div class="Item__Col"><span>@lang("createDate")</span></div>
                                                            <div class="Item__Col"><span>More</span></div>
                                                        </div>
                                                        @foreach($users as $User)
                                                            <div class="Item DataItem">
                                                                <div class="Item__Col Item__Col--Check">
                                                                    <input id="ItemRow_{{$User["id"]}}"
                                                                           class="CheckBoxItem" type="checkbox"
                                                                           name="users[]" value="{{$User["id"]}}" hidden>
                                                                    <label for="ItemRow_{{$User["id"]}}" class="CheckBoxRow">
                                                                        <i class="material-icons ">
                                                                            check_small
                                                                        </i>
                                                                    </label>
                                                                </div>
                                                                <div class="Item__Col">{{$User["name"]}}</div>
                                                                <div class="Item__Col">#{{$User["id"]}}</div>
                                                                <div class="Item__Col">{{$User["email"]}}</div>
                                                                <div class="Item__Col">{{$User["created_at"]}}</div>
                                                                <div class="Item__Col Item__Col--Details">
                                                                    <a href="{{route("users.show" , $User["id"])}}">
                                                                        <span class="Details__Button">Details</span>
                                                                    </a>
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
                                                    "PaginationData" => $users ,
                                                    "PartsViewNum" => 5
                                                ])
                                                @include("System.Components.paginationSelect" , [
                                                    "PaginationData" => $users
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

@section("PopupPage")
    @include("System.Components.searchForm" , [
        'InfoForm' => ["Route" => route("users.index") , "Method" => "get"] ,
        'FilterForm' => [ ['Type' => 'text' , 'Info' =>
                ['Name' => "filter[name]" , 'Placeholder' => __("userName")]] , ['Type' => 'number' , 'Info' =>
                    ['Name' => "filter[id]" , 'Placeholder' => __("id")]
                ] , ['Type' => 'email' , 'Info' =>
                ['Name' => "filter[email]" , 'Placeholder' => __("email")]
            ] , ['Type' => 'dateRange' , 'Info' =>
                ['Placeholder' => __("createDate") ,
                 'StartDateName' => "filter[start_date]" , 'EndDateName' => "filter[end_date]"
                ]
            ] ]
    ])
    @include("System.Components.fileOptions")
@endsection
