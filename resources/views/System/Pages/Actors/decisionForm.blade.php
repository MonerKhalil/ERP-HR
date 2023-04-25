@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddDecisionPage">
        <div class="AddDecisionPage">
            <div class="AddUserPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "Decision Form" ,
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
                                                                Main Information
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "Type" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "Decision Type" ,
                                                                                        "Options" => [ ["Label" => "Decision" , "Value" => "Decision"] ,
                                                                                                       ["Label" => "Administrative Order" , "Value" => "Administrative order"]]
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="DecisionNumber" class="Input__Field" type="number"
                                                                                           name="PhoneNumber" placeholder="Decision Number" required>
                                                                                    <label class="Input__Label" for="DecisionNumber">Decision Number</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="DateDecision" class="Date__Field"
                                                                                           type="date" name="DateDecision"
                                                                                           placeholder="Date Decision" required>
                                                                                    <label class="Date__Label" for="DateDecision">Date Decision</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Date">
                                                                                <div class="Date__Area">
                                                                                    <input id="DateDecisionEnd" class="Date__Field"
                                                                                           type="date" name="DateDecision"
                                                                                           placeholder="Date Decision End">
                                                                                    <label class="Date__Label" for="DateDecisionEnd">
                                                                                        Date Decision End
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm"  >
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Select">
                                                                                <div class="Select__Area">
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "SessionName" , "Required" => "true" ,
                                                                                        "DefaultValue" => "" , "Label" => "Session Name" ,
                                                                                        "Options" => [ ["Label" => "First Session" , "Value" => "1"] ,
                                                                                                       ["Label" => "Second Session" , "Value" => "2"]]
                                                                                    ])
                                                                                </div>
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
                                                                <label for="DecisionEditor">
                                                                    Decision Content
                                                                </label>
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row">
                                                                    <div class="Col">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Textarea">
                                                                                <div class="Textarea__Area">
                                                                                    <div class="trumbowyg-dark">
                                                                            <textarea id="DecisionEditor" class="TextEditor Textarea__Field"
                                                                                      placeholder="Your text as placeholder" required></textarea>
                                                                                    </div>
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
                                                                            type="submit">@lang("addUser")</button>
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

@section("extraScripts")
    {{-- JS Trumbowyg --}}
    <script src="{{asset("System/Assets/Lib/trumbowyg/dist/trumbowyg.min.js")}}"></script>
    @if(app()->getLocale()==="ar")
        <script src="{{asset("System/Assets/Lib/trumbowyg/dist/langs/ar.min.js")}}"></script>
    @endif
@endsection
