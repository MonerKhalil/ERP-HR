@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeOvertimeForm">
        <div class="NewTypeOvertimeForm">
            <div class="NewTypeOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => isset($overtimeType) ? "تعديل نوع الوقت الاضافي" : "تسجيل نوع عمل اضافي جديد" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NewTypeOvertimeForm__Content">
                <div class="Row">
                    <div class="NewTypeOvertimeForm__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark"
                                                      action="{{ isset($overtimeType) ? route("system.overtime_types.update" , $overtimeType["id"]) : route("system.overtime_types.store") }}"
                                                      method="post">
                                                    @csrf
                                                    @if(isset($overtimeType))
                                                        @method("put")
                                                    @endif
                                                    <div class="ListData" >
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                معلومات العمل الاضافي الاساسية
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="OverTimeName" class="Input__Field"
                                                                                           type="text" name="name"
                                                                                           value="{{ isset($overtimeType) ? $overtimeType["name"] : "" }}"
                                                                                           placeholder="اسم النوع">
                                                                                    <label class="Input__Label" for="OverTimeName">
                                                                                        اسم النوع
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="OverTimeMaxSalary"
                                                                                           class="Input__Field"
                                                                                           type="number" name="max_rate_salary"
                                                                                           value="{{ isset($overtimeType) ? $overtimeType["max_rate_salary"] : "" }}"
                                                                                           min="1" max="100"
                                                                                           placeholder="نسبة سقف الراتب المزاد">
                                                                                    <label class="Input__Label"
                                                                                           for="OverTimeMaxSalary">
                                                                                        نسبة سقف الراتب المزاد
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="OverTimeMinHour"
                                                                                           class="Input__Field"
                                                                                           type="number" name="min_hours_in_days"
                                                                                           value="{{ isset($overtimeType) ? $overtimeType["min_hours_in_days"] : "" }}"
                                                                                           min="1" max="24"
                                                                                           placeholder="الحد الادنى لساعات قبول الاضافي">
                                                                                    <label class="Input__Label"
                                                                                           for="OverTimeMinHour">
                                                                                        الحد الادنى لساعات قبول الاضافي
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="OverTimeHourSalary"
                                                                                           class="Input__Field" min="1"
                                                                                           type="number" name="salary_in_hours"
                                                                                           value="{{ isset($overtimeType) ? $overtimeType["salary_in_hours"] : "" }}"
                                                                                           placeholder="اجار الساعة الواحدة">
                                                                                    <label class="Input__Label"
                                                                                           for="OverTimeHourSalary">
                                                                                        اجار الساعة الواحدة
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Row GapC-1-5">
                                                        <div class="Col">
                                                            <div class="Form__Group">
                                                                <div class="Form__Button">
                                                                    <button class="Button Send"
                                                                            type="submit">
                                                                        @if(isset($overtimeType))
                                                                            تعديل النوع
                                                                        @else
                                                                            اضافة نوع جديد
                                                                        @endif
                                                                    </button>
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
    </section>
@endsection
