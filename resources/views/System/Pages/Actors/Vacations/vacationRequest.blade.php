@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--VacationRequestPage">
        <div class="VacationRequestPage">
            <div class="VacationRequestPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "طلب اجازة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="VacationRequestPage__Content">
                <div class="Row">
                    <div class="VacationRequestPage__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark" action="#"
                                                      method="post">
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
                                                                                        'Name' => "VacationType" , "Required" => "true" ,
                                                                                        "DefaultValue" => "", "Label" => "نوع الاجازة المرادة" ,
                                                                                        "Options" => [
                                                                                            ["Label" => "مرضية" , "Value" => "0"] ,
                                                                                            ["Label" => "سفر" , "Value" => "1"] ,
                                                                                            ["Label" => "حج" , "Value" => "2"] ,
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
                                                    <div id="VacationListDate" class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                ايام واوقات الاجازة المرادة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="CloneItem ListData__Group"
                                                                 data-NameElement="VacationDetails">
                                                                <div class="ListData__GroupTitle">
                                                                    <span class="Title"></span>
                                                                </div>
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="VacationFromDate"
                                                                                           class="MinimumNow Date__Field"
                                                                                           type="text" name="VacationFromDate"
                                                                                           placeholder="يوم الاجازات المرادة"
                                                                                           required>
                                                                                    <label class="Date__Label" for="VacationFromDate">
                                                                                        يوم الاجازات المرادة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="VisibilityOption Form__Select"
                                                                                 data-ElementsTargetName="VacationNaturalFields">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "VacationNatural" , "Required" => "true" ,
                                                                                        "DefaultValue" => "", "Label" => "طبيعة الاجازة" ,
                                                                                        "Options" => [
                                                                                            ["Label" => "كاملة" , "Value" => "0"] ,
                                                                                            ["Label" => "جزئية" , "Value" => "1"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationNaturalFields"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="VacationStartTime"
                                                                                           class="TimeNoDate Date__Field"
                                                                                           type="text" name="VacationStartTime"
                                                                                           placeholder="تبدأ من الساعة"
                                                                                           required>
                                                                                    <label class="Date__Label"
                                                                                           for="VacationStartTime">
                                                                                        تبدأ من الساعة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="VacationNaturalFields"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="VacationEndTime"
                                                                                           class="TimeNoDate Date__Field"
                                                                                           type="text" name="VacationEndTime"
                                                                                           placeholder="تنتهي عند الساعة"
                                                                                           required>
                                                                                    <label class="Date__Label"
                                                                                           for="VacationEndTime">
                                                                                        تنتهي عند الساعة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="ReasonVacation" class="Input__Field"
                                                                                           type="text" name="ReasonVacation"
                                                                                           placeholder="سبب الاجازة">
                                                                                    <label class="Input__Label" for="ReasonVacation">
                                                                                        سبب الاجازة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ParentClone"
                                                                 data-NameElement="VacationDetails"></div>
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-12 Center">
                                                                    <i class="ButtonCloneForm material-icons Button Button--Primary"
                                                                       data-TargetElementName="VacationDetails"
                                                                       data-IsCloneClear="true"
                                                                       title="Add Another Day">add</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Row">
                                                        <div class="Col">
                                                            <div class="Form__Group">
                                                                <div class="Form__Button">
                                                                    <button class="Button Send"
                                                                            type="submit">طلب اجازة</button>
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
