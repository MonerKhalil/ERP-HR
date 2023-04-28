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
                <div class="AddUserPage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="Card">
                                <div class="Card__Header">
                                    <div class="Card__Title">
                                        <h3>@lang("addUser")</h3>
                                    </div>
                                    <div class="Card__Summery">
                                        <p>@lang("titleAddUserPage")</p>
                                    </div>
                                </div>
                                <div class="Card__Content">
                                    <form class="Form">
                                        <div class="Row Gap-1-5">
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
<<<<<<< Updated upstream
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
=======
                                            <div class="Card__Body">
                                                <form class="Form Form--Dark" action="{{route("users.store")}}" method="post">
                                                    @csrf
                                                    <div class="Row GapC-1-5">
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="name" class="Input__Field" type="text"
                                                                               name="name" placeholder="@lang("userName")" required>
                                                                        <label class="Input__Label" for="name">@lang("userName")</label>
                                                                    </div>
                                                                </div>
{{--                                                                @if(!is_null(Errors("name")))--}}
{{--                                                                    <div class="Form__Error">--}}
{{--                                                                        <div class="Error__Area">--}}
{{--                                                                            <small>{{Errors("name")}}</small>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="email" class="Input__Field"
                                                                               type="email" name="email" placeholder="@lang("email")" required>
                                                                        <label class="Input__Label" for="email">@lang("email")</label>
                                                                    </div>
                                                                </div>
{{--                                                                @if(!is_null(Errors("email")))--}}
{{--                                                                    <div class="Form__Error">--}}
{{--                                                                        <div class="Error__Area">--}}
{{--                                                                            <small>{{Errors("email")}}</small>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input Form__Input--Password">
                                                                    <div class="Input__Area">
                                                                        <input id="password" class="Input__Field"
                                                                               type="password" name="password" placeholder="@lang("password")" required>
                                                                        <label class="Input__Label" for="password">@lang("password")</label>
                                                                        <i class="material-icons Input__Icon">visibility</i>
                                                                    </div>
                                                                </div>
{{--                                                                @if(!is_null(Errors("password")))--}}
{{--                                                                    <div class="Form__Error">--}}
{{--                                                                        <div class="Error__Area">--}}
{{--                                                                            <small>{{Errors("password")}}</small>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input Form__Input--Password">
                                                                    <div class="Input__Area">
                                                                        <input id="re_password" class="Input__Field"
                                                                               type="password" name="re_password" placeholder="@lang("rePassword")" required>
                                                                        <label class="Input__Label" for="re_password">@lang("rePassword")</label>
                                                                        <i class="material-icons Input__Icon">visibility</i>
                                                                    </div>
{{--                                                                    @if(!is_null(Errors("re_password")))--}}
{{--                                                                        <div class="Form__Error">--}}
{{--                                                                            <div class="Error__Area">--}}
{{--                                                                                <small>{{Errors("re_password")}}</small>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    @endif--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col-4-md Col-6-sm">
                                                            <div class="Form__Group">
                                                                <div class="Form__Select">
                                                                    <div class="Select__Area">
{{--                                                                        @include("System.Components.selector" , [--}}
{{--                                                                            'Name' => "role" , "Required" => "true" ,--}}
{{--                                                                            "DefaultValue" => "" , "Label" => __('role') ,--}}
{{--                                                                            "OptionsValues" => $roles,--}}
{{--                                                                        ])--}}
                                                                    </div>
                                                                </div>
{{--                                                                @if(!is_null(Errors("role")))--}}
{{--                                                                    <div class="Form__Error">--}}
{{--                                                                        <div class="Error__Area">--}}
{{--                                                                            <small>{{Errors("role")}}</small>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}
                                                            </div>
>>>>>>> Stashed changes
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Select">
                                                        <div class="Select__Area">
                                                            <div class="Selector"
                                                                 data-name="Gender" data-required="true">
                                                                <div class="Selector__Main">
                                                                    <div class="Selector__WordLabel">@lang("gender")</div>
                                                                    <div class="Selector__WordChoose">@lang("gender")</div>
                                                                    <i class="material-icons Selector__Arrow">
                                                                        keyboard_arrow_down
                                                                    </i>
                                                                </div>
                                                                <ul class="Selector__Options">
                                                                    <li class="Selector__Option">@lang("male")</li>
                                                                    <li class="Selector__Option">@lang("female")</li>
                                                                </ul>
                                                            </div>
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
    </section>
@endsection
