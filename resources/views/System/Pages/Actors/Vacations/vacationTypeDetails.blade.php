@extends("System.Pages.globalPage")

{{--@php--}}
{{--    dd($leaveType);--}}
{{--@endphp--}}

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--DecisionDetailsPage">
        <div class="DecisionDetailsPage">
            <div class="DecisionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تفاصيل نوع الاجازة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="DecisionDetailsPage__Content">
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
                                                        اسم النوع
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $leaveType["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        نوع الاجازة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["type_effect_salary"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        ايام الاجازات
                                                    </span>
                                                    <span class="Data_Value">
                                                        @if($leaveType["leave_limited"])
                                                            محدود
                                                        @else
                                                            مفتوح
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        عدد ايام الاجازة في السنة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["max_days_per_years"] ?? "_"}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        عدد الايام المسموحة بالشهر
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["max_days_per_month"] ?? "_"}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        هل الاجازات الساعية متطبقة
                                                    </span>
                                                    <span class="Data_Value">
                                                        @if($leaveType["is_hourly"])
                                                            مطبق
                                                        @else
                                                            غير مطبق
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        عدد الساعات المسموحة في اليوم
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["max_hours_per_day"] ?? "_"}}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                معلومات خاصة بالموظف
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الجنس
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["gender"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        عدد سنوات العمل
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["years_employee_services"] ?? "_"}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        نسبة الخصم من الراتب لليوم الواحد
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$leaveType["rate_effect_salary"] ?? "_"}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على نوع الاجازة
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a href="{{ route("system.leave_types.edit" , $leaveType["id"]) }}"
                                                   class="Button Button--Primary">
                                                    تعديل نوع الاجازة
                                                </a>
                                                <form class="Form"
                                                      style="display: inline-block" method="post"
                                                      action="{{ route("system.leave_types.destroy" , $leaveType["id"]) }}">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="Button Button--Danger">
                                                        حذف النوع
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

@section("extraScripts")
    {{-- JS VenoBox --}}
    <script src="{{asset("System/Assets/Lib/venobox/dist/venobox.min.js")}}"></script>
@endsection
