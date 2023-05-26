@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddEOSPage">
        <div class="AddEOSPage">
            <div class="AddEOSPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterEmployeeEOS') ,
                    'paths' => [['employees End Of Service' , '#'] , ['EOS']] ,
                    'summery' => __('RegisterEOSPage')
                ])
            </div>
        </div>
        <div class="AddEOSPagePrim__Content">
            <div class="Row">
                <div class="AddEOSPage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="EOSPage__Information">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Header">
                                                <div class="Card__Title">
                                                    <h3>@lang("contractInfo")</h3>
                                                </div>
                                            </div>
                                            <form class="Form Form--Dark">
                                                <div class="Row GapC-1-5">
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="ListData__Content">
                                                            <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("employee_id")</span>
                                                                <span class="Data_Value">{{$dataEndService->employee_id}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="ListData__Content">
                                                            <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("reason")</span>
                                                                <span class="Data_Value">{{$dataEndService->reason}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="ListData__Content">
                                                            <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("EOSStartDate")</span>
                                                                <span class="Data_Value">{{$dataEndService->start_break_date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="ListData__Content">
                                                            <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("EOSEndDate")</span>
                                                                <span class="Data_Value">{{$dataEndService->end_break_date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Col-4-md Col-6-sm">
                                                        <div class="ListData__Content">
                                                            <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("decisionNumber")</span>
                                                                <span class="Data_Value">{{$dataEndService->decision_id}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                    <div class="Col-4-md Col-6-sm">--}}
                                                    {{--                                                        <div class="Form__Group">--}}
                                                    {{--                                                            <div class="Form__Date">--}}
                                                    {{--                                                                <div class="Date__Area">--}}
                                                    {{--                                                                    <input id="decisionDate"--}}
                                                    {{--                                                                           class="Date__Field"--}}
                                                    {{--                                                                           type="text"--}}
                                                    {{--                                                                           name="decisionDate"--}}
                                                    {{--                                                                           placeholder="@lang("decisionDate")">--}}
                                                    {{--                                                                    <label class="Date__Label"--}}
                                                    {{--                                                                           for="decisionDate">@lang("decisionDate")</label>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
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
    </section>
@endsection