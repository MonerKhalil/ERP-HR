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
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    {{-- Main --}}
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "Type" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "تقرير حسب" ,
                                                                                        "Options" => [ ["Label" => "تاريخ المباشرة" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "مكان العمل" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "تاريخ الميلاد" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "الجنس" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "الوضع العائلي" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "المهنة" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "تاريخ انتهاء الخدمة" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "نوع العقد" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "الحاصلين على التأمين" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "الدرجة العلمية" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "المهارات اللغوية" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "العضويات" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "تاريخ العمل لاول مرة" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "المنصب الوظيفي" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "تاريخ المكافئات" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "تاريخ العقوبات" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "تاريخ المرتمرات والدورات" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "التقييم" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "العمل الاضافي" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "مجال الرواتب" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "حد راتب" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "الفئة الوظيفية" , "Value" => "Decision"] ,
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Sub Date --}}
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="DirectWorkDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ المباشرة"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="DirectWorkDate">تاريخ المباشرة</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="BirthdayDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ الميلاد"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="BirthdayDate">تاريخ الميلاد</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="ServiceEndDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ انتهاء الخدمة"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="ServiceEndDate">تاريخ انتهاء الخدمة</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="WorkDateForFirstTime"
                                                                                           class="Date__Field"
                                                                                           type="text" name="name"
                                                                                           placeholder="تاريخ العمل لاول مرة"
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="WorkDateForFirstTime">تاريخ العمل لاول مرة</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="BonusDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ المكافئة"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="BonusDate">تاريخ المكافئة</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="PunishmentDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ العقوية"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="BonusDate">تاريخ العقوية</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="CoursesDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ الدورات والمرتمرات"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="CoursesDate">تاريخ الدورات والمؤتمرات</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="evaluationDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ التقييم"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="evaluationDate">تاريخ التقييم</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="OvertimeDate"
                                                                                           class="RangeData Date__Field"
                                                                                           type="text" placeholder="تاريخ العمل الاضافي"
                                                                                           date-StartDateName="startDate"
                                                                                           date-EndDateName="endDate"
                                                                                           required
                                                                                    >
                                                                                    <label class="Date__Label"
                                                                                           for="OvertimeDate">تاريخ العمل الاضافي</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- Sub Selector --}}
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
                                                                    {{-- Sub MultiSelector --}}
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
                                                                    {{-- Sub Numbers --}}
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
                                                    </div>
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
