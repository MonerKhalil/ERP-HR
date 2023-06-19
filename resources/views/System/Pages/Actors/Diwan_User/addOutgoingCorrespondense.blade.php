@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddCorrespondencePage">
        <div class="AddCorrespondencePage">
            <div class="AddCorrespondencePage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterCorrespondence') ,
                    'paths' => [['Correspondences' , '#'] , ['Correspondence']] ,
                    'summery' => __('RegisterCorrespondencesPage')
                ])
            </div>
        </div>
        <div class="AddCorrespondencePagePrim__Content">
            <div class="Row">
                <div class="AddCorrespondencePage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="CorrespondencePage__Information">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <form class="Form Form--Dark" action="{{route("correspondences.store")}}"
                                                  method="post" enctype="multipart/form-data">
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
                                                                <div class="VisibilityOption Col-4-md Col-6-sm"
                                                                     data-ElementsTargetName="typeTemp">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $types = [] ;
                                                                                    foreach ($type as $Index => $Item) {
                                                                                        array_push($types , [ "Label" => $Item ,
                                                                                             "Value" => $Item] ) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "type" , "Required" => "true" , "Label" => __('correspondenceType'),"DefaultValue" => "",
                                                                                            "Options" => $types,])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{--                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"--}}
                                                                {{--                                                                     data-TargetName="typeTemp"--}}
                                                                {{--                                                                     data-TargetValue="internal">--}}
                                                                {{--                                                                    <div class="ListData__Content">--}}
                                                                {{--                                                                        <div class="Data_Col">--}}
                                                                {{--                                                                            <span--}}
                                                                {{--                                                                                class="Data_Label">@lang("InternalNumber")</span>--}}
                                                                {{--                                                                            <span--}}
                                                                {{--                                                                                class="Data_Value">{{$number_internal}}</span>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="typeTemp"
                                                                     data-TargetValue="internal">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="number_internal"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       readonly
                                                                                       value={{isset($number_internal) ? $number_internal : ""}}
                                                                                           name="number_internal">
                                                                                <label class="Input__Label"
                                                                                       for="number_internal">@lang("numberInternal")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="typeTemp"
                                                                     data-TargetValue="external">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="number_external"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       readonly
                                                                                       value={{isset($number_external) ? $number_external : ""}}
                                                                                           name="number_external">
                                                                                <label class="Input__Label"
                                                                                       for="number_internal">@lang("numberExternal")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
{{--                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"--}}
{{--                                                                     data-TargetName="typeTemp"--}}
{{--                                                                     data-TargetValue="external">--}}
{{--                                                                    <div class="ListData__Content">--}}
{{--                                                                        <div class="Data_Col">--}}
{{--                                                                            <span--}}
{{--                                                                                class="Data_Label">@lang("ExternalNumber")</span>--}}
{{--                                                                            <span--}}
{{--                                                                                class="Data_Value">{{$number_external}}</span>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Date">
                                                                            <div class="Date__Area">
                                                                                <input id="correspondenceDate"
                                                                                       class="Date__Field"
                                                                                       type="date"
                                                                                       name="date"
                                                                                       placeholder="correspondence Date">
                                                                                <label class="Date__Label"
                                                                                       for="correspondenceDate">correspondence
                                                                                    Date</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{--                                                                <div class="Col-4-md Col-6-sm">--}}
                                                                {{--                                                                    <div class="Form__Group">--}}
                                                                {{--                                                                        <div class="Form__Input">--}}
                                                                {{--                                                                            <div class="Input__Area">--}}
                                                                {{--                                                                                <input id="source"--}}
                                                                {{--                                                                                       class="Input__Field"--}}
                                                                {{--                                                                                       type="text"--}}
                                                                {{--                                                                                       name="source"--}}
                                                                {{--                                                                                       placeholder="@lang("source")">--}}
                                                                {{--                                                                                <label class="Input__Label"--}}
                                                                {{--                                                                                       for="source">@lang("source")</label>--}}
                                                                {{--                                                                            </div>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                {{--                                                                <div class="Col-4-md Col-6-sm">--}}
                                                                {{--                                                                    <div class="Form__Group">--}}
                                                                {{--                                                                        <div class="Form__Input">--}}
                                                                {{--                                                                            <div class="Input__Area">--}}
                                                                {{--                                                                                <input id="destination"--}}
                                                                {{--                                                                                       class="Input__Field"--}}
                                                                {{--                                                                                       type="text"--}}
                                                                {{--                                                                                       name="destination"--}}
                                                                {{--                                                                                       placeholder="@lang("destination")">--}}
                                                                {{--                                                                                <label class="Input__Label"--}}
                                                                {{--                                                                                       for="destination">@lang("destination")</label>--}}
                                                                {{--                                                                            </div>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}

                                                                {{--                                                                <div class="Col-4-md Col-6-sm">--}}
                                                                {{--                                                                    <div class="Form__Group">--}}
                                                                {{--                                                                        <div class="Form__CheckBox">--}}
                                                                {{--                                                                            <div class="CheckBox__Area">--}}
                                                                {{--                                                                                <input type="checkbox" id="needTracking"--}}
                                                                {{--                                                                                       class="CheckBox__Input">--}}
                                                                {{--                                                                                <label class="CheckBox__Label"--}}
                                                                {{--                                                                                       for="needTracking">--}}
                                                                {{--                                                                                    <span class="IconChecked">--}}
                                                                {{--                                                                                        <i class="material-icons ">--}}
                                                                {{--                                                                                            check_small--}}
                                                                {{--                                                                                        </i>--}}
                                                                {{--                                                                                    </span>--}}
                                                                {{--                                                                                    <span--}}
                                                                {{--                                                                                        class="TextCheckBox">@lang("needTracking")</span>--}}
                                                                {{--                                                                                </label>--}}
                                                                {{--                                                                            </div>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                {{--                                                                <div class="VisibilityOption Col-4-md Col-6-sm"--}}
                                                                {{--                                                                     data-ElementsTargetName="ReplyToOutgoing"--}}
                                                                {{--                                                                     >--}}
                                                                {{--                                                                    <div class="Form__Group">--}}
                                                                {{--                                                                        <div class="Form__CheckBox">--}}
                                                                {{--                                                                            <div class="CheckBox__Area">--}}
                                                                {{--                                                                                <input type="checkbox"--}}
                                                                {{--                                                                                       id="replyToOutgoing"--}}
                                                                {{--                                                                                       class="CheckBox__Input">--}}
                                                                {{--                                                                                <label class="CheckBox__Label"--}}
                                                                {{--                                                                                       for="replyToOutgoing">--}}
                                                                {{--                                                                                    <span class="IconChecked">--}}
                                                                {{--                                                                                        <i class="material-icons ">--}}
                                                                {{--                                                                                            check_small--}}
                                                                {{--                                                                                        </i>--}}
                                                                {{--                                                                                    </span>--}}
                                                                {{--                                                                                    <span--}}
                                                                {{--                                                                                        class="TextCheckBox">@lang("replyToOutgoing")</span>--}}
                                                                {{--                                                                                </label>--}}
                                                                {{--                                                                            </div>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                {{--                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"--}}
                                                                {{--                                                                     data-TargetName="ReplyToOutgoing"--}}
                                                                {{--                                                                     data-TargetValue="true">--}}
                                                                {{--                                                                    <div class="Form__Group">--}}
                                                                {{--                                                                        <div class="Form__Input">--}}
                                                                {{--                                                                            <div class="Input__Area">--}}
                                                                {{--                                                                                <input id="outgoingNumber"--}}
                                                                {{--                                                                                       class="Input__Field"--}}
                                                                {{--                                                                                       type="number"--}}
                                                                {{--                                                                                       name="outgoingNumber"--}}
                                                                {{--                                                                                       placeholder="@lang("outgoingNumber")">--}}
                                                                {{--                                                                                <label class="Input__Label"--}}
                                                                {{--                                                                                       for="outgoingNumber">@lang("outgoingNumber")</label>--}}
                                                                {{--                                                                            </div>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                {{--                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"--}}
                                                                {{--                                                                     data-TargetName="ReplyToOutgoing"--}}
                                                                {{--                                                                     data-TargetValue="false">--}}
                                                                {{--                                                                    <div class="Form__Group">--}}
                                                                {{--                                                                        <div class="Form__Date">--}}
                                                                {{--                                                                            <div class="Date__Area">--}}
                                                                {{--                                                                                <input id="outgoingDate"--}}
                                                                {{--                                                                                       class="Date__Field"--}}
                                                                {{--                                                                                       type="date" name="outgoingDate"--}}
                                                                {{--                                                                                       placeholder="Date Decision">--}}
                                                                {{--                                                                                <label class="Date__Label"--}}
                                                                {{--                                                                                       for="outgoingDate">Outgoing--}}
                                                                {{--                                                                                    Date</label>--}}
                                                                {{--                                                                            </div>--}}
                                                                {{--                                                                        </div>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__UploadFile">
                                                                            <div class="UploadFile__Area">
                                                                                @include("System.Components.fileUpload" , [
                                                                                    "FieldID" => "docId" ,
                                                                                    "FieldName" => "path_file" ,
                                                                                    "LabelField" => __("chooseDocument"),
                                                                                    "AcceptFiles" => "*"
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
                                                            <label for="CorrespondenceSubjectEditor">
                                                                Correspondence Subject
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
                                                                            <textarea id="CorrespondenceSubjectEditor"
                                                                                      class="TextEditor Textarea__Field"
                                                                                      placeholder="Your text as placeholder"
                                                                                      name="subject"
                                                                                      required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="Col-4-md Col-6-sm">
                                                    <div class="Form__Group">
                                                        <div class="Form__Input">
                                                            <div class="Input__Area">
                                                                <input id="summary"
                                                                       class="Input__Field"
                                                                       type="text"
                                                                       name="summary"
                                                                       placeholder="@lang("Summary")">
                                                                <label class="Input__Label"
                                                                       for="FirstName">@lang("Summary")</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="Row">
                                                    <div class="Col">
                                                        <div class="Form__Group">
                                                            <div class="Form__Button">
                                                                <button class="Button Send"
                                                                        type="submit">@lang("addCorrespondence")</button>
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
    </section>
@endsection

@section("extraScripts")
    {{-- JS Trumbowyg --}}
    <script src="{{asset("System/Assets/Lib/trumbowyg/dist/trumbowyg.min.js")}}"></script>
    @if(app()->getLocale()==="ar")
        <script src="{{asset("System/Assets/Lib/trumbowyg/dist/langs/ar.min.js")}}"></script>
    @endif
@endsection
