@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض طلبات العمل الاضافي" ,
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
                                                            <th class="Item__Col">الموظف الطالب</th>
                                                            <th class="Item__Col">نوع العمل الاضافي</th>
                                                            <th class="Item__Col">تبدأ من تاريخ</th>
                                                            <th class="Item__Col">تنتهي عند تاريخ</th>
                                                            <th class="Item__Col">نوع مدة العمل الاضافي</th>
                                                            <th class="Item__Col">يبدأ العمل الاضافي</th>
                                                            <th class="Item__Col">المزيد</th>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="1"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="1" hidden>
                                                                <label for="1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">
                                                                1
                                                            </td>
                                                            <td class="Item__Col">
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                اعياد
                                                            </td>
                                                            <td class="Item__Col">
                                                                10-5-2021
                                                            </td>
                                                            <td class="Item__Col">
                                                                13-5-2021
                                                            </td>
                                                            <td class="Item__Col">
                                                                يوم كامل
                                                            </td>
                                                            <td class="Item__Col">
                                                                في اي وقت
                                                            </td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="TypeOvertime_1">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="TypeOvertime_1">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="/Test-41"
                                                                               class="Dropdown__Item">
                                                                                عرض التفاصيل
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="1"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="1" hidden>
                                                                <label for="1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">
                                                                1
                                                            </td>
                                                            <td class="Item__Col">
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                اعياد
                                                            </td>
                                                            <td class="Item__Col">
                                                                10-5-2021
                                                            </td>
                                                            <td class="Item__Col">
                                                                13-5-2021
                                                            </td>
                                                            <td class="Item__Col">
                                                                يوم كامل
                                                            </td>
                                                            <td class="Item__Col">
                                                                في اي وقت
                                                            </td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="TypeOvertime_2">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="TypeOvertime_2">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="/Test-41"
                                                                               class="Dropdown__Item">
                                                                                عرض التفاصيل
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="1"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="1" hidden>
                                                                <label for="1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">
                                                                1
                                                            </td>
                                                            <td class="Item__Col">
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                اعياد
                                                            </td>
                                                            <td class="Item__Col">
                                                                10-5-2021
                                                            </td>
                                                            <td class="Item__Col">
                                                                13-5-2021
                                                            </td>
                                                            <td class="Item__Col">
                                                                يوم كامل
                                                            </td>
                                                            <td class="Item__Col">
                                                                في اي وقت
                                                            </td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="TypeOvertime_3">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="TypeOvertime_3">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="/Test-41"
                                                                               class="Dropdown__Item">
                                                                                عرض التفاصيل
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="Card__Inner">
                                                {{--                                                <div class="Card__Pagination">--}}
                                                {{--                                                    @include("System.Components.paginationNum" , [--}}
                                                {{--                                                        "PaginationData" => $data ,--}}
                                                {{--                                                        "PartsViewNum" => 5--}}
                                                {{--                                                    ])--}}
                                                {{--                                                    @include("System.Components.paginationSelect" , [--}}
                                                {{--                                                        "PaginationData" => $data--}}
                                                {{--                                                    ])--}}
                                                {{--                                                </div>--}}
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
