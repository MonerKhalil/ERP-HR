@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--VacationRequestPage">
        <div class="VacationRequestPage" id="VacationAvailable">
            <div class="VacationRequestPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض اجازاتي المتاحة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="VacationRequestPage__Content">
                <div class="Row">
                    <div class="VacationRequestPage__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Col-12 Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="IgnoreSubmit Form Form--Dark"
                                                      id="FormVacationAvailable"
                                                      action="{{ url("system/leaves/count/leaves") }}"
                                                      method="get">
                                                    @csrf
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                نوع الاجازة المطلوبة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div id="VacationType" class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="VisibilityOption Form__Select"
                                                                             data-ElementsTargetName="TypeVacation">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $TypeVacations = [] ;
                                                                                    foreach ($leaves_type as $Index=>$LeaveItem) {
                                                                                        array_push($TypeVacations , [ "Label" => $LeaveItem["name"]
                                                                                            , "Value" => $LeaveItem["id"] ]) ;
                                                                                    }
                                                                                @endphp

                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "leave_type_id" , "Required" => "true" ,
                                                                                    "DefaultValue" => "", "Label" => "نوع الاجازة المرادة" ,
                                                                                    "Options" => $TypeVacations
                                                                                ])
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
                                                                    <button class="Button Send" type="submit">
                                                                        عرض معلومات الاجازة
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ResultCard Col-12 Card" style="display: none">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <div class="ListData NotResponsive">
                                                    <div class="ListData__Head">
                                                        <h4 class="ListData__Title">
                                                            نتائج
                                                        </h4>
                                                    </div>
                                                    <div class="ListData__Content" id="ContentResult">
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
        </div>
    </section>
@endsection
