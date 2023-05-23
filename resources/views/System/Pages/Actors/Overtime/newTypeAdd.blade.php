@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeOvertimeForm">
        <div class="NewTypeOvertimeForm">
            <div class="NewTypeOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تسجيل نوع عمل اضافي جديد" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NewTypeOvertimeForm__Content">
                <div class="Row">
                    <div class="NewTypeOvertimeForm__Form">
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
                                                                معلومات العمل الاضافي الاساسية
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
                                                                                           placeholder="اسم النوع">
                                                                                    <label class="Input__Label" for="VacationName">
                                                                                        اسم النوع
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityOption Col-4-md Col-6-sm"
                                                                         data-ElementsTargetName="DateTemp">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "HourVacationApply" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "طبيعية هذا النوع" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "مؤقت" , "Value" => "0"] ,
                                                                                            [ "Label" => "دائم" , "Value" => "1"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="DateTemp"
                                                                         data-TargetValue="0">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="DateDecision" class="DateMinToday Date__Field"
                                                                                           TargetDateStartName="StartDateDecision"
                                                                                           value="{{isset($decision) ? $decision["date"] : ""}}"
                                                                                           type="date" name="date"
                                                                                           placeholder="من تاريخ"
                                                                                           required>
                                                                                    <label class="Date__Label"
                                                                                           for="DateDecision">
                                                                                        من تاريخ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="DateTemp"
                                                                         data-TargetValue="0">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="DateDecision" class="DateEndFromStart Date__Field"
                                                                                           data-StartDateName="StartDateDecision"
                                                                                           value="{{isset($decision) ? $decision["date"] : ""}}"
                                                                                           type="date" name="date"
                                                                                           placeholder="حتى تاريخ"
                                                                                           required>
                                                                                    <label class="Date__Label"
                                                                                           for="DateDecision">
                                                                                        حتى تاريخ
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
