@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewDecision">
        <div class="ViewDecision">
            <div class="ViewDecision__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض القرارات" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewDecision__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewDecision__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF"
                                          action="{{route("system.decisions.export.pdf")}}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="{{route("system.decisions.export.xls")}}"
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
                                                                    "Label" => "طباعة كـ pdf" ,
                                                                     "Action" => route("system.decisions.export.pdf") ,
                                                                     "Method" => "post"
                                                                ] , [
                                                                    "Label" => "طباعة كـ xlsx" ,
                                                                     "Action" => route("system.decisions.export.xls") ,
                                                                     "Method" => "post"
                                                                ] , [
                                                                    "Label" => __("normalDelete")
                                                                    , "Action" => route("system.decisions.multi.delete")
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
                                                                <th class="Item__Col">نوع القرار</th>
                                                                <th class="Item__Col">رقم القرار</th>
                                                                <th class="Item__Col">تاريخ القرار</th>
                                                                <th class="Item__Col">تاريخ انتهاء القرار</th>
                                                                <th class="Item__Col">المزيد</th>
                                                            </tr>
                                                            @foreach($data as $DecisionData)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="{{$DecisionData["id"]}}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="ids[]" value="{{$DecisionData["id"]}}" hidden>
                                                                        <label for="{{$DecisionData["id"]}}" class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">{{$DecisionData["id"]}}</td>
                                                                    <td class="Item__Col">{{$DecisionData->type_decision["name"]}}</td>
                                                                    <td class="Item__Col">{{$DecisionData["number"]}}</td>
                                                                    <td class="Item__Col">{{$DecisionData["date"]}}</td>
                                                                    <td class="Item__Col">{{$DecisionData["end_date_decision"] ?? "-"}}</td>
                                                                    <td class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="MoreDecision_{{$DecisionData["id"]}}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="MoreDecision_{{$DecisionData["id"]}}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{route("system.decisions.show" , $DecisionData["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        عرض التفاصيل
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{route("system.decisions.print.pdf" , $DecisionData["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        طباعة القرار
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{route("system.decisions.edit" , $DecisionData["id"])}}"
                                                                                       class="Dropdown__Item">
                                                                                        تعديل قرار
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

    @php
        $DecisionTypes = [] ;
        foreach ($type_decisions as $Index=>$Decisions) {
            array_push($DecisionTypes , [ "Label" => $Decisions , "Value" => $Index ]) ;
        }
    @endphp

    @include("System.Components.searchForm" , [
        'InfoForm' => ["Route" => "" , "Method" => "get"] ,
        'FilterForm' => [ ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[id]" , 'Placeholder' => 'Decision ID'] ] ,
                ['Type' => 'select' , 'Info' =>
                    ['Name' => "filter[type_decision_id]" , 'Placeholder' => 'Decision Type' ,
                    "Options" => $DecisionTypes] ] , ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[number]" , 'Placeholder' => 'Decision Number'] ] ,
                ['Type' => 'dateRange' , 'Info' =>
                    ['Name' => "date" , 'Placeholder' => 'Decision Date'
                    , "StartDateName" => "filter[start_date]" , "EndDateName" => "filter[end_date]"] ] ,
                 ['Type' => 'dateRange' , 'Info' =>
                    ['Name' => "end_date_decision" , 'Placeholder' => 'Decision End Date'
                    , "StartDateName" => "filter[start_date_filter]" , "EndDateName" => "filter[end_date_filter]"] ]
            ]
    ])
@endsection
