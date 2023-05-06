@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddDecisionPage">
        <div class="AddDecisionPage">
            <div class="AddUserPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("sessionForm") ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="AddUserPage__Content">
                <div class="Row">
                    <div class="AddUserPage__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark" action="#" method="post">
                                                    @csrf
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                @lang("basics")
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="SessionName" class="Input__Field" type="text"
                                                                                       name="SessionName" placeholder="@lang("sessionName")" required>
                                                                                <label class="Input__Label" for="SessionName">@lang("sessionName")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="SessionDate" class="Date__Field"
                                                                                       type="date" name="Session Date"
                                                                                       placeholder="@lang("sessionDate")" required>
                                                                                <label class="Date__Label" for="SessionDate">@lang("sessionDate")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="SessionTitle" class="Input__Field" type="text"
                                                                                       name="SessionName"
                                                                                       placeholder="@lang("sessionTitle")" required>
                                                                                <label class="Input__Label" for="SessionTitle">
                                                                                    @lang("sessionTitle")
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Textarea">
                                                                            <div class="Textarea__Area">
                                                                                <textarea id="SessionDirection"
                                                                                          class="Textarea__Field"
                                                                                          name="SessionName"
                                                                                          rows="6"
                                                                                          placeholder="@lang("sessionDirection")"
                                                                                          required></textarea>
                                                                                <label class="Textarea__Label"
                                                                                       for="SessionDirection">
                                                                                    @lang("sessionDirection")
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                اعضاء الجلسة
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="LeaderSession" class="Input__Field" type="text"
                                                                                       name="SessionName" placeholder="رئيس الجلسة"
                                                                                       required>
                                                                                <label class="Input__Label" for="LeaderSession">رئيس الجلسة</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Selector2Readonly Col-4-md Col-6-sm"
                                                                     data-ClassContainer="Col-4-md Col-6-sm"
                                                                     data-ReadonlyNames="names[]"
                                                                     data-TitleField="عضو في الجلسة"
                                                                     data-RequiredNum="1"
                                                                     data-Location="Before">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @include("System.Components.selector" , [
                                                                                    'Name' => "Member" , "Required" => "true" ,
                                                                                    "DefaultValue" => "" , "Label" => "حدد الاعضاء" ,
                                                                                    "Options" => [ ["Label" => "انس بكار" , "Value" => "1"] ,
                                                                                                   ["Label" => "احمد امير الحلو" , "Value" => "2"] ,
                                                                                                   ["Label" => "منير خليل" , "Value" => "3"]]
                                                                                ])
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
                                                                            type="submit">انشاء جلسة</button>
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
