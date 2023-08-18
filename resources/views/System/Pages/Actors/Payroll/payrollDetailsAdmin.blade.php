@extends("System.Pages.globalPage")
@php
    $employee = $employee ?? auth()->user()->employee->id;
@endphp
@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewPublicHolidayPage">
        <div class="ViewPublicHolidayPage">
            <div class="ViewPublicHolidayPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("Payroll") ,
                    'paths' => [[__("home") , '#'] , [__("Payroll")]] ,
                    'summery' => __("titlePayroll")
                ])
            </div>
            <div class="ViewPublicHolidayPage__Content">
                <div class="Container--MainContent">
                    <div class="MessageProcessContainer">
                        @include("System.Components.messageProcess")
                    </div>
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewPublicHolidayPage__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF"
                                          action="{{route("system.payroll.export.pdf")}}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                        <input type="hidden" name="employee_id" value="{{$employee}}">
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="{{route("system.payroll.export.xls")}}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                        <input type="hidden" name="employee_id" value="{{$employee}}">
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
                                                                    "Label" => __("removePublicHoliday") ,
                                                                     "Action" => route("system.public_holidays.multi.delete") ,
                                                                     "Method" => "delete"
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
                                            <div class="Card__Inner p0">
                                                @if(count($data) > 0)
                                                    <div class="Table__ContentTable">
                                                        <table class="Center Table__Table" >
                                                            <tr class="Item HeaderList">
                                                                <th class="Item__Col Item__Col--Check">
                                                                    <input id="ItemRow_Main" class="CheckBoxItem"
                                                                           type="checkbox" hidden>
                                                                    <label for="ItemRow_Main" class="CheckBoxRow">
                                                                        <i class="material-icons">
                                                                            check_small
                                                                        </i>
                                                                    </label>
                                                                </th>
                                                                <th class="Item__Col">#</th>
                                                                <th class="Item__Col">@lang("employeeName")</th>
                                                                <th class="Item__Col">@lang("total_salary")</th>
                                                                <th class="Item__Col">@lang("default_salary")</th>
                                                                <th class="Item__Col">@lang("overtime_minute")</th>
                                                                <th class="Item__Col">@lang("overtime_value")</th>
                                                                <th class="Item__Col">@lang("bonuses_decision")</th>
                                                                <th class="Item__Col">@lang("penalties_decision")</th>
                                                                <th class="Item__Col">@lang("absence_days")</th>
                                                                <th class="Item__Col">@lang("absence_days_value")</th>
                                                                <th class="Item__Col">@lang("count_leaves_unpaid")</th>
                                                                <th class="Item__Col">@lang("leaves_unpaid_value")</th>
                                                                <th class="Item__Col">@lang("count_leaves_effect_salary")</th>
                                                                <th class="Item__Col">@lang("leaves_effect_salary_value")</th>
                                                                <th class="Item__Col">@lang("position_employee_value")</th>
                                                                <th class="Item__Col">@lang("conferences_employee_value")</th>
                                                                <th class="Item__Col">@lang("education_value")</th>
                                                                <th class="Item__Col">@lang("minutes_late_entry")</th>
                                                                <th class="Item__Col">@lang("minutes_late_entry_value")</th>
                                                                <th class="Item__Col">@lang("minutes_early_exit")</th>
                                                                <th class="Item__Col">@lang("minutes_early_exit_value")</th>
                                                                <th class="Item__Col">@lang("created_at")</th>
                                                            </tr>
                                                            @foreach($data as $item)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="MoreRequestVacations_{{$item->id}}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="ids[]" value="{{$item->id}}" hidden>
                                                                        <label for="MoreRequestVacations_{{$item->id}}"
                                                                               class="CheckBoxRow">
                                                                            <i class="material-icons">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">{{$item->id}}</td>
                                                                    <td class="Item__Col">{{$item->employee->name??""}}</td>
                                                                    <td class="Item__Col">{{$item->total_salary}}</td>
                                                                    <td class="Item__Col">{{$item->default_salary}}</td>
                                                                    <td class="Item__Col">{{$item->overtime_minute}}</td>
                                                                    <td class="Item__Col">{{$item->overtime_value}}</td>
                                                                    <td class="Item__Col">{{$item->bonuses_decision}}</td>
                                                                    <td class="Item__Col">{{$item->penalties_decision}}</td>
                                                                    <td class="Item__Col">{{$item->absence_days}}</td>
                                                                    <td class="Item__Col">{{$item->absence_days_value}}</td>
                                                                    <td class="Item__Col">{{$item->count_leaves_unpaid}}</td>
                                                                    <td class="Item__Col">{{$item->leaves_unpaid_value}}</td>
                                                                    <td class="Item__Col">{{$item->count_leaves_effect_salary}}</td>
                                                                    <td class="Item__Col">{{$item->leaves_effect_salary_value}}</td>
                                                                    <td class="Item__Col">{{$item->position_employee_value}}</td>
                                                                    <td class="Item__Col">{{$item->conferences_employee_value}}</td>
                                                                    <td class="Item__Col">{{$item->education_value}}</td>
                                                                    <td class="Item__Col">{{$item->minutes_late_entry}}</td>
                                                                    <td class="Item__Col">{{$item->minutes_late_entry_value}}</td>
                                                                    <td class="Item__Col">{{$item->minutes_early_exit}}</td>
                                                                    <td class="Item__Col">{{$item->minutes_early_exit_value}}</td>
                                                                    <td class="Item__Col">{{$item->created_at}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                @else
                                                    @include("System.Components.noData")
                                                @endif
                                            </div>
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
       'FilterForm' => [

           ['Type' => 'text' , 'Info' =>
               ['Name' => "filter[name]" , 'Placeholder' => __("publicHolidayName")] ] ,

       ]

   ])
@endsection
