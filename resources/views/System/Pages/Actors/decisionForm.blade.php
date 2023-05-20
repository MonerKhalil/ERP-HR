@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddDecisionPage">
        <div class="AddDecisionPage">
            <div class="AddUserPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("decisionForm") ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="AddUserPage__Content">
                <div class="ViewUsers__Content">
                    <div class="Row">
                        <div class="AddUserPage__Form">
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
                                                          action="{{route("system.decisions.store")}}"
                                                          enctype="multipart/form-data"
                                                          method="post">
                                                        @csrf
                                                        <input name="session_decision_id"
                                                               value="{{(isset($decision)) ? $decision["session_decision_id"] : $session_decisions["id"]}}" hidden>
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
                                                                                <div class="VisibilityOption Form__Select"
                                                                                     data-ElementsTargetName="DecisionFieldTarget">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $DecisionTypes = [] ;
                                                                                            foreach ($type_decisions as $Index=>$DecisionType) {
                                                                                                array_push($DecisionTypes , [ "Label" => $DecisionType
                                                                                                    , "Value" => $Index ]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "type_decision_id" , "Required" => "true" ,
                                                                                            "DefaultValue" => isset($decision) ? $decision["type_decision_id"] : ""
                                                                                             , "Label" => __("decisionType") ,
                                                                                            "Options" => $DecisionTypes
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="DecisionNumber" class="Input__Field" type="number"
                                                                                               value="{{(isset($decision)) ? $decision["number"] : ""}}"
                                                                                               name="number" placeholder="@lang("decisionNumber")" required>
                                                                                        <label class="Input__Label" for="DecisionNumber">@lang("decisionNumber")</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="DateDecision" class="DateMinToday Date__Field"
                                                                                               TargetDateStartName="StartDateDecision"
                                                                                               value="{{isset($decision) ? $decision["date"] : ""}}"
                                                                                               type="date" name="date"
                                                                                               placeholder="@lang("dateDecision")" required>
                                                                                        <label class="Date__Label" for="DateDecision">@lang("dateDecision")</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="DateDecisionEnd"
                                                                                               class="DateEndFromStart Date__Field"
                                                                                               data-StartDateName="StartDateDecision"
                                                                                               value="{{(isset($decision) && ($decision["end_date_decision"] != null)) ?
                                                                                                    $decision["end_date_decision"] : ""}}"
                                                                                               type="date" name="end_date_decision"
                                                                                               placeholder="@lang("dateDecisionEnd")">
                                                                                        <label class="Date__Label" for="DateDecisionEnd">
                                                                                            @lang("dateDecisionEnd")
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__UploadFile">
                                                                                    <div class="UploadFile__Area">
                                                                                        <input type="file"
                                                                                               id="DecisionImage"
                                                                                               name="image"
                                                                                               class="UploadFile__Field"
                                                                                               accept="image/png, image/gif, image/jpeg, image/jpg, image/svg"
                                                                                               placeholder="صورة عن القرار">
                                                                                        <label class="UploadFile__Label" for="DecisionImage">
                                                                                            صورة عن القرار
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="VisibilityOption Col-4-md Col-6-sm"
                                                                             data-ElementsTargetName="BonesPunishmentFields">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $EffectDecisionTypes = [] ;
                                                                                            foreach ($type_effects as $EffectType) {
                                                                                                array_push($EffectDecisionTypes , [ "Label" => $EffectType
                                                                                                    , "Value" => $EffectType ]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "effect_salary" , "Required" => "true" ,
                                                                                            "DefaultValue" => (isset($decision) ? $decision["effect_salary"] : "")
                                                                                            , "Label" => "نوع التأثير على الراتب" ,
                                                                                            "Options" => $EffectDecisionTypes
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                             data-TargetName="BonesPunishmentFields"
                                                                             data-TargetValue="decrement">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="DiscountAmountSalary" class="Input__Field" type="number"
                                                                                               name="value" placeholder="قيمة الحسم من الراتب" required>
                                                                                        <label class="Input__Label" for="DiscountAmountSalary">قيمة الحسم من الراتب</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                             data-TargetName="BonesPunishmentFields"
                                                                             data-TargetValue="increment">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="IncreasesAmountSalary" class="Input__Field" type="number"
                                                                                               name="value" placeholder="قيمة الاضافة على الراتب" required>
                                                                                        <label class="Input__Label" for="IncreasesAmountSalary">قيمة الاضافة على الراتب</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                             data-TargetName="BonesPunishmentFields"
                                                                             data-TargetValue="decrement">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="DiscountAmountFinancial" class="Input__Field" type="number"
                                                                                               name="rate" placeholder="نسبة الحسم من الحوافز" required>
                                                                                        <label class="Input__Label" for="DiscountAmountFinancial">نسبة الحسم من الحوافز</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                             data-TargetName="BonesPunishmentFields"
                                                                             data-TargetValue="increment">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="IncreasesAmountFinancial" class="Input__Field" type="number"
                                                                                               name="rate" placeholder="نسبة الاضافة على الحوافز" required>
                                                                                        <label class="Input__Label" for="IncreasesAmountFinancial">نسبة الاضافة على الحوافز</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="VisibilityTarget ListData"
                                                             data-TargetName="BonesPunishmentFields"
                                                             data-TargetValue="decrement,increment">
                                                            <div class="ListData__Head">
                                                                <h4 class="ListData__Title">
                                                                    الموظفين المتأثرين بالقرار
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Selector2Readonly Col-4-md Col-6-sm"
                                                                             data-ClassContainer="Col-4-md Col-6-sm"
                                                                             data-ReadonlyNames="employees[]"
                                                                             data-TitleField="الموظف"
                                                                             @if(isset($decision))
                                                                             <?php
                                                                             $EmployeesIDs = null ;
                                                                             foreach ($decision->employees as $Employee)
                                                                                 if($EmployeesIDs != null)
                                                                                     $EmployeesIDs = $EmployeesIDs.",".$Employee["id"] ;
                                                                                 else
                                                                                     $EmployeesIDs = $Employee["id"]."" ;
                                                                             ?>
                                                                             data-DefaultValues="{{$EmployeesIDs}}"
                                                                             @endif
                                                                             data-RequiredNum="1"
                                                                             data-Location="Before">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $EmployeesList = [] ;
                                                                                            foreach ($employees as $Employees) {
                                                                                                array_push($EmployeesList , [
                                                                                                    "Label" => $Employees["first_name"].$Employees["last_name"]
                                                                                                    , "Value" => $Employees["id"] ]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "Member" , "Required" => "true" ,
                                                                                            "DefaultValue" => "" , "Label" => "حدد الاعضاء" ,
                                                                                            "Options" => $EmployeesList
                                                                                        ])
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
                                                                    <label for="DecisionEditor">
                                                                        @lang("decisionContent")
                                                                    </label>
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row">
                                                                        <div class="Col">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__TextEditor">
                                                                                    <div class="TextEditor__Area">
                                                                                        <div class="trumbowyg-dark">
                                                                                        <textarea id="DecisionEditor"
                                                                                                  class="TextEditor TextEditor__Field"
                                                                                                  placeholder="Your text as placeholder"
                                                                                                  name="content" required>
                                                                                            @if(isset($decision))
                                                                                                {{$decision["content"]}}
                                                                                            @endif
                                                                                        </textarea>
                                                                                        </div>
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

@section("extraScripts")
    {{-- JS Trumbowyg --}}
    <script src="{{asset("System/Assets/Lib/trumbowyg/dist/trumbowyg.min.js")}}"></script>
    @if(app()->getLocale()==="ar")
        <script src="{{asset("System/Assets/Lib/trumbowyg/dist/langs/ar.min.js")}}"></script>
    @endif
@endsection
