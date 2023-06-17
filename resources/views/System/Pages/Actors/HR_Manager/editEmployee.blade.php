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
                                                        <form class="Form Form--Dark" action="{{route("system.employees.update")}}" method="post">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="FirstName"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="first_name"
                                                                                       value="{{isset($employee) ? $employee["first_name"] : ""}}"
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
                                                                                       name="last_name"
                                                                                       value="{{isset($employee) ? $employee["last_name"] : ""}}"
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
                                                                                       name="father_name"
                                                                                       value="{{isset($employee) ? $employee["father_name"] : ""}}"
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
                                                                                       name="mother_name"
                                                                                       value="{{isset($employee) ? $employee["mother_name"] : ""}}"
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
                                                                                @php
                                                                                    $Gender = [];
                                                                                    foreach ($gender as $Index => $Item) {
                                                                                        array_push($Gender , [
                                                                                            "Label" => $Item
                                                                                            , "Value" => $Item ]) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "gender" ,
                                                                                            "Required" => "true" , "Label" => __('gender'),"DefaultValue" => isset($employee) ? $employee["gender"] : "",
                                                                                            "Options" => $Gender,])
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
                                                                                       name="birth_place"
                                                                                       value="{{isset($employee) ? $employee["birth_place"] : ""}}"
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
                                                                                       name="birth_date"
                                                                                       value="{{isset($employee) ? $employee["birth_date"] : ""}}"
                                                                                       placeholder="@lang("dateOfBirth")">
                                                                                <label class="Date__Label"
                                                                                       for="dateOfBirth">@lang("dateOfBirth")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "nationality" , "Required" => "true" ,
                                                                                            "Label" => __('nationality'),"DefaultValue" => isset($employee) ? $employee["nationality"] : "",
                                                                                            "OptionsValues" => $countries,])
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
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "user_id" , "Required" => "true" ,
                                                                                            "Label" => __('User'),"DefaultValue" => isset($employee) ? $employee["user_id"] : "",
                                                                                            "OptionsValues" => $users,])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="DossierNumber"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       value="{{isset($employee) ? $employee["number_file"] : ""}}"
                                                                                       name="number_file"
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
                                                                                       value="{{isset($employee) ? $employee["NP_registration"] : ""}}"
                                                                                       name="NP_registration"
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
                                                                                       type="number"
                                                                                       name="number_national"
                                                                                       value="{{isset($employee) ? $employee["number_national"] : ""}}"
                                                                                       placeholder="@lang("nationalNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="nationalNumber">@lang("nationalNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $Family_status = [] ;
                                                                                    foreach ($family_status as $Index => $Item) {
                                                                                        array_push($Family_status , [
                                                                                            "Label" => $Item
                                                                                            , "Value" => $Item ]) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "family_status" , "Required" => "true" ,
                                                                                            "Label" => __('familyStatus'),"DefaultValue" => isset($employee) ? $employee["family_status"] : "",
                                                                                            "Options" => $Family_status,])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm"
                                                                     id="wivesNumber">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="wivesNum"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="number_wives"
                                                                                       value="{{isset($employee) ? $employee["number_wives"] : ""}}"
                                                                                       placeholder="@lang("wivesNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="wivesNum">@lang("wivesNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm"
                                                                     id="childrenNumber">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="childrenNum"
                                                                                       class="Input__Field"
                                                                                       type="number"
                                                                                       name="number_child"
                                                                                       value="{{isset($employee) ? $employee["number_child"] : ""}}"
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
                                                                                @php
                                                                                    $Military_service = [] ;
                                                                                    foreach ($military_service as $Index => $Item) {
                                                                                        array_push($Military_service , [
                                                                                            "Label" => $Item
                                                                                            , "Value" => $Item ]) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "military_service" , "Required" => "true" ,
                                                                                            "Label" => __('militaryService'),"DefaultValue" => isset($employee) ? $employee["military_service"] : "",
                                                                                            "Options" => $Military_service,])
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
                                                                                       name="current_job"
                                                                                       value="{{isset($employee) ? $employee["current_job"] : ""}}"
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
                                                                                       name="job_site"
                                                                                       value="{{isset($employee) ? $employee["job_site"] : ""}}"
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
                                                                                       name="number_insurance"
                                                                                       value="{{isset($employee) ? $employee["number_insurance"] : ""}}"
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
                                                                                       name="number_self"
                                                                                       value="{{isset($employee) ? $employee["number_self"] : ""}}"
                                                                                       placeholder="@lang("personnelNumber")">
                                                                                <label class="Input__Label"
                                                                                       for="personnelNumber">@lang("personnelNumber")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , ['Name' => "section_id" , "Required" => "true" ,
                                                                                            "Label" => __('Department'),"DefaultValue" => isset($employee) ? $employee["section_id"] : "",
                                                                                            "OptionsValues" => $sections,])
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
                                                        </form>
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="Taps__Panel" data-panel="contactInfo">--}}
{{--                                            <div class="Card">--}}

{{--                                                <div class="Card__Content">--}}
{{--                                                    <div class="Card__Inner">--}}
{{--                                                        <div class="Card__Header">--}}
{{--                                                            <div class="Card__Title">--}}
{{--                                                                <h3>@lang("contactInfo")</h3>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <form class="Form Form--Dark">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div id="parentForm">--}}
{{--                                                                    <div class="Row GapC-1-5" id="documentForm">--}}
{{--                                                                        <div class="Col-4-md Col-6-sm">--}}
{{--                                                                            <div class="Form__Group">--}}
{{--                                                                                <div class="Form__Select">--}}
{{--                                                                                    <div class="Select__Area">--}}
{{--                                                                                        @include("System.Components.selector" , ['Name' => "documentType" , "Required" => "true" , "Label" => __('documentType'),"DefaultValue" => "",--}}
{{--                                                                                                    "OptionsValues" => [("ID"), ("passport")],])--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="Col-4-md Col-6-sm">--}}
{{--                                                                            <div class="Form__Group">--}}
{{--                                                                                <div class="Form__Button">--}}
{{--                                                                                    <input class="Button Send"--}}
{{--                                                                                           type="file">@lang("chooseDocument")--}}
{{--                                                                                    >--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="Col-4-md Col-6-sm">--}}
{{--                                                                            <div class="Form__Group">--}}
{{--                                                                                <div class="Form__Input">--}}
{{--                                                                                    <div class="Input__Area">--}}
{{--                                                                                        <input id="docId"--}}
{{--                                                                                               class="Input__Field"--}}
{{--                                                                                               type="number"--}}
{{--                                                                                               name="EmpDocId"--}}
{{--                                                                                               placeholder="@lang("documentID")">--}}
{{--                                                                                        <label class="Input__Label"--}}
{{--                                                                                               for="EmpDocId">@lang("documentID")</label>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-12-xs">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <button class="Button Send"--}}
{{--                                                                                    id="duplicateDoc">@lang("addAnotherDocument")</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="personalPhone"--}}
{{--                                                                                       class="Input__Field"--}}
{{--                                                                                       type="number"--}}
{{--                                                                                       name="EmpPersonalPhone"--}}
{{--                                                                                       placeholder="@lang("personalPhone")">--}}
{{--                                                                                <label class="Input__Label"--}}
{{--                                                                                       for="EmpPersonalPhone">@lang("personalPhone")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="workPhone"--}}
{{--                                                                                       class="Input__Field"--}}
{{--                                                                                       type="number"--}}
{{--                                                                                       name="EmpWorkPhone"--}}
{{--                                                                                       placeholder="@lang("workPhone")">--}}
{{--                                                                                <label class="Input__Label"--}}
{{--                                                                                       for="EmpWorkPhone">@lang("workPhone")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="email"--}}
{{--                                                                                       class="Input__Field"--}}
{{--                                                                                       type="email"--}}
{{--                                                                                       name="EmpEmail"--}}
{{--                                                                                       placeholder="@lang("email")">--}}
{{--                                                                                <label class="Input__Label"--}}
{{--                                                                                       for="EmpEmail">@lang("email")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Select">--}}
{{--                                                                            <div class="Select__Area">--}}
{{--                                                                                @include("System.Components.selector" , ['Name' => "countryName" , "Required" => "true" , "Label" => __('countryName'),"DefaultValue" => "",--}}
{{--                                                                                            "OptionsValues" => [__("syria"), __("jordan")],])--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Select">--}}
{{--                                                                            <div class="Select__Area">--}}
{{--                                                                                @include("System.Components.selector" , ['Name' => "cityName" , "Required" => "true" , "Label" => __('cityName'),"DefaultValue" => "",--}}
{{--                                                                                            "OptionsValues" => [__("Damascus"), __("Aleppo"), __('Amman')],])--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Select">--}}
{{--                                                                            <div class="Select__Area">--}}
{{--                                                                                @include("System.Components.selector" , ['Name' => "districtName" , "Required" => "true" , "Label" => __('district'),"DefaultValue" => "",--}}
{{--                                                                                            "OptionsValues" => [__("Mazzah"), __("Barzeh"), __('Duma')],])--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Select">--}}
{{--                                                                            <div class="Select__Area">--}}
{{--                                                                                @include("System.Components.selector" , ['Name' => "addressType" , "Required" => "true" , "Label" => __('addressType'),"DefaultValue" => "",--}}
{{--                                                                                            "OptionsValues" => [__("Home"), __("Bureau")],])--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="address"--}}
{{--                                                                                       class="Input__Field"--}}
{{--                                                                                       type="text"--}}
{{--                                                                                       name="EmpAddress"--}}
{{--                                                                                       placeholder="@lang("address")">--}}
{{--                                                                                <label class="Input__Label"--}}
{{--                                                                                       for="address">@lang("address")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-12-xs">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <button class="Button Send"--}}
{{--                                                                                    type="submit">@lang("addEmployee")</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="Taps__Panel" data-panel="educationInfo">--}}
{{--                                            <div class="Card">--}}
{{--                                                <div class="Card__Content">--}}
{{--                                                    <div class="Card__Inner">--}}
{{--                                                        <div class="Card__Header">--}}
{{--                                                            <div class="Card__Title">--}}
{{--                                                                <h3>@lang("educationInfo")</h3>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <form class="Form Form--Dark">--}}
{{--                                                            <div class="Row GapC-1-5">--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Select">--}}
{{--                                                                            <div class="Select__Area">--}}
{{--                                                                                @include("System.Components.selector" , ['Name' => "educationDegree" , "Required" => "true" , "Label" => __('educationDegree'),"DefaultValue" => "",--}}
{{--                                                                                            "OptionsValues" => [("9"), ("12"),("college")],])--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Date">--}}
{{--                                                                            <div class="Date__Area">--}}
{{--                                                                                <input id="dateOfIssuance"--}}
{{--                                                                                       class="Date__Field"--}}
{{--                                                                                       type="text"--}}
{{--                                                                                       name="dateOfIssuance"--}}
{{--                                                                                       placeholder="@lang("dateOfIssuance")">--}}
{{--                                                                                <label class="Date__Label"--}}
{{--                                                                                       for="dateOfIssuance">@lang("dateOfIssuance")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="collegeName"--}}
{{--                                                                                       class="Input__Field"--}}
{{--                                                                                       type="text"--}}
{{--                                                                                       name="EmpCollegeName"--}}
{{--                                                                                       placeholder="@lang("collegeName")">--}}
{{--                                                                                <label class="Input__Label"--}}
{{--                                                                                       for="collegeName">@lang("collegeName")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <input class="Button Send"--}}
{{--                                                                                   type="file">@lang("chooseDocument")--}}
{{--                                                                            >--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-4-md Col-6-sm">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Input">--}}
{{--                                                                            <div class="Input__Area">--}}
{{--                                                                                <input id="salaryImpact"--}}
{{--                                                                                       class="Input__Field"--}}
{{--                                                                                       type="number"--}}
{{--                                                                                       name="salaryImpact"--}}
{{--                                                                                       placeholder="@lang("salaryImpact")">--}}
{{--                                                                                <label class="Input__Label"--}}
{{--                                                                                       for="salaryImpact">@lang("salaryImpact")</label>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="Col-12-xs">--}}
{{--                                                                    <div class="Form__Group">--}}
{{--                                                                        <div class="Form__Button">--}}
{{--                                                                            <button class="Button Send"--}}
{{--                                                                                    type="submit">@lang("addEmployee")</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
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
