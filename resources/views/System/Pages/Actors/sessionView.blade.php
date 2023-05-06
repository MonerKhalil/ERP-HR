@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewSessionPage">
        <div class="ViewSessionPage">
            <div class="ViewSessionPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewSession") ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewSessionPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewSessionPage__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF"
                                          action="#"
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
                                                                    "Label" => __("print") ,
                                                                    "Action" => "" ,
                                                                    "Method" => "B"
                                                                ] , [
                                                                    "Label" => __("normalDelete")
                                                                    , "Action" => ""
                                                                    , "Method" => "delete"
                                                                ] ]
                                                            ])
                                                        </div>
                                                        <div class="Card__Tools Card__SearchTools">
                                                            <ul class="SearchTools">
                                                                <li>
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
                                                                                <a href="javascript:document.PrintAllTablePDF.submit()">
                                                                                    @lang("printTablePDFFile")
                                                                                </a>
                                                                            </li>
                                                                            <li class="Dropdown__Item">
                                                                                <a href="javascript:document.PrintAllTableXlsx.submit()">
                                                                                    @lang("printTableXlsxFile")
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
                                            @if(count($data) > 0)
                                                <div class="Card__Inner p0">
                                                    <div class="Table__ContentTable">
                                                        <table class="Left Table__Table" >
                                                            <tr class="Item HeaderList">
                                                                <th class="Item__Col Item__Col--Check">
                                                                    <input id="ItemRow_Main" class="CheckBoxItem"
                                                                           type="checkbox" hidden>
                                                                    <label for="ItemRow_Main" class="CheckBoxRow">
                                                                        <i class="material-icons ">
                                                                            check_small
                                                                        </i>
                                                                    </label>
                                                                </th>
                                                                <th class="Item__Col">#</th>
                                                                <th class="Item__Col">@lang("sessionName")</th>
                                                                <th class="Item__Col">@lang("sessionDate")</th>
                                                                <th class="Item__Col">@lang("createDate")</th>
                                                                <th class="Item__Col">@lang("editDate")</th>
                                                                <th class="Item__Col">@lang("more")</th>
                                                            </tr>
                                                            @foreach($data as $DataSession)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="{{$DataSession["id"]}}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="name[]" value="{{$DataSession["id"]}}" hidden>
                                                                        <label for="{{$DataSession["id"]}}" class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">{{$DataSession["id"]}}</td>
                                                                    <td class="Item__Col">{{$DataSession["name"]}}</td>
                                                                    <td class="Item__Col">{{$DataSession["date_session"]}}</td>
                                                                    <td class="Item__Col">{{$DataSession["created_at"]}}</td>
                                                                    <td class="Item__Col">{{$DataSession["updated_at"]}}</td>
                                                                    <td class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="SessionMore_{{$DataSession["id"]}}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="SessionMore_{{$DataSession["id"]}}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{route("system.session_decisions.show" , $DataSession["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        @lang("viewDetails")
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{route("system.session_decisions.edit" , $DataSession["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        @lang("editSessionInfo")
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" class="Dropdown__Item">
                                                                                        @lang("viewDecision")
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" class="Dropdown__Item">
                                                                                        @lang("addDecision")
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
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

@section("PopupPage")
    @include("System.Components.searchForm" , [
        'InfoForm' => ["Route" => "" , "Method" => "get"] ,
        'FilterForm' => [ ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[id]" , 'Placeholder' => __("sessionNumber") ] ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "filter[name]" , 'Placeholder' => __("sessionName")]
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "filter[date_session]" , 'Placeholder' => __("sessionDate") ,
                 "StartDateName" => "filter[start_date]" , "EndDateName" => "filter[start_date]"]
            ] ]
    ])
@endsection
