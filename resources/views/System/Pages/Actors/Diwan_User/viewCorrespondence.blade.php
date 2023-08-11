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
                                                            @lang("MainInformation")
                                                        </h4>
                                                    </div>
                                                    <div class="ListData__Content">
                                                        <div class="ListData__CustomItem">
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("type")</span>
                                                                            <span
                                                                                class="Data_Value">{{$correspondence->type}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("createDate")</span>
                                                                            <span
                                                                                class="Data_Value">{{$correspondence->date}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($correspondence->number_internal != '')
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("numberInternal")</span>
                                                                            <span
                                                                                class="Data_Value">{{$correspondence->number_internal}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if($correspondence->number_external != '')
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("number_external")</span>
                                                                            <span
                                                                                class="Data_Value">{{$correspondence->number_external}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="ListData__Content">
                                                                        <div class="Data_Col">
                                                                            <span
                                                                                class="Data_Label">@lang("path_file")</span>
                                                                            <a href="{{PathStorage($correspondence->path_file)}}" target="_blank">
                                                                                عرض الملف</a>
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
                                                                @lang("CorrespondenceSubject")
                                                            </label>
                                                        </h4>
                                                    </div>
                                                    <div class="ListData__Content">
                                                        <div class="ListData__CustomItem">
                                                            <div class="Row">
                                                                <div class="Col">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Textarea">
                                                                            <span
                                                                                class="Data_Value">{!! $correspondence->subject !!}</span>
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
                                                                @lang("summary")
                                                            </label>
                                                        </h4>
                                                    </div>
                                                    <div class="ListData__Content">
                                                        <div class="ListData__CustomItem">
                                                            <div class="Row">
                                                                <div class="Col">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Textarea">
                                                                            <span
                                                                                class="Data_Value">{{$correspondence->summary}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <div class="Col-12">--}}
{{--                                                    <div class="ListData__Content">--}}
{{--                                                        <div class="Data_Col">--}}
{{--                                                                            <span--}}
{{--                                                                                class="Data_Label">@lang("summary")</span>--}}
{{--                                                            <span--}}
{{--                                                                class="Data_Value">{{$correspondence->summary}}</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="ListData">--}}
{{--                                                    <div class="ListData__Head">--}}
{{--                                                        <h4 class="ListData__Title">--}}
{{--                                                            <label for="CorrespondenceSubjectEditor">--}}
{{--                                                                @lang("CorrespondenceSubject")--}}
{{--                                                            </label>--}}
{{--                                                        </h4>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="ListData__Content">--}}
{{--                                                        <div class="ListData__CustomItem">--}}
{{--                                                            <div class="Row">--}}
{{--                                                                <div class="Data_Col">--}}
{{--                                                                            <span--}}
{{--                                                                                class="Data_Label">@lang("path_file")</span>--}}
{{--                                                                    <a href="{{PathStorage($correspondence->path_file)}}" target="_blank">--}}
{{--                                                                        عرض الملف</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
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
