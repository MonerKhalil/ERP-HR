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
                                            <form class="Form Form--Dark" action="{{route("correspondences.update", $correspondence['id'])}}"
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
                                                                                @include("System.Components.selector" , ['Name' => "type" , "Required" => "true" , "Label" => __('correspondenceType'),"DefaultValue" => $correspondence->type,
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
                                                                                       value={{isset($correspondence->number_internal) ? $correspondence->number_internal : ""}}
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
                                                                                       value={{isset($correspondence->date) ? $correspondence->date : ""}}
                                                                                       placeholder="correspondence Date">
                                                                                <label class="Date__Label"
                                                                                       for="correspondenceDate">correspondence
                                                                                    Date</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__UploadFile">
                                                                            <div class="UploadFile__Area">
                                                                                @include("System.Components.fileUpload" , [
                                                                                    "FieldID" => "docId" ,
                                                                                    "FieldName" => "path_file" ,
                                                                                    "DefaultData" => (isset($correspondence->path_file)) ? PathStorage($correspondence->path_file) : ""  ,
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

                                                                                      required>{{isset($correspondence->subject) ? $correspondence->subject : ""}}</textarea>
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
                                                                       value={{isset($correspondence->summary) ? $correspondence->summary : ""}}
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
