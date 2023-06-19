@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--OverTimeDetailsPage">
        <div class="OverTimeDetailsPage">
            <div class="OverTimeDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تفاصيل العمل الاضافي" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="OverTimeDetailsPage__Content">
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
                                                        {{ $overtimeType["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        نسبة سقف الراتب المزاد
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtimeType["max_rate_salary"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الحد الادنى لساعات قبول الاضافي
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtimeType["min_hours_in_days"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        اجار الساعة الواحدة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $overtimeType["salary_in_hours"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على نوع العمل الاضافي
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a href="{{ route("system.overtime_types.edit" , $overtimeType["id"]) }}"
                                                   class="Button Button--Primary">
                                                    تعديل النوع
                                                </a>
                                                <form class="Form"
                                                      style="display: inline-block" method="post"
                                                      action="{{ route("system.overtime_types.destroy" , $overtimeType["id"]) }}">
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
