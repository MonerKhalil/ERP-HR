@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddEmployeePage">
        <div class="AddEmployeePage">
            <div class="AddEmployeePage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterNewEmployee') ,
                    'paths' => [['Employees' , '#'] , ['New Employee']] ,
                    'summery' => __('RegisterEmployeesPage')
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
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="FirstName"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpFirstName"
                                                                                       placeholder="@lang("firstName")">
                                                                                <label class="Input__Label"
                                                                                       for="FirstName">@lang("firstName")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="EmpLastName"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="LastName"
                                                                                       placeholder="@lang("lastName")">
                                                                                <label class="Input__Label"
                                                                                       for="LastName">@lang("lastName")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="FatherName"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpFatherName"
                                                                                       placeholder="@lang("fatherName")">
                                                                                <label class="Input__Label"
                                                                                       for="FatherName">@lang("fatherName")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="MotherName"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpMotherName"
                                                                                       placeholder="@lang("motherName")">
                                                                                <label class="Input__Label"
                                                                                       for="MotherName">@lang("motherName")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "gender" , "Required" => "true" , "Label" => __('gender'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("male"), __("female")],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="placeOfBirth"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpPlaceOfBirth"
                                                                                       placeholder="@lang("placeOfBirth")">
                                                                                <label class="Input__Label"
                                                                                       for="placeOfBirth">@lang("placeOfBirth")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="dateOfBirth"
                                                                                       class="Date__Field"
                                                                                       type="text"
                                                                                       name="dateOfBirth"
                                                                                       placeholder="@lang("dateOfBirth")">
                                                                                <label class="Date__Label"
                                                                                       for="dateOfBirth">@lang("dateOfBirth")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="nationality"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpNationality"
                                                                                       placeholder="@lang("nationality")">
                                                                                <label class="Input__Label"
                                                                                       for="nationality">@lang("nationality")</label>
                                                                            </div>
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
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="DossierNumber"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpDossierNumber"
                                                                                       placeholder="@lang("dossierNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="DossierNumber">@lang("dossierNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="registerNumber"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpRegisterNumber"
                                                                                       placeholder="@lang("registerNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="registerNumber">@lang("registerNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="nationalNumber"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpNationalNumber"
                                                                                       placeholder="@lang("nationalNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="nationalNumber">@lang("nationalNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="VisibilityOption Form__Group"
                                                                         data-ElementsTargetName="OnlyMarriedFields">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "familyStatus" , "Required" => "true" , "Label" => __('familyStatus'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("married"), __("widowed")],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="OnlyMarriedFields"
                                                                     data-TargetValue="0"
                                                                     id="wivesNumber">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="wivesNum"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpWivesNumber"
                                                                                       placeholder="@lang("wivesNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="wivesNum">@lang("wivesNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="OnlyMarriedFields"
                                                                     data-TargetValue="0"
                                                                     id="childrenNumber">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="childrenNum"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpChildrenNum"
                                                                                       placeholder="@lang("childrenNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="childrenNum">@lang("childrenNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "militaryService" , "Required" => "true" , "Label" => __('militaryService'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [__("done"), __("exempt")],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="profession"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpProfession"
                                                                                       placeholder="@lang("profession")">
                                                                                <label class="Input__Label"
                                                                                       for="profession">@lang("profession")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="jobPosition"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpJobPosition"
                                                                                       placeholder="@lang("jobPosition")">
                                                                                <label class="Input__Label"
                                                                                       for="jobPosition">@lang("jobPosition")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="insuranceNumber"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="EmpInsuranceNumber"
                                                                                       placeholder="@lang("insuranceNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="insuranceNumber">@lang("insuranceNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="personnelNumber"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="EmpPersonnelNumber"
                                                                                       placeholder="@lang("personnelNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="personnelNumber">@lang("personnelNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
{{--                                                                <div class="Col-12-xs">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <button class="Button Send"--}}
{{--                                                                                    type="submit">@lang("addEmployee")</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
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
{{--                                                                <div class="Col-12-xs">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <button class="Button Send"--}}
{{--                                                                                    type="submit">@lang("addEmployee")</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
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
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "educationDegree" , "Required" => "true" , "Label" => __('educationDegree'),"DefaultValue" => "",
                                                                                            "OptionsValues" => [("9"), ("12"),("college")],])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="dateOfIssuance"
                                                                                       class="Date__Field"
                                                                                       type="text"
                                                                                       name="dateOfIssuance"
                                                                                       placeholder="@lang("dateOfIssuance")">
                                                                                <label class="Date__Label"
                                                                                       for="dateOfIssuance">@lang("dateOfIssuance")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="collegeName"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="EmpCollegeName"
                                                                                       placeholder="@lang("collegeName")">
                                                                                <label class="Input__Label"
                                                                                       for="collegeName">@lang("collegeName")</label>
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
                                                                                <input id="salaryImpact"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="salaryImpact"
                                                                                       placeholder="@lang("salaryImpact")">
                                                                                <label class="Input__Label"
                                                                                       for="salaryImpact">@lang("salaryImpact")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
{{--                                                                <div class="Col-12-xs">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <button class="Button Send"--}}
{{--                                                                                    type="submit">@lang("addEmployee")</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                            </div>
                                                        </form>
                                                    </div>
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
                                                type="submit">@lang("addEmployee")</button>
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
