@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض جميع تقييمات الموظف" ,
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
                                                                اسم الموظف
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ التقييم
                                                            </th>
                                                            <th class="Item__Col">
                                                                التقييم من قِبل
                                                            </th>
                                                            <th class="Item__Col">
                                                                التقييمات
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
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                <i class="material-icons IconClick OpenPopup"
                                                                   data-popUp="Evaluation_1">
                                                                    visibility
                                                                </i>
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
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                <i class="material-icons IconClick OpenPopup"
                                                                   data-popUp="Evaluation_2">
                                                                    visibility
                                                                </i>
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
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                88/88/88
                                                            </td>
                                                            <td class="Item__Col">
                                                                امير
                                                            </td>
                                                            <td class="Item__Col">
                                                                <i class="material-icons IconClick OpenPopup"
                                                                   data-popUp="Evaluation_3">
                                                                    visibility
                                                                </i>
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

    <div class="Popup Popup--Dark" data-name="Evaluation_1">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <i class="material-icons Popup__Close">close</i>
                <div class="Popup__CardContent">
                    <div class="Popup__InnerGroup">
                        <div class="ListData NotResponsive">
                            <div class="ListData__Head">
                                <h4 class="ListData__Title">
                                    معلومات التقييم
                                </h4>
                            </div>
                            <div class="ListData__Content">
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 1
                                        </span>
                                        <span class="Data_Value">
                                            9
                                        </span>
                                    </div>
                                </div>
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 2
                                        </span>
                                        <span class="Data_Value">
                                            6
                                        </span>
                                    </div>
                                </div>
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 3
                                        </span>
                                        <span class="Data_Value">
                                            4
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Popup Popup--Dark" data-name="Evaluation_2">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <i class="material-icons Popup__Close">close</i>
                <div class="Popup__CardContent">
                    <div class="Popup__InnerGroup">
                        <div class="ListData NotResponsive">
                            <div class="ListData__Head">
                                <h4 class="ListData__Title">
                                    معلومات التقييم
                                </h4>
                            </div>
                            <div class="ListData__Content">
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 1
                                        </span>
                                        <span class="Data_Value">
                                            9
                                        </span>
                                    </div>
                                </div>
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 2
                                        </span>
                                        <span class="Data_Value">
                                            6
                                        </span>
                                    </div>
                                </div>
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 3
                                        </span>
                                        <span class="Data_Value">
                                            4
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Popup Popup--Dark" data-name="Evaluation_3">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <i class="material-icons Popup__Close">close</i>
                <div class="Popup__CardContent">
                    <div class="Popup__InnerGroup">
                        <div class="ListData NotResponsive">
                            <div class="ListData__Head">
                                <h4 class="ListData__Title">
                                    معلومات التقييم
                                </h4>
                            </div>
                            <div class="ListData__Content">
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 1
                                        </span>
                                        <span class="Data_Value">
                                            9
                                        </span>
                                    </div>
                                </div>
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 2
                                        </span>
                                        <span class="Data_Value">
                                            6
                                        </span>
                                    </div>
                                </div>
                                <div class="ListData__Item ListData__Item--NoAction">
                                    <div class="Data_Col">
                                        <span class="Data_Label">
                                            حسب 3
                                        </span>
                                        <span class="Data_Value">
                                            4
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("System.Components.searchForm" , [
       'InfoForm' => ["Route" => "" , "Method" => "get"] ,
       'FilterForm' => [
               ['Type' => 'text' , 'Info' =>
               ['Name' => "filter[employeeName]" , 'Placeholder' => "اسم الموظف"] ] ,
               ['Type' => 'dateSingle' , 'Info' =>
                   ['Name' => "decision_date" , 'Placeholder' => "تاريخ التقييم"] ] ,
               ['Type' => 'text' , 'Info' =>
               ['Name' => "filter[evaluationFrom]" , 'Placeholder' => "التقييم من قِبل"] ] ,
               // منحط كمان التقيمات يلي بدنا ياها
           ]
   ])

@endsection
