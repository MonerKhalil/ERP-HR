@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SettingWorkDetails">
        <div class="SettingWorkDetailsPage">
            <div class="SettingWorkDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewWorkSettingDetails") ,
                    'paths' => [[__("home") , '#'] , [__("viewWorkSettingDetails")]] ,
                    'summery' => __("titleViewWorkSettingDetails")
                ])
            </div>
            <div class="SettingWorkDetailsPage__Content">
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
                                                        @lang("nameType")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$workSetting["name"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("workSettingDays")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$workSetting["count_days_work_in_weeks"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("hoursWorkSetting")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$workSetting["count_hours_work_in_days"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("holidayWorkSetting")
                                                    </span>
                                                    <span class="Data_Value">
                                                        @php
                                                            $ListDays = explode(",",$workSetting["days_leaves_in_weeks"]) ;
                                                        @endphp
                                                        {{ join(" , " , $ListDays) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("workSettingStartDate")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$workSetting["work_hours_from"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("workSettingEndDate")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$workSetting["work_hours_to"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("workSettingDescription")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $workSetting["description"] ?? "_" }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("operationWorkSetting")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a href="{{route("system.work_settings.edit" , $workSetting["id"])}}"
                                                   class="Button Button--Primary">
                                                    @lang("editType")
                                                </a>
                                                <form class="Form"
                                                      style="display: inline-block" method="post"
                                                      action="{{route("system.work_settings.destroy" , $workSetting["id"])}}">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="Button Button--Danger">
                                                        @lang("removeType")
                                                    </button>
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
    </section>
@endsection
