@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddEmployeePage">
        <div class="AddEmployeePage">
            <div class="AddEmployeePage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('ShowNewEmployee') ,
                    'paths' => [['Employees' , '#'] , ['New Employee']] ,
                    'summery' => __('ShowEmployeesPage')
                ])
            </div>
        </div>
        <div class="AddEmployeePagePrim__Content">
            <div class="Row">
                <div class="AddEmployeePage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="EmployeePage__Information">
                                <div class="Card Card--Taps Taps">
                                    <ul class="Taps__List">
                                        <li class="Taps__Item Taps__Item--Icon"
                                            data-content="personalInfo">
                                            <i class="material-icons">face</i>
                                            @lang('personalInfo')
                                        </li>
                                        <li class="Taps__Item Taps__Item--Icon"
                                            data-content="contactInfo">
                                            <i class="material-icons">badge</i>
                                            @lang('contactInfo')
                                        </li>
                                        <li class="Taps__Item Taps__Item--Icon"
                                            data-content="educationInfo">
                                            <i class="material-icons">work</i>
                                            @lang('educationInfo')
                                        </li>
                                    </ul>
                                    <div class="Taps__Content">
                                        <div class="Taps__Panel" data-panel="personalInfo">
                                            <div class="Card">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Header">
                                                            <div class="Card__Title">
                                                                <h3>@lang("personalInfo")</h3>
                                                            </div>
                                                        </div>
                                                        <form class="Form Form--Dark">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("firstName")</span>
                                                                            <span class="Data_Value">Anas</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("lastName")</span>
                                                                            <span class="Data_Value">Bakkar</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("fatherName")</span>
                                                                            <span class="Data_Value">Haidar</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("motherName")</span>
                                                                            <span class="Data_Value"> </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("gender")</span>
                                                                            <span class="Data_Value">Male</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("placeOfBirth")</span>
                                                                            <span
                                                                                class="Data_Value">Dier Al-Asafeer</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("dateOfBirth")</span>
                                                                            <span class="Data_Value">1/1/2001</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("nationality")</span>
                                                                            <span class="Data_Value">Syrian</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Card">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Header">
                                                            <div class="Card__Title">
                                                                <h3>@lang("additionalInfo")</h3>
                                                            </div>
                                                        </div>
                                                        <form class="Form Form--Dark">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("dossierNumber")</span>
                                                                            <span class="Data_Value">12</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="ListData__Content">
                                                                            <div class="Data_Col">
                                                                                <span
                                                                                    class="Data_Label">@lang("registerNumber")</span>
                                                                                <span
                                                                                    class="Data_Value">دير العصافير 9</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("nationalNumber")</span>
                                                                            <span class="Data_Value">03340001127</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("familyStatus")</span>
                                                                            <span class="Data_Value">married</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("wivesNumber")</span>
                                                                            <span class="Data_Value">married</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("childrenNumber")</span>
                                                                            <span class="Data_Value">2</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("militaryService")</span>
                                                                            <span class="Data_Value">exempt</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("profession")</span>
                                                                            <span class="Data_Value">حدادددد</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("jobPosition")</span>
                                                                            <span class="Data_Value">Front-End</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("insuranceNumber")</span>
                                                                            <span class="Data_Value">52568</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("personnelNumber")</span>
                                                                            <span class="Data_Value">27</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Taps__Panel" data-panel="contactInfo">
                                            <div class="Card">

                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Header">
                                                            <div class="Card__Title">
                                                                <h3>@lang("contactInfo")</h3>
                                                            </div>
                                                        </div>
                                                        <form class="Form Form--Dark">
                                                            <div class="Row GapC-1-5">
                                                                <div id="parentForm">
                                                                    <div class="Row GapC-1-5" id="documentForm">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @include("System.Components.selector" , ['Name' => "documentType" , "Required" => "true" , "Label" => __('documentType'),"DefaultValue" => "",
                                                                                                    "OptionsValues" => [("ID"), ("passport")],])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Button">
                                                                                    <input class="Button Send"
                                                                                           type="file">@lang("chooseDocument")
                                                                                    >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="docId"
                                                                                               class="Input__Field"
                                                                                               type="number"
                                                                                               name="EmpDocId"
                                                                                               placeholder="@lang("documentID")">
                                                                                        <label class="Input__Label"
                                                                                               for="EmpDocId">@lang("documentID")</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-12-xs">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Button">
                                                                            <button class="Button Send"
                                                                                    id="duplicateDoc">@lang("addAnotherDocument")</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="personalPhone"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="EmpPersonalPhone"
                                                                                       placeholder="@lang("personalPhone")">
                                                                                <label class="Input__Label"
                                                                                       for="EmpPersonalPhone">@lang("personalPhone")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="workPhone"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="EmpWorkPhone"
                                                                                       placeholder="@lang("workPhone")">
                                                                                <label class="Input__Label"
                                                                                       for="EmpWorkPhone">@lang("workPhone")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="email"
                                                                                       class="Input__Field"
                                                                                       type="email"
                                                                                       name="EmpEmail"
                                                                                       placeholder="@lang("email")">
                                                                                <label class="Input__Label"
                                                                                       for="EmpEmail">@lang("email")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "countryName" , "Required" => "true" , "Label" => __('countryName'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("syria"), __("jordan")],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "cityName" , "Required" => "true" , "Label" => __('cityName'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("Damascus"), __("Aleppo"), __('Amman')],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "districtName" , "Required" => "true" , "Label" => __('district'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("Mazzah"), __("Barzeh"), __('Duma')],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "addressType" , "Required" => "true" , "Label" => __('addressType'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("Home"), __("Bureau")],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="address"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpAddress"
                                                                                       placeholder="@lang("address")">
                                                                                <label class="Input__Label"
                                                                                       for="address">@lang("address")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Taps__Panel" data-panel="educationInfo">
                                            <div class="Card">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Header">
                                                            <div class="Card__Title">
                                                                <h3>@lang("educationInfo")</h3>
                                                            </div>
                                                        </div>
                                                        <form class="Form Form--Dark">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("educationDegree")</span>
                                                                            <span class="Data_Value">college</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("dateOfIssuance")</span>
                                                                            <span class="Data_Value">25/7/2020</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("collegeName")</span>
                                                                            <span class="Data_Value">ITE</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Button">
                                                                            <input class="Button Send"
                                                                                   type="file">@lang("chooseDocument")
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("salaryImpact")</span>
                                                                            <span class="Data_Value">25</span>
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
        </div>
    </section>
@endsection
