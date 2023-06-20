@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' =>  "عرض طلباتي الـ ".$status ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NewTypeViewPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card NewTypeViewPage__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF"
                                          action="{{route("system.overtimes_admin.export.pdf")}}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="{{route("system.overtimes_admin.export.xls")}}"
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
                                                                    , "Action" => route("system.overtimes.remove.multi.request")
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
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($data) > 0)
                                                <div class="Card__Inner p0">
                                                    <div class="Table__ContentTable">
                                                        <table class="Center Table__Table" >
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
                                                                <th class="Item__Col">نوع العمل الاضافي</th>
                                                                <th class="Item__Col">تبدأ من تاريخ</th>
                                                                <th class="Item__Col">تنتهي عند تاريخ</th>
                                                                <th class="Item__Col">هل هي ساعية</th>
                                                                <th class="Item__Col">تبدأ من الساعة</th>
                                                                <th class="Item__Col">تنتهي عند الساعة</th>
                                                                <th class="Item__Col">الحالة</th>
                                                                <th class="Item__Col">المزيد</th>
                                                            </tr>
                                                            @foreach($data as $Index=>$RequestOvertime)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="OvertimeRequest_{{ $RequestOvertime["id"] }}"
                                                                               class="CheckBoxItem" type="checkbox" hidden
                                                                               name="ids[]" value="{{ $RequestOvertime["id"] }}" >
                                                                        <label for="OvertimeRequest_{{ $RequestOvertime["id"] }}"
                                                                               class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime["id"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime->overtime_type["name"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime["from_date"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime["to_date"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        @if($RequestOvertime["is_hourly"])
                                                                            نعم
                                                                        @else
                                                                            لا
                                                                        @endif
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime["from_time"] ?? "_" }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime["to_time"] ?? "_" }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RequestOvertime["status"] }}
                                                                    </td>
                                                                    <td class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="RequestOvertime_{{ $RequestOvertime["id"] }}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="RequestOvertime_{{ $RequestOvertime["id"] }}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{ route("system.overtimes.show.overtime" , $RequestOvertime["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        عرض التفاصيل
                                                                                    </a>
                                                                                </li>
                                                                                @if($RequestOvertime["status"] == "pending")
                                                                                    <li>
                                                                                        <a href="{{ route("system.overtimes.edit.overtime" , $RequestOvertime["id"]) }}"
                                                                                           class="Dropdown__Item">
                                                                                            تعديل الطلب
                                                                                        </a>
                                                                                    </li>
                                                                                @endif
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
        $OvertimeTypes = [] ;
        foreach ($overtimesType as $Index=>$OvertimeItem) {
            array_push($OvertimeTypes , [ "Label" => $OvertimeItem
                , "Value" => $Index ]) ;
        }
    @endphp

    @php

        $FilterItems = [] ;

        array_push($FilterItems , ['Type' => 'select' , 'Info' =>
           ['Name' => "filter[overtime_type]" , 'Placeholder' => 'نوع العمل الاضافي' ,
           "Options" => $OvertimeTypes] ]) ;

        array_push($FilterItems , ['Type' => 'dateSingle' , 'Info' =>
           ['Name' => "filter[start_date_filter]" , 'Placeholder' => 'تبدأ من تاريخ'] ]);

        array_push($FilterItems , ['Type' => 'dateSingle' , 'Info' =>
           ['Name' => "filter[end_date_filter]" , 'Placeholder' => 'تنتهي في تاريخ'] ]);

    @endphp

    @include("System.Components.searchForm" , [
       'InfoForm' => ["Route" => "" , "Method" => "get"] ,
       'FilterForm' => $FilterItems
   ])

@endsection
