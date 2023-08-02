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
                                            <form class="Form Form--Dark"
                                                  action="{{route("correspondences_dest.store")}}"
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
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $dest_types = [] ;
                                                                                    foreach ($source_dest_type as $Index => $Item) {
                                                                                        array_push($dest_types , [ "Label" => $Item ,
                                                                                             "Value" => $Item] ) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "source_dest_type" , "Required" => "true" , "Label" => __('place type'),"DefaultValue" => "",
                                                                                            "Options" => $dest_types,])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="typeTemp"
                                                                     data-TargetValue="internal">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $employee_dest_array = [] ;
                                                                                    foreach ($employee_dest as $Index => $Item) {
                                                                                        array_push($employee_dest_array , [ "Label" => $Item -> name ,
                                                                                             "Value" => $Item] ) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "current_employee_id" , "Required" => "true" , "Label" => __('current employee'),"DefaultValue" => "",
                                                                                            "Options" => $employee_dest_array,])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="typeTemp"
                                                                     data-TargetValue="internal">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $employee_dest_array1 = [] ;
                                                                                    foreach ($employee_dest as $Index => $Item) {
                                                                                        array_push($employee_dest_array1 , [ "Label" => $Item -> name ,
                                                                                             "Value" => $Item] ) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "in_employee_id_dest" , "Required" => "true" , "Label" => __('target employee'),"DefaultValue" => "",
                                                                                            "Options" => $employee_dest_array1,])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="VisibilityTarget Col-4-md Col-6-sm"
                                                                     data-TargetName="typeTemp"
                                                                     data-TargetValue="external">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Select">
                                                                            <div class="Select__Area">
                                                                                @php
                                                                                    $out_section_array = [] ;
                                                                                    foreach ($out_section as $Index => $Item) {
                                                                                        array_push($out_section_array , [ "Label" => $Item ,
                                                                                             "Value" => $Item] ) ;
                                                                                    }
                                                                                @endphp
                                                                                @include("System.Components.selector" , ['Name' => "type" , "Required" => "true" , "Label" => __('correspondenceType2'),"DefaultValue" => "",
                                                                                            "Options" => $out_section_array,])
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
                                                                                    "LabelField" => __("chooseDocument"),
                                                                                    "AcceptFiles" => "*"
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Col-4-md Col-6-sm">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Input">
                                                                            <div class="Input__Area">
                                                                                <input id="notice"
                                                                                       class="Input__Field"
                                                                                       type="text"
                                                                                       name="notice"
                                                                                       placeholder="@lang("Summary")">
                                                                                <label class="Input__Label"
                                                                                       for="notice">@lang("Summary")</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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

