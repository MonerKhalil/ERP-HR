@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SessionDetailsPage">
        <div class="SessionDetailsPage">
            <div class="SessionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("Payroll") ,
                    'paths' => [[__("home") , '#'] , [__("Payroll")]] ,
                    'summery' => __("titlePayroll")
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
                                                        @lang("employeeName")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$data[0]->employee->name??""}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("total_salary")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->total_salary }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("default_salary")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->default_salary }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("overtime_minute")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->overtime_minute }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("overtime_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->overtime_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("bonuses_decision")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->bonuses_decision }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("penalties_decision")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->bonuses_decision }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("absence_days")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->absence_days }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("absence_days_value")")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->absence_days_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("count_leaves_unpaid")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->count_leaves_unpaid }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("leaves_unpaid_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->leaves_unpaid_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("count_leaves_effect_salary")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->leaves_effect_salary }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("leaves_effect_salary_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->leaves_effect_salary_value}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("position_employee_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->position_employee_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("conferences_employee_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->conferences_employee_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("education_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->education_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("minutes_late_entry")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->minutes_late_entry }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("minutes_late_entry_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->minutes_late_entry_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("minutes_early_exit")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->minutes_early_exit }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("minutes_early_exit_value")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->minutes_early_exit_value }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("created_at")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $data[0]->created_at }}
                                                    </span>
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
