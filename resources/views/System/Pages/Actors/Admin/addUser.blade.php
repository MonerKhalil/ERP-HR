@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddUserPage">
        <div class="AddUserPage">
            <div class="AddUserPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('addUser') ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => __('titleAddUserPage')
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
                                            <div class="Card__Header">
                                                <div class="Card__Title">
                                                    <h3>@lang("addUser")</h3>
                                                </div>
                                                <div class="Card__Summery">
                                                    <p>@lang("titleAddUserPage")</p>
                                                </div>
                                            </div>
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark">
                                                    <div class="Row GapC-1-5">
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="FirstName" class="Input__Field" type="text"
                                                                               name="FirstName" placeholder="@lang("firstName")">
                                                                        <label class="Input__Label" for="FirstName">@lang("firstName")</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="LastName" class="Input__Field" type="text"
                                                                               name="LastName" placeholder="@lang("lastName")">
                                                                        <label class="Input__Label" for="LastName">@lang("lastName")</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="UserName" class="Input__Field" type="text"
                                                                               name="UserName" placeholder="@lang("userName")">
                                                                        <label class="Input__Label" for="UserName">@lang("userName")</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="Email" class="Input__Field"
                                                                               type="email" name="Email" placeholder="@lang("email")">
                                                                        <label class="Input__Label" for="Email">@lang("email")</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input Form__Input--Password">
                                                                    <div class="Input__Area">
                                                                        <input id="Password" class="Input__Field"
                                                                               type="password" name="Password" placeholder="@lang("password")">
                                                                        <label class="Input__Label" for="Password">@lang("password")</label>
                                                                        <i class="material-icons Input__Icon">visibility</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input Form__Input--Password">
                                                                    <div class="Input__Area">
                                                                        <input id="Re-Password" class="Input__Field"
                                                                               type="password" name="Re-Password" placeholder="@lang("rePassword")">
                                                                        <label class="Input__Label" for="Re-Password">@lang("rePassword")</label>
                                                                        <i class="material-icons Input__Icon">visibility</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Select">
                                                                    <div class="Select__Area">
                                                                        @include("System.Components.selector" , [
                                                                            'Name' => "Gender" , "Required" => "true" ,
                                                                            "DefaultValue" => "" , "Label" => __('gender') ,
                                                                            "Options" => [ ["Label" => __('male') , "Value" => "male"] ,
                                                                                           ["Label" => __('female') , "Value" => "female"]]
                                                                        ])
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-12-xs">
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
