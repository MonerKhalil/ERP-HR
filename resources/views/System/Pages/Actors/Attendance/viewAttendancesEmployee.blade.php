@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض كامل حضوري" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
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
                                    <form name="PrintAllTablePDF"
                                          action="{{ route("system.attendances.export.pdf") }}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="{{ route("system.attendances.export.xls") }}"
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
                                                                    "Label" => __("normalDelete")
                                                                    , "Action" => route("system.attendances.multi.delete")
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
                                                        <table class="Table__Table">
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
                                                                <th class="Item__Col"><span>التاريخ</span></th>
                                                                <th class="Item__Col"><span>@lang("CheckIn")</span></th>
                                                                <th class="Item__Col"><span>@lang("CheckOut")</span></th>
                                                                <th class="Item__Col"><span>ساعات العمل</span></th>
                                                                <th class="Item__Col"><span>ساعات التأخير</span></th>
                                                                <th class="Item__Col"><span>الساعات الغير مكتملة لليوم</span></th>
                                                            </tr>
                                                            @foreach($data as $ItemRow)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="ItemRow_{{$ItemRow["id"]}}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="ids[]" value="{{$ItemRow["id"]}}" hidden>
                                                                        <label for="ItemRow_{{$ItemRow["id"]}}" class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{$ItemRow["id"]}}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{\Carbon\Carbon::parse($ItemRow["created_at"])->format('y-m-d')}}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{$ItemRow["check_in"]}}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{$ItemRow["check_out"] ?? "-"}}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{$ItemRow["hours_work"] ?? "-"}}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ floor($ItemRow["late_entry_per_minute"] / 60).':'.($ItemRow["late_entry_per_minute"] -   floor($ItemRow["late_entry_per_minute"] / 60) * 60) }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ floor($ItemRow["early_exit_per_minute"] / 60).':'.($ItemRow["early_exit_per_minute"] -   floor($ItemRow["early_exit_per_minute"] / 60) * 60) }}
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
                ['Name' => "filter[id]" , 'Placeholder' => "رقم الحضور" ] ] ,
                ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[hours_work]" , 'Placeholder' => "ساعات العمل" ] ] ,
                ['Type' => 'text' , 'Info' =>
                ['Name' => "filter[late_entry_per_minute]" , 'Placeholder' => "دقائق التأخير" ] ] ,
                ['Type' => 'text' , 'Info' =>
                ['Name' => "filter[early_exit_per_minute]" , 'Placeholder' => "الدقائق الغير مكتملة" ] ] ,
                ['Type' => 'dateRange' , 'Info' =>
                    ['Name' => "createDate" , 'Placeholder' => "تاريخ الحضور"
                    , "StartDateName" => "filter[start_date_filter]" , "EndDateName" => "filter[end_date_filter]"] ]
              ]
    ])
@endsection
