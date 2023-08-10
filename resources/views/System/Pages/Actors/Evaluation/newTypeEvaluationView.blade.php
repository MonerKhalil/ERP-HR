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
                                                                    , "Action" => route("system.evaluation.employee.multi.destroy.evaluation")
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
                                            @if(count($data) > 0)
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
                                                                    تاريخ اخر تقييم
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
                                                                                    <a href="{{ route("system.evaluation.employee.show.evaluation.details" , $EvaluationType["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        عرض التفاصيل
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{ route("system.evaluation.employee.show.add.decision.evaluation" , $EvaluationType["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        اضافة قرار لهذا الموظف
                                                                                    </a>
                                                                                </li>
                                                                                @php
                                                                                    $IsCanEvaluation = false ;
                                                                                    foreach ($EvaluationType->enter_evaluation_employee as $EmployeeInfo)
                                                                                        if($EmployeeInfo->employee["user_id"] === Auth()->user()["id"]) {
                                                                                            $IsCanEvaluation = true ;
                                                                                            break ;
                                                                                        }
                                                                                @endphp
                                                                                @if($IsCanEvaluation)
                                                                                    <li>
                                                                                        <a href="{{ route("system.evaluation.employee.show.add.evaluation" , $EvaluationType["id"]) }}"
                                                                                           class="Dropdown__Item">
                                                                                            اضافة تقييم لهذا الموظف
                                                                                        </a>
                                                                                    </li>
                                                                                @endif
                                                                                <li>
                                                                                    <a href="{{ route("system.evaluation.employee.show.evaluation" , $EvaluationType["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        عرض تقييمات هذا الموظف
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{ route("system.evaluation.employee.show.evaluation.decisions" , $EvaluationType["id"]) }}"
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
                ['Name' => "filter[id]" , 'Placeholder' => "رقم التقييم"] ] ,
                ['Type' => 'text' , 'Info' =>
                ['Name' => "filter[employee_name]" , 'Placeholder' => "اسم الموظف"] ] ,
                ['Type' => 'dateSingle' , 'Info' =>
                    ['Name' => "filter[evaluation_date]" , 'Placeholder' => "تاريخ اخر تقييم"] ] ,
                ['Type' => 'dateSingle' , 'Info' =>
                   ['Name' => "filter[next_evaluation_date]" , 'Placeholder' => "تاريخ التقييم التالي" ] ]
        ]
    ])

@endsection
