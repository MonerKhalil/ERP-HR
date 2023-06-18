@extends("System.Pages.globalPage")

{{--@php--}}
{{--    dd($publicHoliday);--}}
{{--@endphp--}}

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--PublicHolidayForm">
        <div class="PublicHolidayFormPage">
            <div class="PublicHolidayFormPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => isset($publicHoliday) ? "تعديل العطلة الرسمية" : "اضافة عطلة رسمية جديدة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="PublicHolidayFormPage__Content">
                <div class="Row">
                    <div class="PublicHolidayFormPage__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark"
                                                      action="{{ isset($publicHoliday) ? route("system.public_holidays.update" , $publicHoliday["id"])
                                                                : route("system.public_holidays.store") }}"
                                                      method="post">
                                                    @csrf
                                                    @if(isset($publicHoliday))
                                                        @method("put")
                                                    @endif
                                                    <div class="ListData" >
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                معلومات العطلة الاساسية
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="PublicHolidayName" class="Input__Field"
                                                                                           type="text" name="name"
                                                                                           value="{{ isset($publicHoliday) ? $publicHoliday["name"] : "" }}"
                                                                                           placeholder="اسم العطلة الرسمية" required>
                                                                                    <label class="Input__Label" for="PublicHolidayName">
                                                                                        اسم العطلة الرسمية
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="PublicHolidayDate_S" class="DateMinToday Date__Field"
                                                                                           TargetDateStartName="StartDatePublicHoliday"
                                                                                           value="{{isset($publicHoliday) ? $publicHoliday["start_date"] : ""}}"
                                                                                           type="date" name="start_date"
                                                                                           placeholder="تبدأ من تاريخ" required>
                                                                                    <label class="Date__Label" for="PublicHolidayDate_S">
                                                                                        تبدأ من تاريخ
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="PublicHolidayDate_E"
                                                                                           class="DateEndFromStart Date__Field"
                                                                                           data-StartDateName="StartDatePublicHoliday"
                                                                                           value="{{isset($publicHoliday) ? $publicHoliday["end_date"] : ""}}"
                                                                                           type="date" name="end_date" required
                                                                                           placeholder="تنتهي في تاريخ">
                                                                                    <label class="Date__Label" for="PublicHolidayDate_E">
                                                                                        تنتهي في تاريخ
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
                                                                        @if(isset($publicHoliday))
                                                                                تعديل الاجازة
                                                                            @else
                                                                                اضافة عطلة جديد
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
