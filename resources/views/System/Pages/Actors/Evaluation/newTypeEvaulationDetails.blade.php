<?php
    $MyAccount = auth()->user() ;
    $IsHavePermissionEvaluationRead = $MyAccount->can("read_employee_evaluations") || $MyAccount->can("all_employee_evaluations") ;
    $IsHavePermissionEvaluationEdit = $MyAccount->can("update_employee_evaluations") || $MyAccount->can("all_employee_evaluations") ;
    $IsHavePermissionEvaluationDelete = $MyAccount->can("delete_employee_evaluations") || $MyAccount->can("all_employee_evaluations") ;
    $IsHavePermissionEvaluationExport = $MyAccount->can("export_employee_evaluations") || $MyAccount->can("all_employee_evaluations") ;
    $IsHavePermissionEvaluationCreate = $MyAccount->can("create_employee_evaluations") || $MyAccount->can("all_employee_evaluations") ;
    $IsHavePermissionDecisionRead = $MyAccount->can("read_decisions") || $MyAccount->can("all_decisions") ;
?>

@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SessionDetailsPage">
        <div class="SessionDetailsPage">
            <div class="SessionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض تفاصيل النوع" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="SessionDetailsPage__Content">
                <div class="Container--MainContent">
                    <div class="MessageProcessContainer">
                        @include("System.Components.messageProcess")
                    </div>
                    <div class="Row">
                        <div class="Col">
                            <div class="Card">
                                <div class="Card__Inner">
                                    @if($IsHavePermissionEvaluationRead)
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
                                                        الموظف المراد تقيمه
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{ $evaluation->employee["first_name"].$evaluation->employee["last_name"] }}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الاشخاص الذين سيقومون بعملية التقييم
                                                    </span>
                                                        <span class="Data_Value">
                                                        @php
                                                            $EmployeesList = "" ;
                                                            foreach ($evaluation->enter_evaluation_employee as $Employee) {
                                                                if($EmployeesList !== "")
                                                                    $EmployeesList = $EmployeesList." , " ;
                                                                $EmployeesList = $EmployeesList.$Employee->employee["first_name"]
                                                                    .$Employee->employee["last_name"] ;
                                                            }
                                                        @endphp
                                                            {{ $EmployeesList }}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ التقييم
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{ $evaluation["evaluation_date"] }}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ التقييم التالي
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{ $evaluation["next_evaluation_date"] }}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ انشاء هذا النوع
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{ $evaluation["created_at"] }}
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ تحديث هذا النوع
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{ $evaluation["updated_at"] }}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ListData NotResponsive">
                                            <div class="ListData__Head">
                                                <h4 class="ListData__Title">
                                                    الوصف الخاص بهذا التقييم
                                                </h4>
                                            </div>
                                            <div class="ListData__Content">
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الوصف
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{ $evaluation["description"] }}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($IsHavePermissionEvaluationRead || $IsHavePermissionEvaluationCreate || $IsHavePermissionEvaluationRead ||
                                        $IsHavePermissionEvaluationCreate || $IsHavePermissionEvaluationDelete)
                                            <div class="ListData">
                                                <div class="ListData__Head">
                                                    <h4 class="ListData__Title">
                                                        العمليات على النوع
                                                    </h4>
                                                </div>
                                                <div class="ListData__Content">
                                                    <div class="Card__Inner px0">
                                                        @if($IsHavePermissionEvaluationRead)
                                                            <a href="{{ route("system.evaluation.employee.show.add.decision.evaluation" , $evaluation["id"]) }}"
                                                               class="Button Button--Primary my-1">
                                                                اضافة قرار للموظف
                                                            </a>
                                                        @endif
                                                        @if($IsHavePermissionEvaluationCreate)
                                                            <a href="{{ route("system.evaluation.employee.show.add.evaluation" , $evaluation["id"]) }}"
                                                               class="Button Button--Primary my-1">
                                                                اضافة تقييم للموظف
                                                            </a>
                                                        @endif
                                                        @if($IsHavePermissionEvaluationRead)
                                                            <a href="{{ route("system.evaluation.employee.show.evaluation" , $evaluation["id"]) }}"
                                                               class="Button Button--Primary my-1">
                                                                عرض تقييمات الموظف
                                                            </a>
                                                        @endif
                                                        @if($IsHavePermissionDecisionRead)
                                                            <a href="{{ route("system.evaluation.employee.show.evaluation.decisions" , $evaluation["id"]) }}"
                                                               class="Button Button--Primary my-1">
                                                                عرض قرارات الموظف
                                                            </a>
                                                        @endif
                                                        @if($IsHavePermissionEvaluationDelete)
                                                            <form class="Form"
                                                                  style="display: inline-block" method="post"
                                                                  action="{{ route("system.evaluation.employee.destroy.evaluation" , $evaluation["id"]) }}">
                                                                @csrf
                                                                @method("delete")
                                                                <button type="submit" class="Button Button--Danger">
                                                                    حذف المعلومات
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
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
