@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--RequestOvertimeForm">
        <div class="RequestOvertimeForm">
            <div class="RequestOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تسجيل طلب عمل اضافي" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="RequestOvertimeForm__Content">
                <div class="ViewUsers__Content">
                    <div class="Row">
                        <div class="RequestOvertimeForm__Form">
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
                                                          action="#" method="post">
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
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "#" , "Required" => "true" ,
                                                                                            "DefaultValue" => ""
                                                                                             , "Label" => "الموظف الطالب للعمل الاضافي" ,
                                                                                            "Options" => [
                                                                                                [ "Label" => "امير" , "Value" => "0" ] ,
                                                                                                [ "Label" => "منير" , "Value" => "0" ] ,
                                                                                                [ "Label" => "انس" , "Value" => "0" ] ,
                                                                                                [ "Label" => "حمزة" , "Value" => "0" ]
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
                                                                                            'Name' => "#" , "Required" => "true" ,
                                                                                            "DefaultValue" => ""
                                                                                             , "Label" => "نوع العمل الاضافي" ,
                                                                                            "Options" => [
                                                                                                [ "Label" => "اعياد" , "Value" => "0" ] ,
                                                                                                [ "Label" => "ايام الدوام" , "Value" => "0" ] ,
                                                                                                [ "Label" => "ايام العطل" , "Value" => "0" ]
                                                                                            ]
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="FromStartDate" class="DateMinToday Date__Field"
                                                                                               TargetDateStartName="StartDateRequest"
                                                                                               type="date" name="date"
                                                                                               placeholder="تبدأ من تاريخ" required>
                                                                                        <label class="Date__Label" for="FromStartDate">
                                                                                            تبدأ من تاريخ
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="ToEndDate"
                                                                                               class="DateEndFromStart Date__Field"
                                                                                               data-StartDateName="StartDateRequest"
                                                                                               type="date" name="End"
                                                                                               placeholder="تنتهي عند تاريخ">
                                                                                        <label class="Date__Label" for="ToEndDate">
                                                                                            تنتهي عند تاريخ
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
                                                                    اوقات العمل الاضافي
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="VisibilityOption Col-4-md Col-6-sm"
                                                                             data-ElementsTargetName="DurationOvertime">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "#" , "Required" => "true" ,
                                                                                            "DefaultValue" => ""
                                                                                             , "Label" => "نوع مدة العمل الاضافي" ,
                                                                                            "Options" => [
                                                                                                [ "Label" => "يوم كامل" , "Value" => "0" ] ,
                                                                                                [ "Label" => "ساعات محددة" , "Value" => "1" ] ,
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
                                                                                            'Name' => "#" , "Required" => "true" ,
                                                                                            "DefaultValue" => ""
                                                                                             , "Label" => "يبدأ العمل الاضافي" ,
                                                                                            "Options" => [
                                                                                                [ "Label" => "قبل الدوام" , "Value" => "0" ] ,
                                                                                                [ "Label" => "بعد الدوام" , "Value" => "0" ] ,
                                                                                                [ "Label" => "في اي وقت" , "Value" => "0" ]
                                                                                            ]
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                             data-TargetName="DurationOvertime"
                                                                             data-TargetValue="1">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="DurationOvertime" class="Input__Field" type="number"
                                                                                               min="1" max="24" name="number"
                                                                                               placeholder="المدة الكاملة للعمل الاضافي" required>
                                                                                        <label class="Input__Label" for="DurationOvertime">
                                                                                            المدة الكاملة للعمل الاضافي
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-8-md Col-12-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="HourToAccept" class="Input__Field" type="number"
                                                                                               name="number" placeholder="@lang("decisionNumber")" required>
                                                                                        <label class="Input__Label" for="HourToAccept">
                                                                                            الساعات التي سيتم من بعدها احتساب العمل الاضافي
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
                                                                    اجر العمل الاضافي
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="SalaryOvertime" class="Input__Field" type="number"
                                                                                               name="number" placeholder="قيمة الزيادة بالساعة الواحدة"
                                                                                               required>
                                                                                        <label class="Input__Label" for="SalaryOvertime">
                                                                                            قيمة الزيادة بالساعة الواحدة
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="TaxOnSalaryOvertime" class="Input__Field" type="number"
                                                                                               name="number" placeholder="قيمة الضريبة للساعة الواحدة"
                                                                                               required>
                                                                                        <label class="Input__Label" for="TaxOnSalaryOvertime">
                                                                                            قيمة الضريبة للساعة الواحدة
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
                                                                                type="submit">@lang("addUser")</button>
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
        </div>
    </section>
@endsection
