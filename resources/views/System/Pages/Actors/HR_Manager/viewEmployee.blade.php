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
                                                                            <span
                                                                                class="Data_Value">{{$employee->first_name}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("lastName")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->last_name}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("fatherName")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->father_name}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("motherName")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->mother_name}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("gender")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->gender}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("placeOfBirth")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->birth_place}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("dateOfBirth")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->birth_date}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("nationality")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->nationality}}</span>
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
                                                                            <span
                                                                                class="Data_Value">{{$employee->NP_registration}}</span>
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
                                                                                    class="Data_Value">{{$employee->NP_registration}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("nationalNumber")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->national_number}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("familyStatus")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->family_status}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("wivesNumber")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->number_wives}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("childrenNumber")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->number_child}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("militaryService")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->military_service}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("profession")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->current_job}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("jobPosition")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->job_site}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("insuranceNumber")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->number_insurance}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("personnelNumber")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->number_self}}</span>
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
                                                                            <div class="ListData__Content">
                                                                                <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("documentType")</span>
                                                                                    <span
                                                                                        class="Data_Value">{{$employee->document_type}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="ListData__Content">
                                                                                <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("document")</span>
                                                                                    <span
                                                                                        class="Data_Value">--</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="ListData__Content">
                                                                                <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("documentID")</span>
                                                                                    <span
                                                                                        class="Data_Value">{{$employee->document_number}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("personalPhone")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->private_number1}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("workPhone")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->work_number}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("email")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->email}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("countryName")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->country}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("cityName")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->cityName}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("districtName")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->districtName}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("addressType")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->addressType}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("address")</span>
                                                                            <span
                                                                                class="Data_Value">{{$employee->address}}</span>
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
                                                                            <span
                                                                                class="Data_Value">{{$employee->college_name}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="ListData__Content">
                                                                            <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("dateOfIssuance")</span>
                                                                                <span
                                                                                    class="Data_Value">{{$employee->grant_date}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("collegeName")</span>
                                                                            <span class="Data_Value">{{$employee->grant_date}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("salaryImpact")</span>
                                                                            <span class="Data_Value">{{$employee->amount_impact_salary}}</span>
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
