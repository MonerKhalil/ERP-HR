@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewVacationsPage">
        <div class="ViewVacationsPage">
            <div class="ViewVacationsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض كل الاجازات" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewVacationsPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewVacationsPage__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF"
                                          action="{{ route("system.leaves_admin.export.pdf") }}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="{{ route("system.leaves_admin.export.xls") }}"
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
                                                                        "Label" => "فبول الطلبات" ,
                                                                        "Action" => route("system.leaves_admin.leave.status.change" , "approve") ,
                                                                        "Method" => "post"
                                                                    ] , [
                                                                        "Label" => "رفض الطلبات" ,
                                                                        "Action" => route("system.leaves_admin.leave.status.change" , "reject") ,
                                                                        "Method" => "post"
                                                                    ] , [
                                                                        "Label" => "حذف الاجازات" ,
                                                                        "Action" => route("system.leaves_admin.multi.delete") ,
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
                                                                <th class="Item__Col">اسم الموظف</th>
                                                                <th class="Item__Col">نوع الاجازة</th>
                                                                <th class="Item__Col">من تاريخ</th>
                                                                <th class="Item__Col">عدد ايام الاجازة</th>
                                                                <th class="Item__Col">من الساعة</th>
                                                                <th class="Item__Col">الى الساعة</th>
                                                                <th class="Item__Col">حالة الطلب</th>
                                                                <th class="Item__Col">تاريخ الرد</th>
                                                                <th class="Item__Col">المزيد</th>
                                                            </tr>
                                                            @foreach($data as $RequestItem)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="MoreRequestVacations_{{$RequestItem["id"]}}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="ids[]" value="{{$RequestItem["id"]}}" hidden>
                                                                        <label for="MoreRequestVacations_{{$RequestItem["id"]}}"
                                                                               class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <th class="Item__Col">{{ $RequestItem["id"] }}</th>
                                                                    <th class="Item__Col">
                                                                        {{ $RequestItem->employee["first_name"]." ".$RequestItem->employee["last_name"] }}
                                                                    </th>
                                                                    <td class="Item__Col">{{ $RequestItem->leave_type["name"] ?? "(محذوف)" }}</td>
                                                                    <td class="Item__Col">{{ $RequestItem["from_date"] }}</td>
                                                                    <td class="Item__Col">{{ $RequestItem["count_days"] }}</td>
                                                                    <td class="Item__Col">{{ $RequestItem["from_time"] ?? "_" }}</td>
                                                                    <td class="Item__Col">{{ $RequestItem["to_time"] ?? "_" }}</td>
                                                                    <td class="Item__Col">{{ $RequestItem["status"] }}</td>
                                                                    <td class="Item__Col">{{ $RequestItem["date_update_status"] ?? "_" }}</td>
                                                                    <td class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="AllVacationsView_{{$RequestItem["id"]}}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="AllVacationsView_{{$RequestItem["id"]}}">
                                                                            <ul class="Dropdown__Content">
                                                                                @if($RequestItem["status"] == "pending")
                                                                                    <li>
                                                                                        <a href="{{ route("system.leaves.edit.leave" , $RequestItem["id"]) }}"
                                                                                           class="Dropdown__Item">
                                                                                            تعديل طلب الاجازة
                                                                                        </a>
                                                                                    </li>
                                                                                @endif
                                                                                <li>
                                                                                    <a href="{{ route("system.leaves.show.leave" , $RequestItem["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        عرض التفاصيل
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
        $LeaveTypes = [] ;
        foreach ($leavesType as $Index=>$TypeItem) {
            array_push($LeaveTypes , [ "Label" => $TypeItem
                , "Value" => $Index ]) ;
        }
    @endphp

    @php
        $Status = [] ;
        foreach ($statusLeaves as $Index=>$StatusItem) {
            array_push($Status , [ "Label" => $StatusItem
                , "Value" => $StatusItem ]) ;
        }
    @endphp

    @php
        $FilterItems = [] ;

        array_push($FilterItems , ['Type' => 'text' , 'Info' =>
               ['Name' => "filter[name_employee]" , 'Placeholder' => 'اسم الموظف'] ]) ;

        array_push($FilterItems , ['Type' => 'select' , 'Info' =>
           ['Name' => "filter[leave_type]" , 'Placeholder' => 'نوع الاجازة' ,
           "Options" => $LeaveTypes] ]) ;

        array_push($FilterItems , ['Type' => 'select' , 'Info' =>
               ['Name' => "filter[status]" , 'Placeholder' => 'حالة الطلب' ,
               "Options" => $Status] ]);

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
