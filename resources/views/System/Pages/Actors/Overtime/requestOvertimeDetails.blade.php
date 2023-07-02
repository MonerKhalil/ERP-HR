@extends("System.Pages.globalPage")

@php
    $MyAccount = auth()->user() ;
    $IsHavePermissionEditUser = ($MyAccount->can("update_overtimes") || $MyAccount->can("all_overtimes")) ;
@endphp

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SessionDetailsPage">
        <div class="SessionDetailsPage">
            <div class="SessionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewOvertimeRequestDetails") ,
                    'paths' => [[__("home") , '#'] , [__("viewOvertimeRequestDetails")]] ,
                    'summery' => __("titleViewOvertimeRequestDetails")
                ])
            </div>
            <div class="SessionDetailsPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card">
                                <div class="Card__Inner">
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("basics")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("employeeNameWant")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime->employee["first_name"]." ".$overtime->employee["last_name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("overtimeType")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime->overtime_type["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("startDateFrom")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime["from_date"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("endDateFrom")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime["to_date"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("stateRequest")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime["status"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("overtimeSalary")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("amountSalaryOvertimeExtra")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime->overtime_type["salary_in_hours"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("minimumHourForAcceptOvertime")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtime->overtime_type["min_hours_in_days"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("operationOnRequest")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a  href="{{ route("system.overtimes.edit.overtime" , $overtime["id"]) }}"
                                                    class="Button Button--Primary">
                                                    @lang("editRequest")
                                                </a>
                                                @if($IsHavePermissionEditUser && $overtime["status"] == "pending")
                                                    <form class="Form"
                                                          action="{{ route("system.overtimes_admin.overtime.status.change" , [ "overtime"=> $overtime["id"] , "status"=> "approve"]) }}"
                                                          style="display: inline-block" method="post">
                                                        @csrf
                                                        <button type="submit" class="Button Button--Primary">
                                                            @lang("acceptTheRequest")
                                                        </button>
                                                    </form>
                                                    <form class="Form"
                                                          action="{{ route("system.overtimes_admin.overtime.status.change" , [ "overtime"=> $overtime["id"] , "status"=> "reject"]) }}"
                                                          style="display: inline-block" method="post">
                                                        @csrf
                                                        <button type="submit" class="Button Button--Danger">
                                                            @lang("rejectTheRequest")
                                                        </button>
                                                    </form>
                                                @endif
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
