@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SettingCompany">
        <div class="SettingCompanyPage">
            <div class="SettingCompanyPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "اعدادات الشركة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="SettingCompanyPage__Content">
                <div class="ViewSetting__Content">
                    <div class="Row">
                        <div class="SettingCompanyPage__Form">
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
                                                          action="{{ route("system.company_settings.edit") }}"
                                                          enctype="multipart/form-data"
                                                          method="post">
                                                        @csrf
                                                        @method("put")
                                                        <div class="ListData">
                                                            <div class="ListData__Content">
                                                                <div class="ListData__Head">
                                                                    <h4 class="ListData__Title">
                                                                        @lang("basics")
                                                                    </h4>
                                                                </div>
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Input">
                                                                                    <div class="Input__Area">
                                                                                        <input id="CompanyName" class="Input__Field"
                                                                                               type="text" name="name"
                                                                                               value="{{ $setting["name"] }}"
                                                                                               placeholder="اسم الشركة" required>
                                                                                        <label class="Input__Label" for="CompanyName">
                                                                                            اسم الشركة
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="CreateCompany" class="Date__Field"
                                                                                               name="created_at_company" required
                                                                                               value="{{ $setting["created_at_company"] }}"
                                                                                               type="text" placeholder="تاريخ تأسيس الشركة" >
                                                                                        <label class="Date__Label" for="CreateCompany">
                                                                                            تاريخ تأسيس الشركة
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
                                                                                type="submit">تغيير اعدادات الشركة</button>
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
