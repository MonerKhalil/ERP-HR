
<?php
    $IsVisitor = (auth()->user()->id != $user->id) ;
    $IsHavePermissionEditUser = isset($user) && ($user->can("update_users") || $user->can("all_users")) ;
    $IsHavePermissionEditEmployee = isset($user->employee) && ($user->can("update_employees") || $user->can("all_employees")) ;
    $IsHavePermissionReadUser = isset($user) && ($user->can("read_users") || $user->can("all_users")) ;
    $IsHavePermissionReadEmployee = isset($user->employee) && ($user->can("read_employees") || $user->can("all_employees")) ;
    $IsHavePermissionDelete = isset($user) && ($user->can("delete_users") || $user->can("all_users")) ;
?>


@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--Profile">
        <div class="ProfilePage ProfilePage--{{$IsVisitor ? "Visitor" : "My"}}">
            <div class="ProfilePage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('profile') ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => __('titleProfilePage')
                ])
            </div>
            <div class="ProfilePage__Content">
                <div class="Container--MainContent">
                    <div class="Row GapC-1">
                        @if($IsHavePermissionReadUser)
                            <div class="Col-3-md">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="ProfilePage__Image">
                                                @if($IsHavePermissionEditUser)
                                                    <form class="ChangeImage"
                                                          action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                                          method="post">
                                                        <input type="file" id="ImageChange"
                                                               name="image" accept="image/jpeg" hidden>
                                                        <label for="ImageChange" style="display: block">
                                                            <div class="UserImage">
                                                                <img src="{{$user->image ?? @asset("System/Assets/Images/Avatar.jpg")}}"
                                                                     alt="ImageUser">
                                                                <div class="UserImage__Edit">
                                                                    <i class="material-icons EditIcon">edit</i>
                                                                </div>
                                                                <i class="material-icons LockOpenIcon">lock_open</i>
                                                            </div>
                                                        </label>
                                                    </form>
                                                @else
                                                    <div class="UserImage">
                                                        <img src="{{$user->image ?? @asset("System/Assets/Images/Avatar.jpg")}}"
                                                             alt="ImageUser">
                                                    </div>
                                                @endif
                                                <div class="Text">
                                                    <div class="UserName">
                                                        <span>{{$user->name}}</span>
                                                    </div>
                                                    <div class="Specialization">
                                                        <span>Front End Developer</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="ProfilePage__Connection">
                                                <div class="Card__Header">
                                                    <div class="Card__Title">
                                                        <h3>@lang("connectedBy")</h3>
                                                    </div>
                                                    @if($IsHavePermissionEditUser)
                                                        <i class="material-icons OpenPopup IconClick EditIcon"
                                                           data-popUp="UpdateSocialMedia">
                                                            edit
                                                        </i>
                                                    @endif
                                                </div>
                                                <div class="Card__Body">
                                                    <ul class="SocialMedia">
                                                        <li class="SocialMedia__Item">
                                                            <a href="#">
                                                                <img src="{{@asset("System/Assets/Images/SVG/Social Media/icons8-facebook.svg")}}"
                                                                     class="SocialMedia__Icon" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="SocialMedia__Item">
                                                            <a href="#">
                                                                <img src="{{@asset("System/Assets/Images/SVG/Social Media/icons8-linkedin.svg")}}"
                                                                     class="SocialMedia__Icon" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="SocialMedia__Item">
                                                            <a href="#">
                                                                <img src="{{@asset("System/Assets/Images/SVG/Social Media/icons8-google-plus.svg")}}"
                                                                     class="SocialMedia__Icon" alt="">
                                                            </a>
                                                        </li>
                                                        <li class="SocialMedia__Item">
                                                            <a href="#">
                                                                <img src="{{@asset("System/Assets/Images/SVG/Social Media/icons8-whatsapp.svg")}}"
                                                                     class="SocialMedia__Icon" alt="">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="Col-9-md">
                            <div class="ProfilePage__Information">
                                <div class="Card Card--Taps Taps">
                                    <ul class="Taps__List">
                                        @if($IsHavePermissionReadUser)
                                            <li class="Taps__Item Taps__Item--Icon"
                                            data-content="UserInfo">
                                            <i class="material-icons">face</i>
                                            User
                                        </li>
                                        @endif
                                        @if($IsHavePermissionReadEmployee)
                                            <li class="Taps__Item Taps__Item--Icon"
                                                    data-content="EmployeeInfo">
                                                    <i class="material-icons">badge</i>
                                                    Employee
                                                </li>
                                            <li class="Taps__Item Taps__Item--Icon"
                                                    data-content="WorkInfo">
                                                    <i class="material-icons">work</i>
                                                    Work
                                                </li>
                                        @endif
                                        @if($IsHavePermissionEditUser || $IsHavePermissionDelete)
                                            <li class="Taps__Item Taps__Item--Icon"
                                                    data-content="SecurityInfo">
                                                    <i class="material-icons">security</i>
                                                    Security
                                                </li>
                                        @endif
                                    </ul>
                                    <div class="Taps__Content">
                                        @if($IsHavePermissionReadUser)
                                            <div class="Card Taps__Panel" data-panel="UserInfo">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Body">
                                                            @include("System.Components.dataList" , [
                                                                "Title" => __("basics") , "ListData" => [
                                                                    [
                                                                        "Label" => "User Name" , "Value" => $user->name ,
                                                                        "IsLock" => !$IsHavePermissionEditUser , "PopupName" => "UpdateUser"
                                                                    ] , [
                                                                        "Label" => __("email") , "Value" => $user->email ,
                                                                        "IsLock" => !$IsHavePermissionEditUser , "PopupName" => "UpdateUser"
                                                                    ]
                                                                ]
                                                            ])
                                                            @include("System.Components.dataList" , [
                                                                "Title" => __("additionalInformation") , "ListData" => [
                                                                    [
                                                                        "Label" => "Create Date" , "Value" => "$user->created_at" ,
                                                                        "IsLock" => true
                                                                    ]
                                                                ]
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($IsHavePermissionReadEmployee)
                                            <div class="Card Taps__Panel" data-panel="EmployeeInfo">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Body">
                                                            @include("System.Components.dataList" , [
                                                            "Title" => __("basics") , "ListData" => [
                                                                [
                                                                    "Label" => __("fullName") , "Value" => $user->firstname + $user->lastname ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                                ] , [
                                                                    "Label" => "Dossier Number" , "Value" => $user->employee->dossierNumber ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                                ] , [
                                                                    "Label" => "Gender" , "Value" => $user->employee->gender ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                                ] , [
                                                                    "Label" => __("phone") , "Value" => "+125 254 3562" ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                                ] , [
                                                                    "Label" => __("dateBirthday") , "Value" => $user->employee->birth_date ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                                ]
                                                            ]
                                                        ])
                                                            @include("System.Components.dataList" , [
                                                           "Title" => __("additionalInformation") , "ListData" => [
                                                               [
                                                                   "Label" => __("joinDate") , "Value" => $user->employee->created_by ,
                                                                   "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                               ] , [
                                                                   "Label" => "Family Situation" , "Value" => "Celibate" ,
                                                                   "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                               ] , [
                                                                   "Label" => __("country") , "Value" => $user->employee->created_by ,
                                                                   "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                               ] , [
                                                                   "Label" => __("nationality") , "Value" => $user->employee->nationality ,
                                                                   "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateEmployee"
                                                               ]
                                                           ]
                                                       ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Card Taps__Panel" data-panel="WorkInfo">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card__Body">
                                                            @include("System.Components.dataList" , [
                                                            "Title" => __("basics") , "ListData" => [
                                                                [
                                                                    "Label" => "Department" , "Value" => "IT" ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateWork"
                                                                ] , [
                                                                    "Label" => "Job Position" , "Value" => "Computer Science" ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateWork"
                                                                ] , [
                                                                    "Label" => "Beginning Contract" , "Value" => "4/4/2023" ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateWork"
                                                                ] , [
                                                                    "Label" => "Contract Duration" , "Value" => "2 Year" ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateWork"
                                                                ]
                                                            ]
                                                        ])
                                                            @include("System.Components.dataList" , [
                                                            "Title" => __("additionalInformation") , "ListData" => [
                                                                [
                                                                    "Label" => "Skills" , "IsDataSkills" => true ,
                                                                    "Skills" => ["HTML" , "CSS" , "JS" , "Angular" , "Jquery"] ,
                                                                    "IsLock" => !$IsHavePermissionEditEmployee , "PopupName" => "UpdateWork"
                                                                ]
                                                            ]
                                                        ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($IsHavePermissionEditUser || $IsHavePermissionDelete)
                                            <div class="Card Taps__Panel ProfilePage__PasswordChange"
                                                 data-panel="SecurityInfo">
                                                <div class="Card__Content">
                                                    <div class="Card__Inner">
                                                        <div class="Card Card--Border">
                                                            <div class="Card__Body">
                                                                <div class="Card__InnerGroup">
                                                                    @if($IsHavePermissionEditUser)
                                                                        <div class="Card__Inner">
                                                                            <div class="PasswordChange">
                                                                                <div class="PasswordChange__Label">
                                                                                    <h4 class="PasswordChange__Title">
                                                                                        Change Password
                                                                                    </h4>
                                                                                    <p class="PasswordChange__Text">
                                                                                        Set a unique password to protect your account.
                                                                                    </p>
                                                                                    <em class="PasswordChange__LastChange">
                                                                                        Last changed:
                                                                                        <span class="Date">Oct 2, 2019</span>
                                                                                    </em>
                                                                                </div>
                                                                                <div class="PasswordChange__Button">
                                                                                    <button class="OpenPopup Button Button--Primary"
                                                                                            data-popUp="UpdatePassword">
                                                                                        Change Password
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if($IsHavePermissionDelete)
                                                                        <div class="Card__Inner">
                                                                            <div class="DeleteAccount">
                                                                                <div class="DeleteAccount__Label">
                                                                                    <h4 class="DeleteAccount__Title">
                                                                                        Delete Account
                                                                                    </h4>
                                                                                    <p class="DeleteAccount__Text">
                                                                                        If you want delete account please click delete button .
                                                                                    </p>
                                                                                </div>
                                                                                <div class="DeleteAccount__Button">
                                                                                    <button class="OpenPopup Button Button--Danger"
                                                                                            data-popUp="DeleteAccount">
                                                                                        Delete
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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

@section("PopupPage")
    @if($IsHavePermissionReadUser && $IsHavePermissionEditUser)
        <div class="Popup Popup--Dark" data-name="UpdateUser">
            <div class="Popup__Content">
                <div class="Popup__Card">
                    <i class="material-icons Popup__Close">close</i>
                    <div class="Popup__CardContent">
                        <div class="Popup__Inner">
                            <h3 class="Popup__Title">
                                <span class="Title">@lang("updateProfile")</span>
                            </h3>
                            <div class="Popup__Body">
                                <form class="Form Form--Dark"
                                      action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                      method="post">
                                    @csrf
                                    <div class="Row GapC-1-5">
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="UserName" class="Input__Field"
                                                               type="text" name="UserName" placeholder="User Name">
                                                        <label class="Input__Label" for="UserName">User Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="Email" class="Input__Field"
                                                               type="email" name="email" placeholder="@lang("email")">
                                                        <label class="Input__Label" for="Email">@lang("email")</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col">
                                            <div class="Form__Group">
                                                <div class="Form__Button">
                                                    <button class="Button Send"
                                                            type="submit">@lang("updateData")</button>
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
        <div class="Popup Popup--Dark" data-name="UpdatePassword">
            <div class="Popup__Content">
                <div class="Popup__Card">
                    <i class="material-icons Popup__Close">close</i>
                    <div class="Popup__CardContent">
                        <div class="Popup__Inner">
                            <h3 class="Popup__Title">
                                <span class="Title">@lang("updateProfile")</span>
                            </h3>
                            <div class="Popup__Body">
                                <form class="Form Form--Dark"
                                      action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                      method="post">
                                    @csrf
                                    <div class="Row GapC-1-5">
                                        @if($IsVisitor)
                                            <div class="Col-6-md">
                                                <div class="Form__Group">
                                                    <div class="Form__Input Form__Input--Password">
                                                        <div class="Input__Area">
                                                            <input id="Password" class="Input__Field"
                                                                   type="password" name="password" placeholder="@lang("password")">
                                                            <label class="Input__Label" for="Password">@lang("password")</label>
                                                            <i class="material-icons Input__Icon">visibility</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="Col-6-md">
                                                <div class="Form__Group">
                                                    <div class="Form__Input Form__Input--Password">
                                                        <div class="Input__Area">
                                                            <input id="OldPassword" class="Input__Field"
                                                                   type="password" name="old_password" placeholder="@lang("oldPassword")">
                                                            <label class="Input__Label" for="OldPassword">@lang("oldPassword")</label>
                                                            <i class="material-icons Input__Icon">visibility</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-6-md">
                                                <div class="Form__Group">
                                                    <div class="Form__Input Form__Input--Password">
                                                        <div class="Input__Area">
                                                            <input id="NewPassword" class="Input__Field"
                                                                   type="password" name="new_password" placeholder="@lang("newPassword")">
                                                            <label class="Input__Label" for="NewPassword">@lang("newPassword")</label>
                                                            <i class="material-icons Input__Icon">visibility</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input Form__Input--Password">
                                                    <div class="Input__Area">
                                                        <input id="Re-Password" class="Input__Field"
                                                               type="password" name="re_password" placeholder="@lang("rePassword")">
                                                        <label class="Input__Label" for="Re-Password">@lang("rePassword")</label>
                                                        <i class="material-icons Input__Icon">visibility</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col">
                                            <div class="Form__Group">
                                                <div class="Form__Button">
                                                    <button class="Button Send"
                                                            type="submit">@lang("updateData")</button>
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
    @endif
    @if($IsHavePermissionReadEmployee && $IsHavePermissionEditEmployee)
        <div class="Popup Popup--Dark" data-name="UpdateEmployee">
            <div class="Popup__Content">
                <div class="Popup__Card">
                    <i class="material-icons Popup__Close">close</i>
                    <div class="Popup__CardContent">
                        <div class="Popup__Inner">
                            <h3 class="Popup__Title">
                                <span class="Title">@lang("updateProfile")</span>
                            </h3>
                            <div class="Popup__Body">
                                <form class="Form Form--Dark"
                                      action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                      method="post">
                                    @csrf
                                    <div class="Row GapC-1-5">
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="FullName" class="Input__Field" type="text"
                                                               name="name" placeholder="Full Name">
                                                        <label class="Input__Label" for="FullName">Full Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="DossierNumber" class="Input__Field" type="number"
                                                               name="DossierNumber" placeholder="Dossier Number">
                                                        <label class="Input__Label" for="DossierNumber">Dossier Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
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
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="PhoneNumber" class="Input__Field" type="number"
                                                               name="PhoneNumber" placeholder="Phone Number">
                                                        <label class="Input__Label" for="PhoneNumber">Phone Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Date">
                                                    <div class="Date__Area">
                                                        <input id="DateBirthday" class="Date__Field"
                                                               type="text" name="DateBirthday"
                                                               placeholder="Date Birthday">
                                                        <label class="Date__Label" for="DateBirthday">Date Birthday</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Date">
                                                    <div class="Date__Area">
                                                        <input id="JoinDate" class="Date__Field"
                                                               type="text" name="Join Date"
                                                               placeholder="Join Date">
                                                        <label class="Date__Label" for="JoinDate">Join Date</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Select">
                                                    <div class="Select__Area">
                                                        @include("System.Components.selector" , [
                                                            'Name' => "FamilySituation" , "Required" => "true" ,
                                                            "DefaultValue" => "" , "Label" => "Family Situation" ,
                                                            "Options" => [ ["Label" => "Celibate" , "Value" => "1"] ,
                                                                           ["Label" => "married" , "Value" => "2"]]
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="Country" class="Input__Field" type="text"
                                                               name="Country" placeholder="Country">
                                                        <label class="Input__Label" for="Country">Country</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="Nationality" class="Input__Field" type="text"
                                                               name="Nationality" placeholder="Nationality">
                                                        <label class="Input__Label" for="Nationality">Nationality</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col">
                                            <div class="Form__Group">
                                                <div class="Form__Button">
                                                    <button class="Button Send"
                                                            type="submit">@lang("updateData")</button>
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
        <div class="Popup Popup--Dark" data-name="UpdateWork">
            <div class="Popup__Content">
                <div class="Popup__Card">
                    <i class="material-icons Popup__Close">close</i>
                    <div class="Popup__CardContent">
                        <div class="Popup__Inner">
                            <h3 class="Popup__Title">
                                <span class="Title">@lang("updateProfile")</span>
                            </h3>
                            <div class="Popup__Body">
                                <form class="Form Form--Dark"
                                      action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                      method="post"
                                >
                                    @csrf
                                    <div class="Row GapC-1-5">
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Select">
                                                    <div class="Select__Area">
                                                        @include("System.Components.selector" , [
                                                            'Name' => "Department" , "Required" => "true" ,
                                                            "DefaultValue" => "" , "Label" => "Department" ,
                                                            "Options" => [ ["Label" => "Computer Science" , "Value" => "1"]]
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Select">
                                                    <div class="Select__Area">
                                                        @include("System.Components.selector" , [
                                                            'Name' => "JobPosition" , "Required" => "true" ,
                                                            "DefaultValue" => "" , "Label" => "Job Position" ,
                                                            "Options" => [ ["Label" => "IT" , "Value" => "1"]]
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Date">
                                                    <div class="Date__Area">
                                                        <input id="BeginningContract" class="Date__Field"
                                                               type="text" name="BeginningContract"
                                                               placeholder="Beginning Contract">
                                                        <label class="Date__Label" for="BeginningContract">Beginning Contract</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Select">
                                                    <div class="Select__Area">
                                                        @include("System.Components.selector" , [
                                                            'Name' => "ContractDuration" , "Required" => "true" ,
                                                            "DefaultValue" => "" , "Label" => "Contract Duration" ,
                                                            "Options" => [ ["Label" => "3 Month" , "Value" => "1"] ,
                                                                           ["Label" => "6 Month" , "Value" => "1"] ,
                                                                           ["Label" => "1 Year" , "Value" => "1"] ,
                                                                           ["Label" => "2 Year" , "Value" => "1"] ,
                                                                           ["Label" => "3 Year" , "Value" => "1"] ,
                                                                           ["Label" => "4 Year" , "Value" => "1"] ,
                                                                           ["Label" => "5 Year" , "Value" => "1"] ]
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col">
                                            <div class="Form__Group">
                                                <div class="Form__Button">
                                                    <button class="Button Send"
                                                            type="submit">@lang("updateData")</button>
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
    @endif
    @if($IsHavePermissionDelete)
        <div class="Popup Popup--Dark" data-name="DeleteAccount">
            <div class="Popup__Content">
                <div class="Popup__Card">
                    <i class="material-icons Popup__Close">close</i>
                    <div class="Popup__CardContent">
                        <div class="Popup__Inner">
                            <h3 class="Popup__Title">
                                <span class="Title">@lang("updateProfile")</span>
                            </h3>
                            <div class="Popup__Body">
                                <form class="Form Form--Dark"
                                      action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                      method="post">
                                    @csrf
                                    <div class="Row">
                                        <div class="Col">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur
                                                commodi consectetur deleniti ipsum labore magni odit quaerat quam
                                                repudiandae. Accusantium animi dolore id in nihil porro quae repellat
                                                vel!</p>
                                        </div>
                                        <div class="Col">
                                            <div class="Form__Group">
                                                <div class="Form__Button Center">
                                                    <button class="Button Cancel"
                                                            type="submit">حذف الحساب</button>
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
    @endif
    @if($IsHavePermissionReadUser && $IsHavePermissionEditUser)
        <div class="Popup Popup--Dark" data-name="UpdateSocialMedia">
            <div class="Popup__Content">
                <div class="Popup__Card">
                    <i class="material-icons Popup__Close">close</i>
                    <div class="Popup__CardContent">
                        <div class="Popup__Inner">
                            <h3 class="Popup__Title">
                                <span class="Title">@lang("updateProfile")</span>
                            </h3>
                            <div class="Popup__Body">
                                <form class="Form Form--Dark"
                                      action="{{$IsVisitor ? route("users.update",$user->id) : route("profile.update")}}"
                                      method="post">
                                    @csrf
                                    <div class="Row GapC-1-5">
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Select">
                                                    <div class="Select__Area">
                                                        @include("System.Components.selector" , [
                                                            'Name' => "SocialMedia_1" , "Required" => "true" ,
                                                            "DefaultValue" => "FaceBook" , "Label" => "Social Media" ,
                                                            "Options" => [ ["Label" => "Facebook" , "Value" => "1"] ,
                                                                           ["Label" => "Whatsapp" , "Value" => "1"] ,
                                                                           ["Label" => "Linkedin" , "Value" => "1"] ,
                                                                           ["Label" => "Google +" , "Value" => "1"] ]
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Input">
                                                    <div class="Input__Area">
                                                        <input id="SocialName_1" class="Input__Field"
                                                               type="text" name="SocialName_1"
                                                               placeholder="Social Name">
                                                        <label class="Input__Label" for="SocialName_1">Social Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col-6-md">
                                            <div class="Form__Group">
                                                <div class="Form__Select">
                                                    <div class="Select__Area">
                                                        @include("System.Components.selector" , [
                                                            'Name' => "SocialMedia_2" , "Required" => "true" ,
                                                            "DefaultValue" => "" , "Label" => "Social Media" ,
                                                            "Options" => [ ["Label" => "Facebook" , "Value" => "1"] ,
                                                                           ["Label" => "Whatsapp" , "Value" => "1"] ,
                                                                           ["Label" => "Linkedin" , "Value" => "1"] ,
                                                                           ["Label" => "Google +" , "Value" => "1"] ,
                                                                           ["Label" => "Facebook" , "Value" => "1"]]
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Col">
                                            <div class="Form__Group">
                                                <div class="Form__Button">
                                                    <button class="Button Send"
                                                            type="submit">@lang("updateData")</button>
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
    @endif
@endsection
