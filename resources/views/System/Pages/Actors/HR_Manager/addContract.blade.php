@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddContractPage">
        <div class="AddContractPage">
            <div class="AddContractPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterEmployeeContract') ,
                    'paths' => [['Contracts' , '#'] , ['New Contract']] ,
                    'summery' => __('RegisterContractsPage')
                ])
            </div>
        </div>
        <div class="AddContractPagePrim__Content">
            <div class="Row">
                <div class="AddContractPage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="ContractPage__Information">
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
                                                                    @include("System.Components.selector" , ['Name' => "contractType" , "Required" => "true" , "Label" => __('contractType'),"DefaultValue" => "",
                                                                                "OptionsValues" => [__("permanent"), __("temporary")],])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Input">
                                                                <div class="Input__Area">
                                                                    <input id="contractNumber"
                                                                           class="Input__Field"
                                                                           type="number"
                                                                           name="contractNumber"
                                                                           placeholder="@lang("contractNumber")">
                                                                    <label class="Input__Label"
                                                                           for="contractNumber">@lang("contractNumber")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="dateOfContract"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="dateOfContract"
                                                                           placeholder="@lang("dateOfContract")">
                                                                    <label class="Date__Label"
                                                                           for="dateOfContract">@lang("dateOfContract")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="dateOfExpiration"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="dateOfExpiration"
                                                                           placeholder="@lang("dateOfExpiration")">
                                                                    <label class="Date__Label"
                                                                           for="dateOfExpiration">@lang("dateOfExpiration")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Date">
                                                                <div class="Date__Area">
                                                                    <input id="dateOfStart"
                                                                           class="Date__Field"
                                                                           type="text"
                                                                           name="dateOfStart"
                                                                           placeholder="@lang("dateOfStart")">
                                                                    <label class="Date__Label"
                                                                           for="dateOfStart">@lang("dateOfStart")</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="Form__Group">
                                                            <div class="Form__Select">
                                                                <div class="Select__Area">
                                                                    @include("System.Components.selector" , ['Name' => "DepartmentName" , "Required" => "true" , "Label" => __('DepartmentName'),"DefaultValue" => "",
                                                                                "OptionsValues" => [__("Diwan"), __("HR"), __("Administrative")],])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-12-xs">
                                                        <div class="Form__Group">
                                                            <div class="Form__Button">
                                                                <button class="Button Send"
                                                                        type="submit">@lang("saveContract")</button>
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
