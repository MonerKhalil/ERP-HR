@extends("System.Pages.globalPage")

{{--@php--}}
{{--    dd($membership_type);--}}
{{--@endphp--}}

@section("ContentPage")



    <section class="MainContent__Section MainContent__Section--ReportEmployeeFormPage">
        <div class="ReportEmployeeFormPage">
            <div class="ReportEmployeeFormPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تقارير الموظفين" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ReportEmployeeFormPage__Content">
                <div class="Row">
                    <div class="ReportEmployeeFormPage__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark"
                                                      action="{{route("system.employees.report.final")}}"
                                                      method="get">
                                                    @csrf
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                @lang("basics")
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem pt-0">
                                                                <div class="Row GapC-1-5">
                                                                    {{-- Main --}}
                                                                    <div class="VisibilityOption Col-12"
                                                                         data-ElementsTargetName="CreateReportBy">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.multiSelector" , [
                                                                                        'Name' => "_" ,
                                                                                        "NameIDs" => "ReportBY" , "DefaultValue" => "" , "Label" => "تقرير حسب" ,
                                                                                        "Options" => [
                                                                                                       ["Label" => "تاريخ المباشرة" , "Value" => "Decision" , "Name" => "1"] ,
                                                                                                       /* ["Label" => "مكان العمل" , "Value" => "Decision" , "Name" => "2"] ,*/
                                                                                                       ["Label" => "تاريخ الميلاد" , "Value" => "Decision" , "Name" => "3"] ,
                                                                                                       ["Label" => "الجنس" , "Value" => "Decision" , "Name" => "4"] ,
                                                                                                       ["Label" => "الوضع العائلي" , "Value" => "Decision" , "Name" => "5"] ,
                                                                                                       /*["Label" => "المهنة" , "Value" => "Decision" , "Name" => "6"] ,*/
                                                                                                       ["Label" => "تاريخ انتهاء الخدمة" , "Value" => "Decision" , "Name" => "7"] ,
                                                                                                       ["Label" => "نوع العقد" , "Value" => "Decision" , "Name" => "8"] ,
                                                                                                       /*["Label" => "الحاصلين على التأمين" , "Value" => "Decision" , "Name" => "9"] ,*/
                                                                                                       ["Label" => "الدرجة العلمية" , "Value" => "Decision" , "Name" => "10"] ,
                                                                                                       ["Label" => "المهارات اللغوية" , "Value" => "Decision" , "Name" => "11"] ,
                                                                                                       ["Label" => "العضويات" , "Value" => "Decision" , "Name" => "12"] ,
                                                                                                       /*["Label" => "تاريخ العمل لاول مرة" , "Value" => "Decision" , "Name" => "13"] ,*/
                                                                                                       ["Label" => "المنصب الوظيفي" , "Value" => "Decision" , "Name" => "14"] ,
                                                                                                       /*["Label" => "تاريخ المكافئات" , "Value" => "Decision" , "Name" => "15"] ,*/
                                                                                                       /*["Label" => "تاريخ العقوبات" , "Value" => "Decision" , "Name" => "16"] ,*/
                                                                                                       ["Label" => "تاريخ المرتمرات والدورات" , "Value" => "Decision" , "Name" => "17"] ,
                                                                                                       /*["Label" => "التقييم" , "Value" => "Decision" , "Name" => "18"] ,*/
                                                                                                       /*["Label" => "العمل الاضافي" , "Value" => "Decision" , "Name" => "19"] ,*/
                                                                                                       ["Label" => "مجال الرواتب" , "Value" => "Decision" , "Name" => "20"] ,
                                                                                                       ["Label" => "حد راتب" , "Value" => "Decision" , "Name" => "21"] ,
                                                                                                       /*["Label" => "الفئة الوظيفية" , "Value" => "Decision" , "Name" => "22"] ,*/
                                                                                                       /*["Label" => "الدرجة العملية" , "Value" => "Decision" , "Name" => "23"] ,*/
                                                                                                       ["Label" => "القسم التابع له" , "Value" => "Decision" , "Name" => "24"] ,
                                                                                                       ["Label" => "نوع القرار المطبق بحق موظف" , "Value" => "Decision" , "Name" => "25"] ,
                                                                                                       ["Label" => "تاريخ القرارات المطبقة على الموظف" , "Value" => "Decision" , "Name" => "26"] ,
                                                                                                       ["Label" => "الوظيفة الحالية" , "Value" => "Decision" , "Name" => "27"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Sub Date --}}
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="1">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ المباشرة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="DirectWorkDateFrom"
                                                                                       name="from_contract_direct_date"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="StartDateDirectWorkDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="DirectWorkDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="DirectWorkDateTo"
                                                                                       name="to_contract_direct_date"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="StartDateDirectWorkDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="DirectWorkDateTo">ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="3">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ الميلاد
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="BirthdayDateFrom"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="StartDateBirthdayDate"
                                                                                       name="from_birth_date"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="BirthdayDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="BirthdayDateTo"
                                                                                       name="to_birth_date"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="StartDateBirthdayDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="BirthdayDateTo">ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="7">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ انتهاء الخدمة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="ServiceEndDateFrom"
                                                                                       name="from_end_break_date"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="StartDateServiceEndDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="ServiceEndDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="ServiceEndDateTo"
                                                                                       name="to_end_break_date"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="StartDateServiceEndDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="ServiceEndDateTo">ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="26">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ التقارير
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="DecisionDateFrom"
                                                                                       name="from_decision_date"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="StartDateDecisionDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="DecisionDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="DecisionDateTo"
                                                                                       name="to_decision_date"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="StartDateDecisionDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="DecisionDateTo">ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    <div class="VisibilityTarget ListData"--}}
{{--                                                         data-TargetName="CreateReportBy"--}}
{{--                                                         data-TargetCheckboxName="13">--}}
{{--                                                        <div class="ListData__Head">--}}
{{--                                                            <h4 class="ListData__Title">--}}
{{--                                                                تقرير حسب تاريخ العمل لاول مرة--}}
{{--                                                            </h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="ListData__Content">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="WorkDateForFirstTimeFrom"--}}
{{--                                                                                       class="Date__Field"--}}
{{--                                                                                       TargetDateStartName="WorkDateForFirstTime"--}}
{{--                                                                                       type="text" placeholder="يبدأ من تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="WorkDateForFirstTimeFrom">يبدأ من تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="WorkDateForFirstTimeTo"--}}
{{--                                                                                       class="DateEndFromStart Date__Field"--}}
{{--                                                                                       data-StartDateName="WorkDateForFirstTime"--}}
{{--                                                                                       type="text" placeholder="ينتهي عند تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="WorkDateForFirstTimeTo">ينتهي عند تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="VisibilityTarget ListData"--}}
{{--                                                         data-TargetName="CreateReportBy"--}}
{{--                                                         data-TargetCheckboxName="15">--}}
{{--                                                        <div class="ListData__Head">--}}
{{--                                                            <h4 class="ListData__Title">--}}
{{--                                                                تقرير حسب تاريخ الكافئة--}}
{{--                                                            </h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="ListData__Content">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="BonusDateFrom"--}}
{{--                                                                                       class="Date__Field"--}}
{{--                                                                                       TargetDateStartName="BonusDate"--}}
{{--                                                                                       type="text" placeholder="يبدأ من تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="BonusDateFrom">يبدأ من تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="BonusDateTo"--}}
{{--                                                                                       class="DateEndFromStart Date__Field"--}}
{{--                                                                                       data-StartDateName="BonusDate"--}}
{{--                                                                                       type="text" placeholder="ينتهي عند تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="BonusDateTo">ينتهي عند تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="VisibilityTarget ListData"--}}
{{--                                                         data-TargetName="CreateReportBy"--}}
{{--                                                         data-TargetCheckboxName="16">--}}
{{--                                                        <div class="ListData__Head">--}}
{{--                                                            <h4 class="ListData__Title">--}}
{{--                                                                تقرير حسب تاريخ العقوبة--}}
{{--                                                            </h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="ListData__Content">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="PunishmentDateFrom"--}}
{{--                                                                                       class="Date__Field"--}}
{{--                                                                                       TargetDateStartName="PunishmentDate"--}}
{{--                                                                                       type="text" placeholder="يبدأ من تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="PunishmentDateFrom">يبدأ من تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="PunishmentDateTo"--}}
{{--                                                                                       class="DateEndFromStart Date__Field"--}}
{{--                                                                                       data-StartDateName="PunishmentDate"--}}
{{--                                                                                       type="text" placeholder="ينتهي عند تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="PunishmentDateTo">--}}
{{--                                                                                    ينتهي عند تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="17">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ الدورات والمؤتمرات
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="CoursesDateFrom"
                                                                                       class="Date__Field"
                                                                                       name="from_conference_date"
                                                                                       TargetDateStartName="CoursesDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="CoursesDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="CoursesDateTo"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="CoursesDate"
                                                                                       name="to_conference_date"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="CoursesDateTo">
                                                                                    ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    <div class="VisibilityTarget ListData">--}}
{{--                                                        <div class="ListData__Head"--}}
{{--                                                             data-TargetName="CreateReportBy"--}}
{{--                                                             data-TargetCheckboxName="18">--}}
{{--                                                            <h4 class="ListData__Title">--}}
{{--                                                                تقرير حسب تاريخ التقييم--}}
{{--                                                            </h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="ListData__Content">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="evaluationDateFrom"--}}
{{--                                                                                       class="Date__Field"--}}
{{--                                                                                       TargetDateStartName="evaluationDate"--}}
{{--                                                                                       type="text" placeholder="يبدأ من تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="evaluationDateFrom">يبدأ من تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="evaluationDateTo"--}}
{{--                                                                                       class="DateEndFromStart Date__Field"--}}
{{--                                                                                       data-StartDateName="evaluationDate"--}}
{{--                                                                                       type="text" placeholder="ينتهي عند تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="evaluationDateTo">--}}
{{--                                                                                    ينتهي عند تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="VisibilityTarget ListData"--}}
{{--                                                         data-TargetName="CreateReportBy"--}}
{{--                                                         data-TargetCheckboxName="19">--}}
{{--                                                        <div class="ListData__Head">--}}
{{--                                                            <h4 class="ListData__Title">--}}
{{--                                                                تقرير حسب تاريخ العمل الاضافي--}}
{{--                                                            </h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="ListData__Content">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="OvertimeDateFrom"--}}
{{--                                                                                       class="Date__Field"--}}
{{--                                                                                       TargetDateStartName="OvertimeDate"--}}
{{--                                                                                       type="text" placeholder="يبدأ من تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="OvertimeDateFrom">يبدأ من تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="OvertimeDateTo"--}}
{{--                                                                                       class="DateEndFromStart Date__Field"--}}
{{--                                                                                       data-StartDateName="OvertimeDate"--}}
{{--                                                                                       type="text" placeholder="ينتهي عند تاريخ"--}}
{{--                                                                                       required>--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="OvertimeDateTo">--}}
{{--                                                                                    ينتهي عند تاريخ</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    {{-- Employee Information --}}
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="4,5,10,14">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات الموظف
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                      data-TargetName="CreateReportBy"
                                                                      data-TargetCheckboxName="4">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $GenderTypes = [] ;
                                                                                    foreach ($gender as $Index => $GenderType) {
                                                                                        array_push($GenderTypes , [ "Label" => $GenderType ,
                                                                                             "Value" => $GenderType] ) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , [
                                                                                        'Name' => "gender" , "DefaultValue" => "" ,
                                                                                        "Label" => "الجنس" , "Required" => "true",
                                                                                        "Options" => $GenderTypes
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="5">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $FamilyStatus = [] ;
                                                                                    foreach ($family_status as $Level) {
                                                                                        array_push($FamilyStatus , [ "Label" => $Level
                                                                                            , "Value" => $Level , "Name" => "family_status[]"] ) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.multiSelector" , [
                                                                                    'Name' => "_" , "Required" => "true" ,
                                                                                    "NameIDs" => "FamilyStatusID" ,
                                                                                    "DefaultValue" => "" , "Label" => "الوضع العائلي" ,
                                                                                    "Options" => $FamilyStatus
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Select">--}}
{{--                                                                            <div class="Select__Area">--}}
{{--                                                                                @include("System.Components.selector" , [--}}
{{--                                                                                    'Name' => "Type" , "Required" => "true" ,--}}
{{--                                                                                    "DefaultValue" => "" , "Label" => "المهنة" ,--}}
{{--                                                                                    "Options" => [--}}
{{--                                                                                        ["Label" => "فرونت" , "Value" => "Decision"] ,--}}
{{--                                                                                        ["Label" => "باك" , "Value" => "Decision"]--}}
{{--                                                                                    ]--}}
{{--                                                                                ])--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="10">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $EducationLevel = [] ;
                                                                                    foreach ($education_level as $index=>$Level) {
                                                                                        array_push($EducationLevel , [ "Label" => $Level
                                                                                            , "Value" => $index , "Name" => "education_level_id[]"] ) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.multiSelector" , [
                                                                                        'Name' => "_" , "NameIDs" => "EducationID" ,
                                                                                        "DefaultValue" => "" , "Label" => "الدرجة العلمية" ,
                                                                                        "Options" => $EducationLevel
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="14">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $Positions = [] ;
                                                                                    foreach ($position as $index=>$ItemPosition) {
                                                                                        array_push($Positions , [ "Label" => $ItemPosition
                                                                                            , "Value" => $index , "Name" => "position_id[]" ]) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.multiSelector" , [
                                                                                        'Name' => "_" , "Required" => "true" ,
                                                                                        "NameIDs" => "PositionID" , "DefaultValue" => "" ,
                                                                                        "Label" => "المنصب الوظيفي" ,
                                                                                        "Options" => $Positions
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Work Employee Information --}}
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="8,12,18,22,24,25,27">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات عمل الموظف
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="8">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $ContractType = [] ;
                                                                                    foreach ($contract_type as $Type) {
                                                                                        array_push($ContractType , [ "Label" => $Type ,
                                                                                             "Value" => $Type]) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.selector" , [
                                                                                        'Name' => "contract_type" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "نوع العقد" ,
                                                                                        "Options" => $ContractType
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
{{--                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"--}}
{{--                                                                     data-TargetName="CreateReportBy"--}}
{{--                                                                     data-TargetCheckboxName="18">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="RatingPercentage" class="Input__Field"--}}
{{--                                                                                       type="number" name="name"--}}
{{--                                                                                       min="0" required--}}
{{--                                                                                       placeholder="نسبة التقييم">--}}
{{--                                                                                <label class="Input__Label" for="RatingPercentage">--}}
{{--                                                                                    نسبة التقييم--}}
{{--                                                                                </label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="24">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $Departments = [] ;
                                                                                    foreach ($sections as $index=>$Type) {
                                                                                        array_push($Departments , [ "Label" => $Type
                                                                                            , "Value" => $index , "Name" => "section_id[]"]) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.multiSelector" , [
                                                                                        'Name' => "_" , "Required" => "true" ,
                                                                                        "NameIDs" => "SessionID" , "DefaultValue" => "" ,
                                                                                        "Label" => "القسم التابع له" ,
                                                                                        "Options" => $Departments
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="12">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $MemberShip = [] ;
                                                                                    foreach ($membership_type as $index=>$Type) {
                                                                                        array_push($MemberShip , [ "Label" => $Type
                                                                                            , "Value" => $index , "Name" => "membership_type_id[]"]) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.multiSelector" , [
                                                                                        'Name' => "_" , "Required" => "true" ,
                                                                                        "NameIDs" => "MemberShipID" , "DefaultValue" => "" ,
                                                                                        "Label" => "العضويات" ,
                                                                                        "Options" => $MemberShip
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="25">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $TypeDecision = [] ;
                                                                                    foreach ($type_decision as $index=>$Type) {
                                                                                        array_push($TypeDecision , [ "Label" => $Type
                                                                                            , "Value" => $index , "Name" => "type_decision_id[]"]) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.multiSelector" , [
                                                                                        'Name' => "_" , "Required" => "true" ,
                                                                                        "NameIDs" => "DecisionID" , "DefaultValue" => "" ,
                                                                                        "Label" => "نوع القرارات" ,
                                                                                        "Options" => $TypeDecision
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="27">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="CurrentJobID" class="Input__Field"
                                                                                       type="text" name="current_job"
                                                                                       placeholder="العمل الحالي">
                                                                                <label class="Input__Label" for="CurrentJobID">
                                                                                    العمل الحالي
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Salary Employee Information --}}
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="20,21">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات راتب الموظف
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="20">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="FromSalary" class="Input__Field"
                                                                                       type="number" name="from_salary"
                                                                                       placeholder="من الراتب">
                                                                                <label class="Input__Label" for="FromSalary">
                                                                                    من الراتب
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="20">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="ToSalary" class="Input__Field"
                                                                                       type="number" name="to_salary"
                                                                                       placeholder="الى الراتب">
                                                                                <label class="Input__Label" for="ToSalary">
                                                                                    الى الراتب
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="CreateReportBy"
                                                                     data-TargetCheckboxName="21">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="TopSalary" class="Input__Field"
                                                                                       type="number" name="salary"
                                                                                       placeholder="سقف الراتب">
                                                                                <label class="Input__Label" for="TopSalary">
                                                                                    سقف الراتب
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="VisibilityTarget ListData"
                                                         data-TargetName="CreateReportBy"
                                                         data-TargetCheckboxName="11"
                                                         id="ReportLanguage">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات اللغة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div id="MainComponentLanguage">
                                                                <div class="CloneItem ListData__Group"
                                                                     data-NameElement="LangData">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group LanguageName">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $LangList = [] ;
                                                                                            foreach ($language as $Index => $LangItem) {
                                                                                                array_push($LangList , [
                                                                                                    "Label" => $LangItem , "Value" => $Index]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "_" , "Required" => "true" ,
                                                                                            "DefaultValue" => "" , "Label" => "اللغة المحددة" ,
                                                                                            "Options" => $LangList
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                            $LangList = [] ;
                                                                            foreach ($language_skills_read_write
                                                                            as $LangSkill) {
                                                                                array_push($LangList , [
                                                                                    "Label" => $LangSkill
                                                                                    , "Value" => $LangSkill]) ;
                                                                            }
                                                                        @endphp
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group LanguageWrite">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "_" , "Required" => "true" ,
                                                                                            "DefaultValue" => "" , "Label" => "مهارة الكتابة" ,
                                                                                            "Options" => $LangList
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group LanguageRead">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "_" , "Required" => "true" ,
                                                                                            "DefaultValue" => "" , "Label" => "مهارة القراءة" ,
                                                                                            "Options" => $LangList
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ParentClone"
                                                                 data-NameElement="LangData"></div>
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-12 Center">
                                                                    <i class="ButtonCloneForm material-icons Button Button--Primary"
                                                                       data-TargetElementName="LangData"
                                                                       data-IsCloneClear="true"
                                                                       id="AddLanguageButton"
                                                                       title="Add Another Day">add</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Button Submit --}}
                                                    <div class="Row">
                                                        <div class="Col">
                                                            <div class="Form__Group">
                                                                <div class="Form__Button">
                                                                    <button class="Button Send"
                                                                            type="submit">عرض النتائج</button>
                                                                </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection
