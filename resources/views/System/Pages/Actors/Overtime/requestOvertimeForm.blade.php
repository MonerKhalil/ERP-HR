@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--RequestOvertimeForm">
        <div class="RequestOvertimeForm">
            <div class="RequestOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => isset($overtime) ? "تعديل طلب العمل الاضافي" : "تسجيل طلب عمل اضافي" ,
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
                                                          action="{{ isset($overtime) ? route("system.overtimes.update.overtime" , $overtime["id"]) : route("system.overtimes.store.request") }}"
                                                          method="post">
                                                        @csrf
                                                        @if(isset($overtime))
                                                            @method("put")
                                                        @endif
                                                        <div class="ListData">
                                                            <div class="ListData__Head">
                                                                <h4 class="ListData__Title">
                                                                    @lang("basics")
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @php
                                                                                        $TypesOvertime = [] ;
                                                                                        foreach ($overtimesType as $Index=>$OvertimeItem) {
                                                                                            array_push($TypesOvertime , [ "Label" => $OvertimeItem
                                                                                                , "Value" => $Index ]) ;
                                                                                        }
                                                                                    @endphp
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "overtime_type_id" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($overtime) ? $overtime["overtime_type_id"] : "" ,
                                                                                        "Label" => "نوع العمل الاضافي" ,
                                                                                        "Options" => $TypesOvertime
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
                                                                                           type="date" name="from_date"
                                                                                           value="{{ isset($overtime) ? $overtime["from_date"] : "" }}"
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
                                                                                           value="{{ isset($overtime) ? $overtime["to_date"] : "" }}"
                                                                                           type="date" name="to_date"
                                                                                           placeholder="تنتهي عند تاريخ">
                                                                                    <label class="Date__Label" for="ToEndDate">
                                                                                        تنتهي عند تاريخ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityOption Col-4-md Col-6-sm"
                                                                         data-VisibilityDefault="{{ isset($overtime) ? ($overtime["is_hourly"] ? "1" : "0") : "" }}"
                                                                         data-ElementsTargetName="HourlyFields">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "is_hourly" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($overtime) ? ($overtime["is_hourly"] ? "1" : "0") : "" ,
                                                                                        "Label" => "تحديد ساعات للعمل الاضافي" ,
                                                                                        "Options" => [
                                                                                            [ "Label" => "تعم" , "Value" => "1"] ,
                                                                                            [ "Label" => "لا" , "Value" => "0"]
                                                                                        ]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="HourlyFields"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="OvertimeStartTime"
                                                                                           class="TimeNoDate Date__Field"
                                                                                           type="time" name="from_time"
                                                                                           placeholder="تبدأ من الساعة"
                                                                                           value="{{ isset($overtime) ? $overtime["from_time"] : "" }}"
                                                                                           required>
                                                                                    <label class="Date__Label"
                                                                                           for="OvertimeStartTime">
                                                                                        تبدأ من الساعة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                         data-TargetName="HourlyFields"
                                                                         data-TargetValue="1">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="OvertimeEndTime"
                                                                                           class="TimeNoDate Date__Field"
                                                                                           type="time" name="to_time"
                                                                                           placeholder="تنتهي عند الساعة"
                                                                                           value="{{ isset($overtime) ? $overtime["to_time"] : "" }}"
                                                                                           required>
                                                                                    <label class="Date__Label"
                                                                                           for="OvertimeEndTime">
                                                                                        تنتهي عند الساعة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-12">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Textarea">
                                                                                <div class="Textarea__Area">
                                                                                        <textarea id="ReasonOverTime" class="Textarea__Field"
                                                                                                  name="description" rows="3"
                                                                                                  placeholder="سبب الاجازة">{{ isset($overtime) ? ($overtime["description"] ?? "") : "" }}</textarea>
                                                                                    <label class="Textarea__Label"
                                                                                           for="ReasonOverTime">
                                                                                        سبب العمل الاضافي
                                                                                    </label>
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
                                                                            @if(isset($overtime))
                                                                                تعديل هذا النوع
                                                                            @else
                                                                                اضافة نوع جديد
                                                                            @endif
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
