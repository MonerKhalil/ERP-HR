@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeVacationForm">
        <div class="NewTypeVacationForm">
            <div class="NewTypeVacationForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تسجيل نوع اجازة جديد" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NewTypeVacationForm__Content">
                <div class="Row">
                    <div class="NewTypeVacationForm__Form">
                        <div class="Container--MainContent">
                            <div class="MessageProcessContainer">
                                @include("System.Components.messageProcess")
                            </div>
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark"
                                                      action="{{ isset($leaveType) ? route("system.leave_types.update" , $leaveType["id"])
                                                                : route("system.leave_types.store") }}"
                                                      method="post">
                                                @csrf
                                                @if(isset($leaveType))
                                                    @method("put")
                                                @endif
                                                <div class="ListData" >
                                                    <div class="ListData__Head">
                                                        <h4 class="ListData__Title">
                                                            معلومات الاجازة الاساسية
                                                        </h4>
                                                    </div>
                                                    <div class="ListData__Content">
                                                        <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="VacationName" class="Input__Field"
                                                                                           type="text" name="name"
                                                                                           value="{{ isset($leaveType) ? $leaveType["name"] : "" }}"
                                                                                           placeholder="اسم الاجازة" required>
                                                                                    <label class="Input__Label" for="VacationName">
                                                                                        اسم الاجازة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="VisibilityOption Form__Select"
                                                                                 data-VisibilityDefault="{{ isset($leaveType) ? $leaveType["type_effect_salary"] : "" }}"
                                                                                 data-ElementsTargetName="VacationTypeFields">
                                                                                <div class="Select__Area">
                                                                                    @php
                                                                                        $TypeEffectSalary = [] ;
                                                                                        foreach ($type_effect_salary as $TypeEffect) {
                                                                                            array_push($TypeEffectSalary , [ "Label" => $TypeEffect ,
                                                                                                 "Value" => $TypeEffect] ) ;
                                                                                        }
                                                                                    @endphp
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "type_effect_salary" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($leaveType) ? $leaveType["type_effect_salary"] : "" ,
                                                                                         "Label" => "نوع الاجازة" ,
                                                                                        "Options" => $TypeEffectSalary
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="VisibilityOption Form__Select"
                                                                                 data-VisibilityDefault="{{ isset($leaveType) ? $leaveType["leave_limited"] : "" }}"
                                                                                 data-ElementsTargetName="VacationTypeLimited">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "leave_limited" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($leaveType) ? $leaveType["leave_limited"] : "" ,
                                                                                        "Label" => "ايام الاجازات" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "مفتوحة" , "Value" => "0"] ,
                                                                                            [ "Label" => "محددة" , "Value" => "1"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationTypeLimited"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="VacationDurationYear" class="Input__Field"
                                                                                           type="number" name="max_days_per_years"
                                                                                           value="{{ isset($leaveType) ? $leaveType["max_days_per_years"] : "" }}"
                                                                                           min="1" max="365" required
                                                                                           placeholder="عدد ايام الاجازة في السنة">
                                                                                    <label class="Input__Label" for="VacationDurationYear">
                                                                                        عدد ايام الاجازة في السنة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
{{--                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"--}}
{{--                                                                         data-TargetName="VacationTypeLimited"--}}
{{--                                                                         data-TargetValue="1">--}}
{{--                                                                        <div class="Form__Group">--}}
{{--                                                                            <div class="Form__Input">--}}
{{--                                                                                <div class="Input__Area">--}}
{{--                                                                                    <input id="VacationMonthAllow" class="Input__Field"--}}
{{--                                                                                           type="text" name="max_days_per_month"--}}
{{--                                                                                           min="1" max="31" required--}}
{{--                                                                                           value="{{ isset($leaveType) ? $leaveType["max_days_per_month"] : "" }}"--}}
{{--                                                                                           placeholder="عدد الايام المسموحة بالشهر">--}}
{{--                                                                                    <label class="Input__Label" for="VacationMonthAllow">--}}
{{--                                                                                        عدد الايام المسموحة بالشهر--}}
{{--                                                                                    </label>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationTypeLimited"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="VisibilityOption Form__Select"
                                                                                 data-VisibilityDefault="{{ isset($leaveType) ? $leaveType["is_hourly"] : "" }}"
                                                                                 data-ElementsTargetName="VacationIsHour">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "is_hourly" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($leaveType) ? $leaveType["is_hourly"] : "" ,
                                                                                         "Label" => "هل الاجازة ساعية محددة" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "نعم" , "Value" => "1"] ,
                                                                                            [ "Label" => "لا" , "Value" => "0"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationIsHour"
                                                                         data-TargetValue="0">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "can_take_hours" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($leaveType) ? $leaveType["can_take_hours"] : "" ,
                                                                                         "Label" => "هل الاجازة ساعية مفتوحة" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "نعم" , "Value" => "1"] ,
                                                                                            [ "Label" => "لا" , "Value" => "0"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationIsHour"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="VacationDurationHour" class="Input__Field"
                                                                                           type="number" name="max_hours_per_day"
                                                                                           min="1" max="12" required
                                                                                           value="{{ isset($leaveType) ? $leaveType["max_hours_per_day"] : "" }}"
                                                                                           placeholder="عدد الساعات المسموحة في اليوم">
                                                                                    <label class="Input__Label" for="VacationDurationHour">
                                                                                        عدد الساعات المسموحة في اليوم
                                                                                    </label>
                                                                                </div>
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
                                                            معلومات خاصة بالموظف
                                                        </h4>
                                                    </div>
                                                    <div class="ListData__Content">
                                                        <div class="ListData__CustomItem">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="ExperienceYears" class="Input__Field"
                                                                                               type="number" name="years_employee_services"
                                                                                               min="0" required
                                                                                               value="{{ isset($leaveType) ? $leaveType["years_employee_services"] : "" }}"
                                                                                               placeholder="عدد سنوات العمل">
                                                                                        <label class="Input__Label" for="ExperienceYears">
                                                                                            عدد سنوات العمل
                                                                                        </label>
                                                                                    </div>
                                                                                    <label class="Form__Tips"
                                                                                           for="ExperienceYears">
                                                                                        <small>
                                                                                            عدد سنوات العمل التي يحتاج الموظف تحقيقها للحصول عل هذا النوع من الاجازات
                                                                                        </small>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="ExperienceYearsExtra" class="Input__Field"
                                                                                               type="number" name="number_years_services_increment_days"
                                                                                               min="1" required
                                                                                               value="{{ isset($leaveType) ? $leaveType["number_years_services_increment_days"] : "" }}"
                                                                                               placeholder="عدد سنوات العمل الاضافية">
                                                                                        <label class="Input__Label" for="ExperienceYearsExtra">
                                                                                            عدد سنوات العمل الاضافية
                                                                                        </label>
                                                                                    </div>
                                                                                    <label class="Form__Tips"
                                                                                           for="ExperienceYearsExtra">
                                                                                        <small>
                                                                                            عدد سنوات العمل الاضافية التي يحتاجها الموظف من اجل زيادة اجازاته في المؤسسة
                                                                                        </small>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="MaxExperienceYearsExtra" class="Input__Field"
                                                                                               type="number" name="count_available_in_service"
                                                                                               value="{{ isset($leaveType) ? $leaveType["count_available_in_service"] : "" }}"
                                                                                               placeholder="عدد مرات زيادة الاجازات" min="1" required>
                                                                                        <label class="Input__Label" for="MaxExperienceYearsExtra">
                                                                                            عدد مرات زيادة الاجازات
                                                                                        </label>
                                                                                    </div>
                                                                                    <label class="Form__Tips"
                                                                                           for="MaxExperienceYearsExtra">
                                                                                        <small>
                                                                                            الحد الاقصى لعدد المرات التي سيتم زيادة الاجازة عند زيادة سنوات العمل
                                                                                        </small>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="VacationDaysExtra" class="Input__Field" min="1"
                                                                                               type="number" name="count_days_increment_days"
                                                                                               value="{{ isset($leaveType) ? $leaveType["count_days_increment_days"] : "" }}"
                                                                                               placeholder="عدد الايام المزادة">
                                                                                        <label class="Input__Label" for="VacationDaysExtra">
                                                                                            عدد الايام المزادة
                                                                                        </label>
                                                                                    </div>
                                                                                    <label class="Form__Tips"
                                                                                           for="VacationDaysExtra">
                                                                                        <small>
                                                                                            عدد الايام التي سيتم زيادتها على الاجازات في حال تحقيق العمل الاضافي
                                                                                        </small>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
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
                                                                                        'Name' => "gender" ,
                                                                                        "DefaultValue" => isset($leaveType) ? $leaveType["gender"] : "" ,
                                                                                        "Label" => "الجنس" , "Required" => "true",
                                                                                        "Options" => $GenderTypes
                                                                                    ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="VacationTypeFields"
                                                                     data-TargetValue="effect_salary">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="SalaryDiscount" class="Input__Field"
                                                                                       type="number" name="rate_effect_salary"
                                                                                       value="{{ isset($leaveType) ? $leaveType["rate_effect_salary"] : "" }}"
                                                                                       min="0" max="100" required
                                                                                       placeholder="نسبة الخصم من الراتب لليوم الواحد">
                                                                                <label class="Input__Label" for="SalaryDiscount">
                                                                                    نسبة الخصم من الراتب لليوم الواحد
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="Row GapC-1-5">
                                                    <div class="Col">
                                                        <div class="Form__Group">
                                                            <div class="Form__Button">
                                                                <button class="Button Send"
                                                                        type="submit">اضافة نوع جديد</button>
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
