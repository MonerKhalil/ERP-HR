<?php
    $MyAccount = auth()->user() ;
    $IsYourPermission = !is_null(auth()->user()->employee["id"]) ;
    $IsHavePermissionOverTimeRead = $MyAccount->can("read__overtimes") || $MyAccount->can("all_overtimes") ;
    $IsHavePermissionAttendanceRead = $MyAccount->can("read_attendances") || $MyAccount->can("all_attendances") ;
    $IsHavePermissionEvaluationRead = $MyAccount->can("read_employee_evaluations") || $MyAccount->can("all_employee_evaluations") ;
    $IsHavePermissionEmployeeRead = $MyAccount->can("read_employees") || $MyAccount->can("all_employees") ;
    $IsHavePermissionSectionInRead = $MyAccount->can("read_sections") || $MyAccount->can("all_sections") ;
    $IsHavePermissionContractInRead = $MyAccount->can("read_contracts") || $MyAccount->can("all_contracts") ;
    $IsHavePermissionDecisionRead = $MyAccount->can("read_decisions") || $MyAccount->can("all_decisions") ;
    $IsHavePermissionVacationRead = $MyAccount->can("read_leaves") || $MyAccount->can("all_leaves") ;
    $IsHavePermissionSessionRead = $MyAccount->can("read_session_decisions") || $MyAccount->can("all_session_decisions") ;
?>

@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--RequestOvertimeForm">
        <div class="RequestOvertimeForm">
            <div class="RequestOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("HomePage") ,
                    'paths' => [] ,
                    'summery' => __("TitleHomePage")
                ])
            </div>
            <div class="RequestOvertimeForm__Content">
                <div class="ViewUsers__Content">
                    <div class="Row">
                        <div class="RequestOvertimeForm__Form">
                            <div class="Container--MainContent">
                                <div class="MessageProcessContainer">
                                    @include("System.Components.messageProcess")
                                </div>
                                <div class="Row GapC-1">
                                    @if(isset($admin))
                                        @foreach($admin as $Index=>$Value)
                                            @if($Index == "count_employees" && $IsHavePermissionEmployeeRead)
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">@lang("EmployeeNumber")</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($Index == "count_sections" && $IsHavePermissionSectionInRead)
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">@lang("SectionNumber")</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($Index == "count_sessions" && $IsHavePermissionSessionRead)
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">@lang("SessionsNumber")</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($Index == "count_contracts" && $IsHavePermissionContractInRead)
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">@lang("ContractNumber")</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($IsHavePermissionDecisionRead)
                                                @if($Index == "count_decisions")
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("DecisionNumber")</p>
                                                                <h2>{{ $Value }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Index == "count_decisions_in_month_current")
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">Monthly Decision</p>
                                                                <h2>{{ $Value }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            @if($IsHavePermissionVacationRead)
                                                @if($Index == "count_leaves_request_pending_in_month_current")
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">طلبات الاجازة المعلقة الشهرية</p>
                                                                <h2>{{ $Value }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            @if($IsHavePermissionOverTimeRead)
                                                @if($Index == "count_overtime_request_pending_in_month_current")
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">طلبات العمل الاضافي المعلقة الشهرية</p>
                                                                <h2>{{ $Value }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Index == "count_overtime_request_pending_in_month_current")
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">طلبات العمل الاضافي المعلقة الشهرية</p>
                                                                <h2>{{ $Value }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            @if($IsHavePermissionEmployeeRead)
                                                @if($Index == "count_employees_late_entry_current_day")
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">عدد الموظفين المتأخرين اليوم</p>
                                                                <h2>{{ $Value }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(isset($current_employee) && $IsYourPermission)
                                        @foreach($current_employee as $Index=>$Value)
                                            @if($Index == "count_days_overTime_in_month_current")
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">عدد الايام العمل الاضافي في الشهر</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($Index == "count_houres_overTime_in_month_current")
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">عدد ساعات العمل الاضافي في الشهر</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($Index == "count_days_attendance_in_month_current")
                                                <div class="Col-4-md">
                                                    <div class="stat-card">
                                                        <div class="stat-card__content">
                                                            <p class="text-uppercase mb-1 text-muted">عدد ايام الحضور في الشهر</p>
                                                            <h2>{{ $Value }}</h2>
                                                        </div>
                                                        <div class="stat-card__icon stat-card__icon--3">
                                                            <div class="stat-card__icon-circle">
                                                                <i class="material-icons">person</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($Index == "evaluation_avg_in_month_current")
                                                @if($Value->performance)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("performance")</p>
                                                                <h2>{{ $Value->performance ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->professionalism)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("professionalism")</p>
                                                                <h2>{{ $Value->professionalism ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->readiness_for_development)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("readiness_for_development")</p>
                                                                <h2>{{ $Value->readiness_for_development ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->collaboration)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("collaboration")</p>
                                                                <h2>{{ $Value->collaboration ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->commitment_and_responsibility)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("commitment_and_responsibility")</p>
                                                                <h2>{{ $Value->commitment_and_responsibility ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->innovation_and_creativity)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("innovation_and_creativity")</p>
                                                                <h2>{{ $Value->innovation_and_creativity ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->technical_skills)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">@lang("the")@lang("technical_skills")</p>
                                                                <h2>{{ $Value->technical_skills ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($Value->total_avg)
                                                    <div class="Col-4-md">
                                                        <div class="stat-card">
                                                            <div class="stat-card__content">
                                                                <p class="text-uppercase mb-1 text-muted">total_avg</p>
                                                                <h2>{{ $Value->total_avg ?? "-" }}</h2>
                                                            </div>
                                                            <div class="stat-card__icon stat-card__icon--3">
                                                                <div class="stat-card__icon-circle">
                                                                    <i class="material-icons">person</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
