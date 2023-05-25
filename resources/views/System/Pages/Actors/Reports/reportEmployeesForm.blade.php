@extends("System.Pages.globalPage")

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
                                                <form class="Form Form--Dark" action="#" method="post">
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
                                                                    <div class="Col-12">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.multiSelector" , [
                                                                                        'Name' => "Type" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "تقرير حسب" ,
                                                                                        "Options" => [ ["Label" => "تاريخ المباشرة" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "مكان العمل" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "تاريخ الميلاد" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "الجنس" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "الوضع العائلي" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "المهنة" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "تاريخ انتهاء الخدمة" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "نوع العقد" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "الحاصلين على التأمين" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "الدرجة العلمية" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "المهارات اللغوية" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "العضويات" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "تاريخ العمل لاول مرة" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "المنصب الوظيفي" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "تاريخ المكافئات" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "تاريخ العقوبات" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "تاريخ المرتمرات والدورات" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "التقييم" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "العمل الاضافي" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "مجال الرواتب" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "حد راتب" , "Value" => "Decision" , "Name" => "s"] ,
                                                                                                       ["Label" => "الفئة الوظيفية" , "Value" => "Decision" , "Name" => "s"] ,
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
                                                    <div class="ListData">
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
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="StartDateDirectWorkDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required
                                                                                >
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
                                                    <div class="ListData">
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
                                                    <div class="ListData">
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
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ العمل لاول مرة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="WorkDateForFirstTimeFrom"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="WorkDateForFirstTime"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="WorkDateForFirstTimeFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="WorkDateForFirstTimeTo"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="WorkDateForFirstTime"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="WorkDateForFirstTimeTo">ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ الكافئة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="BonusDateFrom"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="BonusDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="BonusDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="BonusDateTo"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="BonusDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="BonusDateTo">ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ العقوبة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="PunishmentDateFrom"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="PunishmentDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="PunishmentDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="PunishmentDateTo"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="PunishmentDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="PunishmentDateTo">
                                                                                    ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
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
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ التقييم
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="evaluationDateFrom"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="evaluationDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="evaluationDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="evaluationDateTo"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="evaluationDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="evaluationDateTo">
                                                                                    ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب تاريخ العمل الاضافي
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="OvertimeDateFrom"
                                                                                       class="Date__Field"
                                                                                       TargetDateStartName="OvertimeDate"
                                                                                       type="text" placeholder="يبدأ من تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="OvertimeDateFrom">يبدأ من تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="OvertimeDateTo"
                                                                                       class="DateEndFromStart Date__Field"
                                                                                       data-StartDateName="OvertimeDate"
                                                                                       type="text" placeholder="ينتهي عند تاريخ"
                                                                                       required>
                                                                                <label class="Date__Label"
                                                                                       for="OvertimeDateTo">
                                                                                    ينتهي عند تاريخ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Employee Information --}}
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات الموظف
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "الجنس" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "ذكر" , "Value" => "Decision"] ,
                                                                                        ["Label" => "انثى" , "Value" => "Decision"]
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "الوضع العائلي" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "عازب" , "Value" => "Decision"] ,
                                                                                        ["Label" => "متزوج" , "Value" => "Decision"]
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "المهنة" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "فرونت" , "Value" => "Decision"] ,
                                                                                        ["Label" => "باك" , "Value" => "Decision"]
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "الدرجة العملية" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "اعدادي" , "Value" => "Decision"] ,
                                                                                        ["Label" => "ثانوي" , "Value" => "Decision"] ,
                                                                                        ["Label" => "جامعي" , "Value" => "Decision"]
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "المنصب الوظيفي" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "مبرمج" , "Value" => "Decision"] ,
                                                                                        ["Label" => "مدير" , "Value" => "Decision"] ,
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.multiSelector" , [
                                                                                    'Label' => "المهارات اللغوية" ,
                                                                                    'Options' => [
                                                                                        ['Value' => "1" , 'Label' => 'انجليزية' , "Name" => "1"] ,
                                                                                        ['Value' => "2" , 'Label' => 'عربية' , "Name" => "2"]
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Work Employee Information --}}
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات عمل الموظف
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "نوع العقد" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "دائم" , "Value" => "Decision"] ,
                                                                                        ["Label" => "مؤقت" , "Value" => "Decision"]
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "العضوية" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "دائمة" , "Value" => "Decision"] ,
                                                                                        ["Label" => "مؤقتة" , "Value" => "Decision"] ,
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Type" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "الفئة الوظيفية" ,
                                                                                    "Options" => [
                                                                                        ["Label" => "مبرمج" , "Value" => "Decision"] ,
                                                                                        ["Label" => "مدير" , "Value" => "Decision"] ,
                                                                                    ]
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="RatingPercentage" class="Input__Field"
                                                                                       type="number" name="name"
                                                                                       placeholder="نسبة التقييم">
                                                                                <label class="Input__Label" for="RatingPercentage">
                                                                                    نسبة التقييم
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Salary Employee Information --}}
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                تقرير حسب معلومات راتب الموظف
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="FromSalary" class="Input__Field"
                                                                                       type="number" name="name"
                                                                                       placeholder="من الراتب">
                                                                                <label class="Input__Label" for="FromSalary">
                                                                                    من الراتب
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="ToSalary" class="Input__Field"
                                                                                       type="number" name="name"
                                                                                       placeholder="الى الراتب">
                                                                                <label class="Input__Label" for="ToSalary">
                                                                                    الى الراتب
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="TopSalary" class="Input__Field"
                                                                                       type="number" name="name"
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
