@extends("System.Pages.globalPage")

@section("ContentPage")
    <div id="AddEmployeePage"  class="MainContent__Section MainContent__Section--AddEmployeePage">
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
                                        <li class="Taps__Item Taps__Item--Icon NotClickable"
                                            data-content="personalInfo">
                                            <i class="material-icons">face</i>
                                            @lang('personalInfo')
                                        </li>
                                        <li class="Taps__Item Taps__Item--Icon NotClickable"
                                            data-content="contactInfo">
                                            <i class="material-icons">badge</i>
                                            @lang('contactInfo')
                                        </li>
                                        <li class="Taps__Item Taps__Item--Icon NotClickable"
                                            data-content="educationInfo">
                                            <i class="material-icons">work</i>
                                            @lang('educationInfo')
                                        </li>
                                    </ul>
                                    <div class="Taps__Content">
                                        <form class="Form Form--Dark"
                                              action="{{route("system.employees.store")}}" method="post">
                                            @csrf

                                            <div class="Taps__Panel" data-panel="personalInfo">
                                                <div class="Card">
                                                    <div class="Card__Content">
                                                        <div class="Card__Inner">
                                                            <div class="Card__Body">
                                                                <div class="ListData">
                                                                    <div class="ListData__Head">
                                                                        <h4 class="ListData__Title">
                                                                            @lang("personalInfo")
                                                                        </h4>
                                                                    </div>
                                                                    <div class="ListData__Content">
                                                                        <div class="Row GapC-1-5">
                                                                            <div class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__Input">
                                                                                        <div class="Input__Area">
                                                                                            <input id="FirstName"
                                                                                                   class="Input__Field"
                                                                                                   type="text"
                                                                                                   name="first_name"
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
                                                                                                        "OptionsValues" => $gender,])
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
                                                                                                   name="nationality"
                                                                                                   placeholder="@lang("nationality")">
                                                                                            <label class="Input__Label"
                                                                                                   for="nationality">@lang("nationality")</label>
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
                                                                            @lang("additionalInfo")
                                                                        </h4>
                                                                    </div>
                                                                    <div class="ListData__Content">
                                                                        <div class="Row GapC-1-5">
                                                                            <div class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__Input">
                                                                                        <div class="Input__Area">
                                                                                            <input id="DossierNumber"
                                                                                                   class="Input__Field"
                                                                                                   type="text"
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
                                                                                                   type="text"
                                                                                                   name="number_national"
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
                                                                                            @include("System.Components.selector" , ['Name' => "family_status" , "Required" => "true" , "Label" => __('familyStatus'),"DefaultValue" => "",
                                                                                                        "OptionsValues" => $family_status,])
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
                                                                                                   type="text"
                                                                                                   name="number_wives"
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
                                                                                                   type="text"
                                                                                                   name="number_child"
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
                                                                                            @include("System.Components.selector" , ['Name' => "military_service" , "Required" => "true" , "Label" => __('militaryService'),"DefaultValue" => "",
                                                                                                        "OptionsValues" => $military_service,])
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
                                                                                                   name="number_file"
                                                                                                   placeholder="@lang("personnelNumber")">
                                                                                            <label class="Input__Label"
                                                                                                   for="personnelNumber">@lang("personnelNumber")</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Form__Group">
                                                                    <div class="Form__Button">
                                                                        <button class="Next Button Send"
                                                                                type="button">
                                                                            الخطوة التالية
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="Taps__Panel" data-panel="contactInfo">
                                                <div class="Card">
                                                    <div class="Card__Content">
                                                        <div class="Card__Inner">
                                                            <div class="Card__Body">
                                                                <div class="ListData">
                                                                    <div class="ListData__Head">
                                                                        <h4 class="ListData__Title">
                                                                            الوئايق (اختيارية)
                                                                        </h4>
                                                                    </div>
                                                                    <div class="ListData__Content">
                                                                        <div class="Row GapC-1-5">
                                                                            <div id="parentForm">
                                                                                <div class="Row GapC-1-5"
                                                                                     id="documentForm">
                                                                                    <div class="Col-4-md Col-6-sm"`>
                                                                                        <div class="Form__Group">
                                                                                            <div class="Form__Select">
                                                                                                <div
                                                                                                    class="Select__Area">
                                                                                                    @include("System.Components.selector" , ['Name' => "document_type" , "Required" => "true" , "Label" => __('documentType'),"DefaultValue" => "",
                                                                                                                "OptionsValues" => [("ID"), ("passport")],])
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="Col-4-md Col-6-sm">
                                                                                        <div class="Form__Group">
                                                                                            <div class="Form__UploadFile">
                                                                                                <div class="UploadFile__Area">
                                                                                                    @include("System.Components.fileUpload" , [
                                                                                                        "FieldID" => "docId" ,
                                                                                                        "FieldName" => "document_path" ,
                                                                                                        "DefaultData" => (isset($decision)) ? PathStorage($decision["image"]) : ""  ,
                                                                                                        "LabelField" => __("chooseDocument") ,
                                                                                                        "AcceptFiles" => "*"
                                                                                                    ])
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
{{--                                                                                        <div class="Form__Group">--}}
{{--                                                                                            <div--}}
{{--                                                                                                class="Form__UploadFile">--}}
{{--                                                                                                <div--}}
{{--                                                                                                    class="UploadFile__Area">--}}
{{--                                                                                                    <input id="docId"--}}
{{--                                                                                                           type="file"--}}
{{--                                                                                                           class="UploadFile__Field"--}}
{{--                                                                                                           name="document_path"--}}
{{--                                                                                                           placeholder="@lang("chooseDocument")">--}}
{{--                                                                                                    <label--}}
{{--                                                                                                        class="UploadFile__Label"--}}
{{--                                                                                                        for="docId">--}}
{{--                                                                                                        @lang("chooseDocument")--}}
{{--                                                                                                    </label>--}}
{{--                                                                                                </div>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
                                                                                    </div>
                                                                                    <div class="Col-4-md Col-6-sm">
                                                                                        <div class="Form__Group">
                                                                                            <div class="Form__Input">
                                                                                                <div
                                                                                                    class="Input__Area">
                                                                                                    <input id="docId"
                                                                                                           class="Input__Field"
                                                                                                           type="number"
                                                                                                           name="document_number"
                                                                                                           placeholder="@lang("documentID")">
                                                                                                    <label
                                                                                                        class="Input__Label"
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
                                                                                                type="button"
                                                                                                id="duplicateDoc">@lang("addAnotherDocument")</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ListData">
                                                                    <div class="ListData__Head">
                                                                        <h4 class="ListData__Title">
                                                                            @lang("contactInfo")
                                                                        </h4>
                                                                    </div>
                                                                    <div class="ListData__Content">
                                                                        <div class="Row GapC-1-5">
                                                                            <div class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__Input">
                                                                                        <div class="Input__Area">
                                                                                            <input id="personalPhone"
                                                                                                   class="Input__Field"
                                                                                                   type="number"
                                                                                                   name="private_number1"
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
                                                                                                   name="work_number"
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
                                                                                                   name="email"
                                                                                                   placeholder="@lang("email")">
                                                                                            <label class="Input__Label"
                                                                                                   for="EmpEmail">@lang("email")</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="State"
                                                                                 data-CityURL="{{route("get.address")}}"
                                                                                 class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__Select">
                                                                                        <div class="Select__Area">
                                                                                            @php
                                                                                                $Countries = [] ;
                                                                                                foreach ($countries as $Index => $Item) {
                                                                                                    array_push($Countries , [
                                                                                                        "Label" => $Item
                                                                                                        , "Value" => $Index ]) ;
                                                                                                }
                                                                                            @endphp
                                                                                            @include("System.Components.selector" , [
                                                                                                        'Name' => "country_name" , "Required" => "true"
                                                                                                        , "Label" => __('countryName') ,"DefaultValue" => ""
                                                                                                        , "Options" => $Countries
                                                                                                    ])
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="City" class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__Select">
                                                                                        <div class="Select__Area">
                                                                                            @include("System.Components.selector" , ['Name' => "cityName" , "Required" => "true" , "Label" => __('cityName'),"DefaultValue" => "",
                                                                                                        "OptionsValues" => [__("Damascus"), __("Aleppo"), __('Amman')],])
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="Address" class="Col-4-md Col-6-sm">
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
                                                                    </div>
                                                                </div>
                                                                <div class="Form__Group">
                                                                    <div class="Form__Button">
                                                                        <button class="Previous Button Send"
                                                                                type="button">
                                                                            الخطوة السابقة
                                                                        </button>
                                                                        <button class="Next Button Send"
                                                                                type="button">
                                                                            الخطوة التالية
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="Taps__Panel" data-panel="educationInfo">
                                                <div class="Card">
                                                    <div class="Card__Content">
                                                        <div class="Card__Inner">
                                                            <div class="Card__Body">
                                                                <div class="ListData">
                                                                    <div class="ListData__Head">
                                                                        <h4 class="ListData__Title">
                                                                            @lang("educationInfo")
                                                                        </h4>
                                                                    </div>
                                                                    <div class="ListData__Content">
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
                                                                                                   name="grant_date"
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
                                                                                                   name="college_name"
                                                                                                   placeholder="@lang("collegeName")">
                                                                                            <label class="Input__Label"
                                                                                                   for="collegeName">@lang("collegeName")</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__UploadFile">
                                                                                        <div class="UploadFile__Area">
                                                                                            @include("System.Components.fileUpload" , [
                                                                                                "FieldID" => "docEducation" ,
                                                                                                "FieldName" => "document_education_path" ,
                                                                                                "DefaultData" => (isset($decision)) ? PathStorage($decision["image"]) : ""  ,
                                                                                                "LabelField" => __("chooseDocument") ,
                                                                                                "AcceptFiles" => "*"
                                                                                            ])
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                {{--                                                                                <div class="Form__Group">--}}
                                                                                {{--                                                                                    <div class="Form__UploadFile">--}}
                                                                                {{--                                                                                        <div class="UploadFile__Area">--}}
                                                                                {{--                                                                                            <input type="file"--}}
                                                                                {{--                                                                                                   class="UploadFile__Field"--}}
                                                                                {{--                                                                                                   name="document_education_path"--}}
                                                                                {{--                                                                                                   placeholder="@lang("chooseDocument")">--}}
                                                                                {{--                                                                                            <label--}}
                                                                                {{--                                                                                                class="UploadFile__Label">--}}
                                                                                {{--                                                                                                @lang("chooseDocument")--}}
                                                                                {{--                                                                                            </label>--}}
                                                                                {{--                                                                                        </div>--}}
                                                                                {{--                                                                                    </div>--}}
                                                                                {{--                                                                                </div>--}}
                                                                            </div>
                                                                            <div class="Col-4-md Col-6-sm">
                                                                                <div class="Form__Group">
                                                                                    <div class="Form__Input">
                                                                                        <div class="Input__Area">
                                                                                            <input id="salaryImpact"
                                                                                                   class="Input__Field"
                                                                                                   type="number"
                                                                                                   name="amount_impact_salary"
                                                                                                   placeholder="@lang("salaryImpact")">
                                                                                            <label class="Input__Label"
                                                                                                   for="salaryImpact">@lang("salaryImpact")</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Form__Group">
                                                                    <div class="Form__Button">
                                                                        <button class="Previous Button Send"
                                                                                type="button">
                                                                            الخطوة السابقة
                                                                        </button>
                                                                        <button class="Button Send"
                                                                                type="submit">@lang("addEmployee")</button>
                                                                    </div>
                                                                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
