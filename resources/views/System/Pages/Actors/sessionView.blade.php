@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewSession") ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewUsers__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewUsers__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF" action="#"
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
                                                            <th class="Item__Col">@lang("sessionName")</th>
                                                            <th class="Item__Col">@lang("sessionTitle")</th>
                                                            <th class="Item__Col">@lang("sessionDate")</th>
                                                            <th class="Item__Col">المزيد</th>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="1"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="name[]" value="1" hidden>
                                                                <label for="1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">1</td>
                                                            <td class="Item__Col">Session One</td>
                                                            <td class="Item__Col">About Habd</td>
                                                            <td class="Item__Col">12-2-2022</td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="Details">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="Details">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                عرض التفاصيل
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                عرض القرارات
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                اضافة قرار
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
                                                                       name="name[]" value="1" hidden>
                                                                <label for="1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">1</td>
                                                            <td class="Item__Col">Session One</td>
                                                            <td class="Item__Col">About Habd</td>
                                                            <td class="Item__Col">12-2-2022</td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="Details_2">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="Details_2">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                عرض التفاصيل
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                عرض القرارات
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                اضافة قرار
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
                                                                       name="name[]" value="1" hidden>
                                                                <label for="1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">1</td>
                                                            <td class="Item__Col">Session One</td>
                                                            <td class="Item__Col">About Habd</td>
                                                            <td class="Item__Col">12-2-2022</td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="Details_3">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="Details_3">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                عرض التفاصيل
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                عرض القرارات
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="Dropdown__Item">
                                                                                اضافة قرار
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
{{--                                                        "PaginationData" => $users ,--}}
{{--                                                        "PartsViewNum" => 5--}}
{{--                                                    ])--}}
{{--                                                    @include("System.Components.paginationSelect" , [--}}
{{--                                                        "PaginationData" => $users--}}
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
    @include("System.Components.searchForm" , [
        'InfoForm' => ["Route" => "" , "Method" => "get"] ,
        'FilterForm' => [ ['Type' => 'number' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Session ID'] ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "" , 'Placeholder' => 'Session Title']
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Session Date' , "StartDateName" => ""
                , "EndDateName" => ""]
            ] , ['Type' => 'number' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Decision ID']
            ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "" , 'Placeholder' => 'Decision Title']
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Decision Date' , "StartDateName" => ""
                , "EndDateName" => ""]
            ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Session Date End' , "StartDateName" => ""
                , "EndDateName" => ""] ]
            ]
    ])
@endsection
