@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddEOSPage">
        <div class="AddEOSPage">
            <div class="AddEOSPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterEmployeeEOS') ,
                    'paths' => [['employees End Of Service' , '#'] , ['EOS']] ,
                    'summery' => __('RegisterEOSPage')
                ])
            </div>
        </div>
        <div class="AddEOSPagePrim__Content">
            <div class="Row">
                <div class="AddEOSPage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="EOSPage__Information">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Header">
                                                <div class="Card__Title">
                                                    <h3>@lang("contractInfo")</h3>
                                                </div>
                                            </div>
                                            <form class="Form Form--Dark">
                                                <div class="Row GapC-1-5">
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Select">
                                                                <div class="Select__Area">
                                                                    @include("System.Components.selector" , ['Name' => "employeeName" , "Required" => "true" , "Label" => __('employeeName'),"DefaultValue" => "",
                                                                                "OptionsValues" => [("Test1"), ("Test2")],])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Select">
                                                                <div class="Select__Area">
                                                                    @include("System.Components.selector" , ['Name' => "EOSReason" , "Required" => "true" , "Label" => __('EOSReason'),"DefaultValue" => "",
                                                                                "OptionsValues" => [__("retirement"), __("militaryService")],])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="EOSStartDate"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="EOSStartDate"
                                                                           placeholder="@lang("EOSStartDate")">
                                                                    <label class="Date__Label"
                                                                           for="EOSStartDate">@lang("EOSStartDate")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="EOSEndDate"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="EOSEndDate"
                                                                           placeholder="@lang("EOSEndDate")">
                                                                    <label class="Date__Label"
                                                                           for="EOSEndDate">@lang("EOSEndDate")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Input">
                                                                <div class="Input__Area">
                                                                    <input id="decisionNumber"
                                                                           class="Input__Field"
                                                                           type="number"
                                                                           name="decisionNumber"
                                                                           placeholder="@lang("decisionNumber")">
                                                                    <label class="Input__Label"
                                                                           for="decisionNumber">@lang("decisionNumber")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="decisionDate"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="decisionDate"
                                                                           placeholder="@lang("decisionDate")">
                                                                    <label class="Date__Label"
                                                                           for="decisionDate">@lang("decisionDate")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-12-xs">
                                                        <div class="Form__Group">
                                                            <div class="Form__Button">
                                                                <button class="Button Send"
                                                                        type="submit">@lang("saveEOS")</button>
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
    </section>
@endsection
