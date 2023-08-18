@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--DetailsSectionPage">
        <div class="DetailsSectionPage">
            <div class="DetailsSectionPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewSectionDetails") ,
                    'paths' => [[__("home") , '#'] , [__("viewSectionDetails")]] ,
                    'summery' => __("titleViewSectionDetails")
                ])
            </div>
            <div class="DetailsSectionPage__Content">
                <div class="Container--MainContent">
                    <div class="MessageProcessContainer">
                        @include("System.Components.messageProcess")
                    </div>
                    <div class="Row">
                        <div class="Col">
                            <div class="Card">
                                <div class="Card__Inner">
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("basicSectionInfo")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("sectionName")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $sections["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("sectionName")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $sections->moderator["first_name"]." ".$sections->moderator["last_name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("locationSection")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $sections->address["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("descriptionSection")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $sections["details"] ?? "_" }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        @lang("createSectionDate")
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $sections["created_at"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("operationSection")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a  href="{{route("system.sections.edit" , $sections["id"])}}"
                                                    class="Button Button--Primary">
                                                    @lang("editSection")
                                                </a>
                                                <form class="Form"
                                                      style="display: inline-block" method="post"
                                                      action="{{route("system.sections.destroy" , $sections["id"])}}">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="Button Button--Danger">
                                                        @lang("removeOneSection")
                                                    </button>
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
