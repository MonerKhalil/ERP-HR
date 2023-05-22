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
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark" action="#"
                                                  method="post">
                                                @csrf
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
                                                                                           type="text" name="VacationName"
                                                                                           placeholder="اسم الاجازة">
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
                                                                                 data-ElementsTargetName="VacationTypeFields">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "TypeDurationVacation" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "نوع الاجازة" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "براتب" , "Value" => "0"] ,
                                                                                            [ "Label" => "بلاراتب" , "Value" => "1"]
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
                                                                                    <input id="VacationDurationYear" class="Input__Field"
                                                                                           type="number" name="VacationDurationYear"
                                                                                           min="1" max="365"
                                                                                           placeholder="عدد ايام الاجازة في السنة">
                                                                                    <label class="Input__Label" for="VacationDurationYear">
                                                                                        عدد ايام الاجازة في السنة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="VacationMonthAllow" class="Input__Field"
                                                                                           type="text" name="VacationMonthAllow"
                                                                                           min="1" max="31"
                                                                                           placeholder="عدد الايام المسموحة بالشهر">
                                                                                    <label class="Input__Label" for="VacationMonthAllow">
                                                                                        عدد الايام المسموحة بالشهر
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationTypeFields"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="SalaryDiscount" class="Input__Field"
                                                                                           type="text" name="SalaryDiscount"
                                                                                           placeholder="نسبة الخصم من الراتب لليوم الواحد">
                                                                                    <label class="Input__Label" for="SalaryDiscount">
                                                                                        نسبة الخصم من الراتب لليوم الواحد
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "HourVacationApply" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "تطبيق الاجازات الساعية عليها" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "نعم" , "Value" => "0"] ,
                                                                                            [ "Label" => "لا" , "Value" => "1"]
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
