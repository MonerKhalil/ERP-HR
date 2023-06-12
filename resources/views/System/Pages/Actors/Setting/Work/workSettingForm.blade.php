@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SettingWorkForm">
        <div class="SettingWorkFormPage">
            <div class="SettingWorkFormPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => isset($workSetting) ? "تعديل الدوام" : "اضافة دوام جديد" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="SettingWorkFormPage__Content">
                <div class="FormSetting__Content">
                    <div class="Row">
                        <div class="SettingWorkFormPage__Form">
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
                                                          action="{{ (isset($workSetting)) ? route("system.work_settings.update" , $workSetting["id"])
                                                                    :  route("system.work_settings.store") }}"
                                                          method="post">
                                                        @csrf
                                                        @if(isset($workSetting))
                                                            @method("put")
                                                        @endif
                                                        <div class="ListData">
                                                            <div class="ListData__Content">
                                                                <div class="ListData__Head">
                                                                    <h4 class="ListData__Title">
                                                                        معلومات النوع
                                                                    </h4>
                                                                </div>
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="WorkSettingName" class="Input__Field"
                                                                                               type="text" name="name"
                                                                                               @if(isset($workSetting))
                                                                                                    value="{{ $workSetting["name"] }}"
                                                                                               @endif
                                                                                               placeholder="اسم النوع الجديد" required>
                                                                                        <label class="Input__Label" for="WorkSettingName">
                                                                                            اسم النوع الجديد
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
                                                                                               @if(isset($workSetting))
                                                                                                    value="{{ $workSetting["work_hours_from"] }}"
                                                                                               @endif
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
                                                                                               @if(isset($workSetting))
                                                                                                    value="{{ $workSetting["work_hours_to"] }}"
                                                                                               @endif
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


                                                                                            if(isset($workSetting)) {
                                                                                                $ListDays = explode(",",$workSetting["days_leaves_in_weeks"]) ;
                                                                                                foreach ($days as $Day) {
                                                                                                    $IsChecked = false ;
                                                                                                    foreach ($ListDays as $DayItem)
                                                                                                        if($DayItem == $Day)
                                                                                                            $IsChecked = true ;
                                                                                                    array_push($Days , [ "Name" => "days[]" ,
                                                                                                         "IsChecked" => $IsChecked ,
                                                                                                         "Label" => $Day ,
                                                                                                         "Value" => $Day]) ;
                                                                                                }
                                                                                            } else {
                                                                                                foreach ($days as $Day)
                                                                                                    array_push($Days , [ "Name" => "days[]" ,
                                                                                                         "Label" => $Day ,
                                                                                                         "Value" => $Day]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.multiSelector" , [
                                                                                            'Name' => "_" , "NameIDs" => "DaysID" ,
                                                                                            "Required" => "true" ,
                                                                                            "Label" => "ايام العطل المرادة" ,
                                                                                            "Options" => $Days
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-12">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Textarea">
                                                                                    <div class="Textarea__Area">
                                                                                        <textarea id="Description" name="description"
                                                                                                  class="Textarea__Field"
                                                                                                  placeholder="الوصف" rows="3">@if(isset($workSetting)){{ $workSetting["description"] ?? "" }}@endif</textarea>
                                                                                        <label class="Textarea__Label"
                                                                                               for="Description">
                                                                                            الوصف
                                                                                        </label>
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
                                                                                type="submit">ضبط نوع الدوام</button>
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
