@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--VacationsDetailsPage">
        <div class="VacationsDetailsPage">
            <div class="VacationsDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تفاصيل الاجازة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="VacationsDetailsPage__Content">
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
                                                        رقم الطلب
                                                    </span>
                                                    <span class="Data_Value">
                                                        32
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        مقدم الطلب
                                                    </span>
                                                    <span class="Data_Value">
                                                        امير الحلو
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        نوع الاجازة
                                                    </span>
                                                    <span class="Data_Value">
                                                        سفر
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        حالة الطلب
                                                    </span>
                                                    <span class="Data_Value">
                                                        معلق
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ تقديم الطلب
                                                    </span>
                                                    <span class="Data_Value">
                                                        10-10-2025
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                ساعات وايام الاجازة
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Group">
                                                <div class="ListData__GroupTitle">
                                                    <span class="Title">الاجازة الاولى</span>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ الاجازة
                                                    </span>
                                                    <span class="Data_Value">
                                                        10-5-2022
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        طبيعة الاجازة
                                                    </span>
                                                    <span class="Data_Value">
                                                        اجازة جزئية
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            مدة الاجازة
                                                        </span>
                                                        <span class="Data_Value">
                                                            @if(app()->getLocale() === "en")
                                                                10:45 AM &rarr; 12:00 PM
                                                            @else
                                                                10:45 صباحا
                                                                &larr;
                                                                12:00 مساءا
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            سبب الاجازة
                                                        </span>
                                                        <span class="Data_Value">
                                                            افلة
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ListData__Group">
                                                <div class="ListData__GroupTitle">
                                                    <span class="Title">الاجازة الثانية</span>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ الاجازة
                                                    </span>
                                                        <span class="Data_Value">
                                                        10-5-2022
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        طبيعة الاجازة
                                                    </span>
                                                        <span class="Data_Value">
                                                        اجازة جزئية
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            مدة الاجازة
                                                        </span>
                                                        <span class="Data_Value">
                                                            @if(app()->getLocale() === "en")
                                                                10:45 AM &rarr; 12:00 PM
                                                            @else
                                                                10:45 صباحا
                                                                &larr;
                                                                12:00 مساءا
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            سبب الاجازة
                                                        </span>
                                                        <span class="Data_Value">
                                                            افلة
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- For Admin -->
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على الاجازة
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a href="#" class="Button Button--Primary">
                                                    قبول اجازة
                                                </a>
                                                <a href="#" class="Button Button--Danger">
                                                    رفض اجازة
                                                </a>
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
