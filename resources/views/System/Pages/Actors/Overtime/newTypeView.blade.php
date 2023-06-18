@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض انواع العمل الاضافي" ,
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
                                                                    "Label" => __("normalDelete")
                                                                    , "Action" => route("system.overtime_types.multi.delete")
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
                                            @if($data)
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
                                                                <th class="Item__Col">اسم النوع</th>
                                                                <th class="Item__Col">نسبة سقف الراتب</th>
                                                                <th class="Item__Col">الحد الادنى لساعات قبول الاضافي</th>
                                                                <th class="Item__Col">مقدار الاجر على الساعة</th>
                                                                <th class="Item__Col">المزيد</th>
                                                            </tr>
                                                            @foreach($data as $TypeItem)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="OvertimeType_{{ $TypeItem["id"] }}"
                                                                               class="CheckBoxItem" type="checkbox"
                                                                               name="ids[]" value="{{ $TypeItem["id"] }}" hidden>
                                                                        <label for="OvertimeType_{{ $TypeItem["id"] }}"
                                                                               class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $TypeItem["id"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $TypeItem["name"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $TypeItem["max_rate_salary"] }} %
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $TypeItem["min_hours_in_days"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $TypeItem["salary_in_hours"] }}
                                                                    </td>
                                                                    <td class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="TypeOvertime_{{ $TypeItem["id"] }}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="TypeOvertime_{{ $TypeItem["id"] }}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="#"
                                                                                       class="Dropdown__Item">
                                                                                        عرض التفاصيل
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#"
                                                                                       class="Dropdown__Item">
                                                                                        تعديل النوع
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
        'FilterForm' => [
            ['Type' => 'text' , 'Info' =>
                ['Name' => "filter[name]" , 'Placeholder' => 'اسم النوع'] ] ,
            ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[max_rate_salary]" , 'Placeholder' => 'نسبة سقف الراتب'] ] ,
            ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[min_hours_in_days]" , 'Placeholder' => 'الحد الادنى لساعات قبول الاضافي'] ] ,
            ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[salary_in_hours]" , 'Placeholder' => 'مقدار الاجر على الساعة'] ] ,
        ]
    ])
@endsection
