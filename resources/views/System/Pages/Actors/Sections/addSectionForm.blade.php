@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewSectionForm">
        <div class="NewSectionFormPage">
            <div class="NewSectionFormPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => isset($sections) ? "تعديل معلومات قسم" : "تسجيل قسم جديد" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NewSectionFormPage__Content">
                <div class="Row">
                    <div class="NewSectionFormPage__Form">
                        <div class="Container--MainContent">
                            <div class="Row">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark"
                                                      action="{{ isset($sections) ? route("system.sections.update" , $sections["id"])
                                                                : route("system.sections.store") }}"
                                                      method="post">
                                                    @csrf
                                                    @if(isset($sections))
                                                        @method("put")
                                                    @endif
                                                    <div class="ListData" >
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">
                                                                معلومات القسم الاساسية
                                                            </h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__CustomItem">
                                                                <div class="Row GapC-1-5">
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Input">
                                                                                <div class="Input__Area">
                                                                                    <input id="SectionName" class="Input__Field"
                                                                                           type="text" name="name"
                                                                                           value="{{ isset($sections) ? $sections["name"] : "" }}"
                                                                                           placeholder="اسم القسم" required>
                                                                                    <label class="Input__Label" for="SectionName">
                                                                                        اسم القسم
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
                                                                                        $Employees = [] ;
                                                                                        foreach ($employees as $Employee) {
                                                                                            array_push($Employees , [ "Label" => $Employee["first_name"]." ".$Employee["last_name"]
                                                                                                , "Value" => $Employee["id"] ]) ;
                                                                                        }
                                                                                    @endphp
                                                                                    @include("System.Components.selector" , [
                                                                                        'Name' => "moderator_id" , "Required" => "true" ,
                                                                                        "DefaultValue" => isset($sections) ? $sections["moderator_id"] : ""
                                                                                         , "Label" => "مدير هذا القسم" ,
                                                                                        "Options" => $Employees
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-4-md Col-6-sm">
                                                                        <div class="Form__Group">
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
                                                                                        "DefaultValue" => isset($sections) ? $sections["address_id"] : ""
                                                                                         , "Label" => "مكان هذا القسم" ,
                                                                                        "Options" => $Countries
                                                                                    ])
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="Col-12">
                                                                        <div class="Form__Group">
                                                                            <div class="Form__Textarea">
                                                                                <div class="Textarea__Area">
                                                                                    <textarea id="SectionDetails" class="Textarea__Field"
                                                                                        name="details" placeholder="وصف عن هذا القسم"
                                                                                        rows="3"
                                                                                    >{{ isset($sections) ? $sections["details"] : "" }}</textarea>
                                                                                    <label class="Textarea__Label" for="SectionDetails">
                                                                                        وصف عن هذا القسم
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
                                                                            type="submit">اضافة قسم جديد</button>
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
