@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SettingWork">
        <div class="SettingWorkPage">
            <div class="SettingWorkPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "اعدادات العمل" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="SettingWorkPage__Content">
                <div class="ViewSetting__Content">
                    <div class="Row">
                        <div class="SettingWorkPage__Form">
                            <div class="Container--MainContent">
                                <div class="MessageProcessContainer">
                                    @include("System.Components.messageProcess")
                                </div>
                                <div class="Row">
                                    <div class="Card">
                                        <div class="Card__Content">
                                            <div class="Card__Inner">
                                                <div class="Card__Body">
                                                    <form class="Form Form--Dark"
                                                          action="{{ route("system.work_settings.store") }}"
                                                          enctype="multipart/form-data"
                                                          method="post">
                                                        @csrf
                                                        <div class="ListData">
                                                            <div class="ListData__Content">
                                                                <div class="ListData__Head">
                                                                    <h4 class="ListData__Title">
                                                                        اعدادات اوقات العمل
                                                                    </h4>
                                                                </div>
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="DayNumWork" class="Input__Field" min="1"
                                                                                               type="number" name="count_days_work_in_weeks"
                                                                                               value="{{ $data[0]["count_days_work_in_weeks"] }}"
                                                                                               placeholder="عدد ايام العمل اسبوعيا" required>
                                                                                        <label class="Input__Label" for="DayNumWork">
                                                                                            عدد ايام العمل اسبوعيا
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="HourNumWork" class="Input__Field" min="1"
                                                                                               type="number" name="count_hours_work_in_days"
                                                                                               value="{{ $data[0]["count_hours_work_in_days"] }}"
                                                                                               placeholder="عدد ساعات العمل يوميا" required>
                                                                                        <label class="Input__Label" for="HourNumWork">
                                                                                            عدد ساعات العمل يوميا
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="HourNumWork" class="Input__Field" min="1"
                                                                                               type="number" name="days_leaves_in_weeks"
                                                                                               value="{{ $data[0]["days_leaves_in_weeks"] }}"
                                                                                               placeholder="عدد ايام العطل" required>
                                                                                        <label class="Input__Label" for="HourNumWork">
                                                                                            عدد ايام العطل
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="StartWorkFrom"
                                                                                               class="TimeNoDate Date__Field"
                                                                                               type="time" name="work_hours_from"
                                                                                               placeholder="يبدأ الدوام من الساعة"
                                                                                               value="{{ $data[0]["work_hours_from"] }}"
                                                                                               required>
                                                                                        <label class="Date__Label"
                                                                                               for="StartWorkFrom">
                                                                                            يبدأ الدوام من الساعة
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="EndWorkIn"
                                                                                               class="TimeNoDate Date__Field"
                                                                                               type="time" name="work_hours_to"
                                                                                               value="{{ $data[0]["work_hours_to"] }}"
                                                                                               placeholder="ينتهي الدوام عند الساعة"
                                                                                               required>
                                                                                        <label class="Date__Label"
                                                                                               for="EndWorkIn">
                                                                                            ينتهي الدوام عند الساعة
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $Days = [] ;
                                                                                            foreach ($days as $Index => $Day) {
                                                                                                array_push($Days , [ "Name" => "days[]" ,
                                                                                                     "Label" => $Day ,
                                                                                                     "Value" => $Index]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.multiSelector" , [
                                                                                            'Name' => "_" ,
                                                                                            "NameIDs" => "DaysID" , "DefaultValue" => "" , "Label" => "ايام الدوام المرادة" ,
                                                                                            "Options" => $Days
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Row">
                                                            <div class="Col">
                                                                <div class="Form__Group">
                                                                    <div class="Form__Button">
                                                                        <button class="Button Send"
                                                                                type="submit">تغيير اعدادات الدوام</button>
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
        </div>
    </section>
@endsection
