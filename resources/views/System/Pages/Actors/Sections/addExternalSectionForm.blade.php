<?php
    $MyAccount = auth()->user() ;
    $IsHavePermissionSessionExRead = $MyAccount->can("read_section_externals") || $MyAccount->can("all_section_externals") ;
    $IsHavePermissionSessionExEdit = $MyAccount->can("update_section_externals") || $MyAccount->can("all_section_externals") ;
    $IsHavePermissionSessionExDelete = $MyAccount->can("delete_section_externals") || $MyAccount->can("all_section_externals") ;
    $IsHavePermissionSessionExExport = $MyAccount->can("export_section_externals") || $MyAccount->can("all_section_externals") ;
    $IsHavePermissionSessionExCreate = $MyAccount->can("create_section_externals") || $MyAccount->can("all_section_externals") ;
?>

@extends("System.Pages.globalPage")

@section("ContentPage")
    @if((isset($sectionExternal) && $IsHavePermissionSessionExEdit) ||
        (!isset($sectionExternal) && $IsHavePermissionSessionExCreate))
        <section class="MainContent__Section MainContent__Section--NewSectionForm">
            <div class="NewSectionFormPage">
                <div class="NewSectionFormPage__Breadcrumb">
                    @include('System.Components.breadcrumb' , [
                        'mainTitle' => "اضافة قسم خاجي جديد" ,
                        'paths' => [[__("home") , '#'] , ['Page']] ,
                        'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                    ])
                </div>
                <div class="NewSectionFormPage__Content">
                    <div class="Row">
                        <div class="NewSectionFormPage__Form">
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
                                                          action="{{ isset($sectionExternal) ? route("system.section_externals.update" , $sectionExternal["id"])
                                                                : route("system.section_externals.store") }}"
                                                          method="post">
                                                        @csrf
                                                        @if(isset($sectionExternal))
                                                            @method("put")
                                                        @endif
                                                        <div class="ListData" >
                                                            <div class="ListData__Head">
                                                                <h4 class="ListData__Title">
                                                                    @lang("basicSectionInfo")
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group"
                                                                                 data-ErrorBackend="{{ Errors("name") }}">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="SectionName" class="Input__Field"
                                                                                               type="text" name="name"
                                                                                               value="{{ isset($sectionExternal) ? $sectionExternal["name"] : "" }}"
                                                                                               placeholder="@lang("sectionName")" required>
                                                                                        <label class="Input__Label" for="SectionName">
                                                                                            @lang("sectionName")
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group"
                                                                                 data-ErrorBackend="{{ Errors("address_id") }}">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $Countries = [] ;
                                                                                            foreach ($countries as $Index=>$Country) {
                                                                                                array_push($Countries , [ "Label" => $Country
                                                                                                    , "Value" => $Index ]) ;
                                                                                            }
                                                                                        @endphp
                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "address_id" , "Required" => "true" ,
                                                                                            "DefaultValue" => isset($sectionExternal) ? $sectionExternal["address_id"] : ""
                                                                                             , "Label" => __("locationSection") ,
                                                                                            "Options" => $Countries
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group"
                                                                                 data-ErrorBackend="{{ Errors("email") }}">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="SectionEmail" class="Input__Field"
                                                                                               type="email" name="email"
                                                                                               value="{{ isset($sectionExternal) ? $sectionExternal["email"] : "" }}"
                                                                                               placeholder="البريد الالكتروني">
                                                                                        <label class="Input__Label" for="SectionEmail">
                                                                                            البريد الالكتروني
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group"
                                                                                 data-ErrorBackend="{{ Errors("fax") }}">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="SectionFax" class="Input__Field"
                                                                                               value="{{ isset($sectionExternal) ? $sectionExternal["fax"] : "" }}"
                                                                                               type="number" name="fax"
                                                                                               placeholder="الفاكس">
                                                                                        <label class="Input__Label" for="SectionFax">
                                                                                            الفاكس
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group"
                                                                                 data-ErrorBackend="{{ Errors("phone") }}">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="SectionPhone" class="Input__Field"
                                                                                               type="number" name="phone"
                                                                                               value="{{ isset($sectionExternal) ? $sectionExternal["phone"] : "" }}"
                                                                                               placeholder="رقم الهاتف">
                                                                                        <label class="Input__Label" for="SectionPhone">
                                                                                            رقم الهاتف
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group"
                                                                                 data-ErrorBackend="{{ Errors("phone") }}">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="SectionAddressDetails" class="Input__Field"
                                                                                               type="number" name="address_details"
                                                                                               placeholder="عنوان السكن">
                                                                                        <label class="Input__Label" for="SectionAddressDetails">
                                                                                            عنوان السكن
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
                                                                            @lang("addNewSection")
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
    @endif
@endsection