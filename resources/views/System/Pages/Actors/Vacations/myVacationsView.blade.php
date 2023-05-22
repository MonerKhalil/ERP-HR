@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewVacationsPage">
        <div class="ViewVacationsPage">
            <div class="ViewVacationsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض كل الاجازات الخاصة بي" ,
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
                                          action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="#"
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
                                                                     "Action" => "#" ,
                                                                     "Method" => "post"
                                                                ] , [
                                                                    "Label" => "طباعة كـ xlsx" ,
                                                                     "Action" => "#" ,
                                                                     "Method" => "post"
                                                                ] , [
                                                                    "Label" => "الغاء طلب اجازة" ,
                                                                     "Action" => "#" ,
                                                                     "Method" => "post"
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
                                                            <th class="Item__Col">نوع الاجازة</th>
                                                            <th class="Item__Col">عدد ايام الاجازة</th>
                                                            <th class="Item__Col">تاريخ تقديم الطلب</th>
                                                            <th class="Item__Col">حالة الطلب</th>
                                                            <th class="Item__Col">المزيد</th>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="MoreRequestVacations_1"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="1" hidden>
                                                                <label for="MoreRequestVacations_1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <th class="Item__Col">1</th>
                                                            <td class="Item__Col">سفر</td>
                                                            <td class="Item__Col">3</td>
                                                            <td class="Item__Col">10-10-2025</td>
                                                            <td class="Item__Col">معلق</td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="MoreRequestVacations_1">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="MoreRequestVacations_1">
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
                                                                                تعديل الطلب
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="MoreRequestVacations_2"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="2" hidden>
                                                                <label for="MoreRequestVacations_2" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <th class="Item__Col">1</th>
                                                            <td class="Item__Col">سفر</td>
                                                            <td class="Item__Col">3</td>
                                                            <td class="Item__Col">10-10-2025</td>
                                                            <td class="Item__Col">معلق</td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="MoreRequestVacations_2">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="MoreRequestVacations_2">
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
                                                                                تعديل الطلب
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="MoreRequestVacations_3"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="3" hidden>
                                                                <label for="MoreRequestVacations_3" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <th class="Item__Col">1</th>
                                                            <td class="Item__Col">سفر</td>
                                                            <td class="Item__Col">3</td>
                                                            <td class="Item__Col">10-10-2025</td>
                                                            <td class="Item__Col">معلق</td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="MoreRequestVacations_3">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="MoreRequestVacations_3">
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
                                                                                تعديل الطلب
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

@section("PopupPage")

@endsection
