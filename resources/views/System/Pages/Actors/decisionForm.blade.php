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
                <div class="Row">
                    <div class="AddUserPage__Form">
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
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "Type" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => __("decisionType") ,
                                                                                        "Options" => [ ["Label" => "Decision" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "Administrative Order" , "Value" => "Administrative order"]]
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
                                                                                           name="PhoneNumber" placeholder="@lang("decisionNumber")" required>
                                                                                    <label class="Input__Label" for="DecisionNumber">@lang("decisionNumber")</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="DateDecision" class="Date__Field"
                                                                                           type="date" name="DateDecision"
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
                                                                                    <input id="DateDecisionEnd" class="Date__Field"
                                                                                           type="date" name="DateDecision"
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
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "Type" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "نوع التأثير على الراتب" ,
                                                                                        "Options" => [ ["Label" => "حسم" , "Value" => "0"] ,
                                                                                                       ["Label" => "اضافة" , "Value" => "1"]]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="DiscountAmountSalary" class="Input__Field" type="number"
                                                                                           name="PhoneNumber" placeholder="قيمة الحسم من الراتب" required>
                                                                                    <label class="Input__Label" for="DiscountAmountSalary">قيمة الحسم من الراتب</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="IncreasesAmountSalary" class="Input__Field" type="number"
                                                                                           name="PhoneNumber" placeholder="قيمة الاضافة على الراتب" required>
                                                                                    <label class="Input__Label" for="IncreasesAmountSalary">قيمة الاضافة على الراتب</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="DiscountAmountFinancial" class="Input__Field" type="number"
                                                                                           name="PhoneNumber" placeholder="قيمة الحسم من الحوافز" required>
                                                                                    <label class="Input__Label" for="DiscountAmountFinancial">قيمة الحسم من الحوافز</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="IncreasesAmountFinancial" class="Input__Field" type="number"
                                                                                           name="PhoneNumber" placeholder="قيمة الاضافة على الحوافز" required>
                                                                                    <label class="Input__Label" for="IncreasesAmountFinancial">قيمة الاضافة على الحوافز</label>
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
                                                                الموظفين المتأثرين بالقرار
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Selector2Readonly Col-4-md Col-6-sm"
                                                                         data-ClassContainer="Col-4-md Col-6-sm"
                                                                         data-ReadonlyNames="names[]"
                                                                         data-TitleField="الموظف"
                                                                         data-RequiredNum="1"
                                                                         data-Location="Before">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "Member" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "حدد الاعضاء" ,
                                                                                        "Options" => [ ["Label" => "انس بكار" , "Value" => "1"] ,
                                                                                                       ["Label" => "احمد امير الحلو" , "Value" => "2"] ,
                                                                                                       ["Label" => "منير خليل" , "Value" => "3"]]
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
                                                                                        <textarea id="DecisionEditor" class="TextEditor TextEditor__Field"
                                                                                                  placeholder="Your text as placeholder" required>
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
    </section>
@endsection

@section("extraScripts")
    {{-- JS Trumbowyg --}}
    <script src="{{asset("System/Assets/Lib/trumbowyg/dist/trumbowyg.min.js")}}"></script>
    @if(app()->getLocale()==="ar")
        <script src="{{asset("System/Assets/Lib/trumbowyg/dist/langs/ar.min.js")}}"></script>
    @endif
@endsection
