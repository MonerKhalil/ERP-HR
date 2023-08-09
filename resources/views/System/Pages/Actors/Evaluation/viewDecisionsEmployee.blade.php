@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض جميع قرارات التقييم" ,
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
                                          action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    {{--  منحط function مشان يعطني كل الفلترة ويحطون ك input hidden متل ما عملنا new dash   --}}
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                        {{--  منحط function مشان يعطني كل الفلترة ويحطون ك input hidden متل ما عملنا new dash   --}}
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
                                                                    "Label" => __("normalDelete")
                                                                    , "Action" => "#"
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
                                                    <table class="Table__Table" >
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
                                                            <th class="Item__Col">
                                                                اسم الجلسة
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ الجلسة
                                                            </th>
                                                            <th class="Item__Col">
                                                                رقم القرار
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ القرار
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ انتهاء القرار
                                                            </th>
                                                            <th class="Item__Col">
                                                                نوع التأثير على الراتب
                                                            </th>
                                                            <th class="Item__Col">
                                                                المزيد
                                                            </th>
                                                        </tr>
                                                        <tr class="Item DataItem">
                                                            <td class="Item__Col Item__Col--Check">
                                                                <input id="EvaluationID_1"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="1" hidden>
                                                                <label for="EvaluationID_1" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">
                                                                1
                                                            </td>
                                                            <td class="Item__Col">
                                                                هيك شي
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                8888
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                نوع التأثير على الراتب
                                                            </td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="MoreEvaluationOption_1">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="MoreEvaluationOption_1">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="#"
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
                                                                <input id="EvaluationID_2"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="2" hidden>
                                                                <label for="EvaluationID_2" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">
                                                                2
                                                            </td>
                                                            <td class="Item__Col">
                                                                هيك شي
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                8888
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                نوع التأثير على الراتب
                                                            </td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="MoreEvaluationOption_2">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="MoreEvaluationOption_2">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="#"
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
                                                                <input id="EvaluationID_3"
                                                                       class="CheckBoxItem" type="checkbox"
                                                                       name="ids[]" value="3" hidden>
                                                                <label for="EvaluationID_3" class="CheckBoxRow">
                                                                    <i class="material-icons ">
                                                                        check_small
                                                                    </i>
                                                                </label>
                                                            </td>
                                                            <td class="Item__Col">
                                                                3
                                                            </td>
                                                            <td class="Item__Col">
                                                                هيك شي
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                8888
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                نوع التأثير على الراتب
                                                            </td>
                                                            <td class="Item__Col MoreDropdown">
                                                                <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                   data-MenuName="MoreEvaluationOption_3">
                                                                    more_horiz
                                                                </i>
                                                                <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                     data-MenuName="MoreEvaluationOption_3">
                                                                    <ul class="Dropdown__Content">
                                                                        <li>
                                                                            <a href="#"
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


@section("PopupPage")

{{--    @php--}}
{{--        $DecisionTypes = [] ;--}}
{{--        foreach ($type_decisions as $Index=>$Decisions) {--}}
{{--            array_push($DecisionTypes , [ "Label" => $Decisions , "Value" => $Index ]) ;--}}
{{--        }--}}
{{--    @endphp--}}

    @include("System.Components.searchForm" , [
        'InfoForm' => ["Route" => "" , "Method" => "get"] ,
        'FilterForm' => [
                ['Type' => 'text' , 'Info' =>
                ['Name' => "filter[sessionName]" , 'Placeholder' => "اسم الجلسة"] ] ,
                ['Type' => 'dateSingle' , 'Info' =>
                    ['Name' => "session_date" , 'Placeholder' => "تاريخ الجلسة"] ] ,
                ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[number]" , 'Placeholder' => __("decisionNumber")] ] ,
                ['Type' => 'dateSingle' , 'Info' =>
                    ['Name' => "date" , 'Placeholder' => __("dateDecision")] ] ,
                 ['Type' => 'dateSingle' , 'Info' =>
                    ['Name' => "end_date_decision" , 'Placeholder' => __("dateDecisionEnd")] ]
            ]
    ])
@endsection
