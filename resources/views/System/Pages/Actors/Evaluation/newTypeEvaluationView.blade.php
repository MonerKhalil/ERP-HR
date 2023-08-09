@extends("System.Pages.globalPage")

@section("ContentPage")

    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض جميع التقييمات" ,
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
                                                                    "Label" => __("normalDelete")
                                                                    , "Action" => route("system.evaluation.employeemulti.destroy.evaluation")
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
                                                                اسم الموظف
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ التقييم
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ التقييم التالي
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ انشاء التقييم
                                                            </th>
                                                            <th class="Item__Col">
                                                                المزيد
                                                            </th>
                                                        </tr>
                                                        @foreach($data as $Index => $EvaluationType)
                                                            <tr class="Item DataItem">
                                                                <td class="Item__Col Item__Col--Check">
                                                                    <input id="EvaluationID_{{ $EvaluationType["id"] }}"
                                                                           class="CheckBoxItem" type="checkbox"
                                                                           name="ids[]" value="{{ $EvaluationType["id"] }}" hidden>
                                                                    <label for="EvaluationID_{{ $EvaluationType["id"] }}" class="CheckBoxRow">
                                                                        <i class="material-icons ">
                                                                            check_small
                                                                        </i>
                                                                    </label>
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationType["id"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationType["employee_id"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationType["evaluation_date"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationType["next_evaluation_date"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationType["created_at"] }}
                                                                </td>
                                                                <td class="Item__Col MoreDropdown">
                                                                    <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                       data-MenuName="MoreEvaluationOption_{{ $EvaluationType["id"] }}">
                                                                        more_horiz
                                                                    </i>
                                                                    <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                         data-MenuName="MoreEvaluationOption_{{ $EvaluationType["id"] }}">
                                                                        <ul class="Dropdown__Content">
                                                                            <li>
                                                                                <a href="{{ route("system.evaluation.employeeshow.evaluation" , $EvaluationType["id"]) }}"
                                                                                   class="Dropdown__Item">
                                                                                    عرض التفاصيل
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route("system.evaluation.employeeshow.add.decision.evaluation" , $EvaluationType["id"]) }}"
                                                                                   class="Dropdown__Item">
                                                                                    اضافة قرار لهذا الموظف
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="{{ route("system.evaluation.employeeshow.add.evaluation" , $EvaluationType["id"]) }}"
                                                                                   class="Dropdown__Item">
                                                                                    اضافة تقييم لهذا الموظف
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="/Test-52"
                                                                                   class="Dropdown__Item">
                                                                                    عرض تقييمات هذا الموظف
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="/Test-51"
                                                                                   class="Dropdown__Item">
                                                                                    عرض قرارات هذا الموظف
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

{{--    @include("System.Components.searchForm" , [--}}
{{--        'InfoForm' => ["Route" => "" , "Method" => "get"] ,--}}
{{--        'FilterForm' => [ ['Type' => 'number' , 'Info' =>--}}
{{--                ['Name' => "filter[id]" , 'Placeholder' => __("decisionID")] ] ,--}}
{{--                ['Type' => 'select' , 'Info' =>--}}
{{--                    ['Name' => "filter[type_decision_id]" , 'Placeholder' => __("decisionType") ,--}}
{{--                    "Options" => $DecisionTypes] ] , ['Type' => 'number' , 'Info' =>--}}
{{--                ['Name' => "filter[number]" , 'Placeholder' => __("decisionNumber")] ] ,--}}
{{--                ['Type' => 'dateRange' , 'Info' =>--}}
{{--                    ['Name' => "date" , 'Placeholder' => __("dateDecision")--}}
{{--                    , "StartDateName" => "filter[start_date]" , "EndDateName" => "filter[end_date]"] ] ,--}}
{{--                 ['Type' => 'dateRange' , 'Info' =>--}}
{{--                    ['Name' => "end_date_decision" , 'Placeholder' => __("dateDecisionEnd")--}}
{{--                    , "StartDateName" => "filter[start_date_filter]" , "EndDateName" => "filter[end_date_filter]"] ]--}}
{{--            ]--}}
{{--    ])--}}

{{--    @foreach($data as $Index => $EvaluationType)--}}
{{--        <div class="Popup Popup--Dark" data-name="SearchAbout_{{ $Index }}">--}}
{{--            <div class="Popup__Content">--}}
{{--                <div class="Popup__Card">--}}
{{--                    <i class="material-icons Popup__Close">close</i>--}}
{{--                    <div class="Popup__CardContent">--}}
{{--                        <div class="Popup__InnerGroup">--}}
{{--                            <div class="ListData NotResponsive">--}}
{{--                                <div class="ListData__Head">--}}
{{--                                    <h4 class="ListData__Title">--}}
{{--                                        معلومات التقييم--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <div class="ListData__Content">--}}
{{--                                    @foreach($typeEvaluation as $Type)--}}
{{--                                        <div class="ListData__Item ListData__Item--NoAction">--}}
{{--                                            <div class="Data_Col">--}}
{{--                                                <span class="Data_Label">--}}
{{--                                                    @lang($Type)--}}
{{--                                                </span>--}}
{{--                                                <span class="Data_Value">--}}
{{--                                                    {{ $data->enter_evaluation_employee }}--}}
{{--                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}


@endsection
