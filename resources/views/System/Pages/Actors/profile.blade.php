@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--Profile">
        <div class="ProfilePage">
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
                        <div class="Col-3-md">
                            <div class="Card">
                                <div class="Card__Inner">
                                    <div class="ProfilePage__Image">
                                        <form class="ChangeImage" action="#" method="post">
                                            <input type="file" id="ImageChange"
                                                   accept="image/jpeg" hidden>
                                            <label for="ImageChange" style="display: block">
                                                <div class="UserImage">
                                                    <img src="{{@asset("System/Assets/Images/Avatar.jpg")}}"
                                                         alt="ImageUser">
                                                    <div class="UserImage__Edit">
                                                        <i class="material-icons EditIcon">edit</i>
                                                    </div>
                                                    <i class="material-icons LockOpenIcon">lock_open</i>
                                                </div>
                                            </label>
                                        </form>
                                        <div class="Text">
                                            <div class="UserName">
                                                <span>Amir HO</span>
                                            </div>
                                            <div class="Specialization">
                                                <span>Front End Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Card">
                                <div class="Card__Inner">
                                    <div class="ProfilePage__Connection">
                                        <div class="Card__Header">
                                            <div class="Card__Title">
                                                <h3>@lang("connectedBy")</h3>
                                            </div>
                                            <i class="material-icons OpenPopup IconClick EditIcon"
                                               data-popUp="UpdateSocialMedia">
                                                edit
                                            </i>
                                        </div>
                                        <div class="Card__Content">
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
                        <div class="Col-9-md">
                            <div class="ProfilePage__Information">
                                <div class="Card Card--Taps Taps">
                                    <ul class="Taps__List">
                                        <li class="Taps__Item Taps__Item--Icon"
                                            data-content="UserInfo">
                                            <i class="material-icons">face</i>
                                            User
                                        </li>
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
                                        <li class="Taps__Item Taps__Item--Icon"
                                            data-content="SecurityInfo">
                                            <i class="material-icons">security</i>
                                            Security
                                        </li>
                                    </ul>
                                    <div class="Taps__Content">
                                        <div class="Taps__Panel" data-panel="UserInfo">
                                            <div class="Card__Inner">
                                                <div class="Card__Header">
                                                    <h3 class="Card__Title">User Information</h3>
                                                </div>
                                                <div class="Card__Content">
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">@lang('basics')</h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        User Name
                                                                    </span>
                                                                                <span class="Data_Value">
                                                                        Amir7866
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="OpenPopup ListData__Item ListData__Item--Action"
                                                                 data-popUp="UpdateUser">
                                                                <div class="Data_Col">
                                                            <span class="Data_Label">
                                                            @lang('email')
                                                        </span>
                                                                    <span class="Data_Value">
                                                            example@example.com
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock_open
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">@lang("additionalInformation")</h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Create Date
                                                                    </span>
                                                                                <span class="Data_Value">
                                                                        8-16-2020 9:04PM
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Taps__Panel" data-panel="EmployeeInfo">
                                            <div class="Card__Inner">
                                                <div class="Card__Header">
                                                    <h3 class="Card__Title">Employee Information</h3>
                                                </div>
                                                <div class="Card__Content">
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">@lang('basics')</h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="OpenPopup ListData__Item ListData__Item--Action"
                                                                 data-popUp="UpdateEmployee">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            @lang("fullName")
                                                        </span>
                                                                    <span class="Data_Value">
                                                            Amir HO
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock_open
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Dossier Number
                                                                    </span>
                                                                                <span class="Data_Value">
                                                                        1946484
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Gender
                                                                    </span>
                                                                    <span class="Data_Value">
                                                                        Male
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            @lang('phone')
                                                        </span>
                                                                    <span class="Data_Value">
                                                            +125 254 3562
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="OpenPopup ListData__Item ListData__Item--Action"
                                                                 data-popUp="UpdateData">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            @lang("dateBirthday")
                                                        </span>
                                                                    <span class="Data_Value">
                                                            4 March , 2000
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock_open
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">@lang("additionalInformation")</h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            @lang("joinDate")
                                                        </span>
                                                                    <span class="Data_Value">
                                                            8-16-2020 9:04PM
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            Family Situation
                                                        </span>
                                                                    <span class="Data_Value">
                                                            Celibate
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            @lang("country")
                                                        </span>
                                                                    <span class="Data_Value">
                                                            Syria
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                        <span class="Data_Label">
                                                            @lang("nationality")
                                                        </span>
                                                                    <span class="Data_Value">
                                                            Syria
                                                        </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Taps__Panel" data-panel="WorkInfo">
                                            <div class="Card__Inner">
                                                <div class="Card__Header">
                                                    <h3 class="Card__Title">Work Information</h3>
                                                </div>
                                                <div class="Card__Content">
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">@lang('basics')</h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="OpenPopup ListData__Item ListData__Item--Action"
                                                                 data-popUp="UpdateWork">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Department
                                                                    </span>
                                                                    <span class="Data_Value">
                                                                        Computer Science
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock_open
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Job Position
                                                                    </span>
                                                                    <span class="Data_Value">
                                                                        IT
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Beginning Contract
                                                                    </span>
                                                                    <span class="Data_Value">
                                                                        4/4/2023
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Contract Duration
                                                                    </span>
                                                                    <span class="Data_Value">
                                                                        2 Year
                                                                    </span>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ListData">
                                                        <div class="ListData__Head">
                                                            <h4 class="ListData__Title">@lang("additionalInformation")</h4>
                                                        </div>
                                                        <div class="ListData__Content">
                                                            <div class="ListData__Item ListData__Item--NoAction">
                                                                <div class="Data_Col">
                                                                    <span class="Data_Label">
                                                                        Skills
                                                                    </span>
                                                                    <div class="Data_Value Skills">
                                                                        <ul class="Skills__List">
                                                                            <li class="Skill">HTML</li>
                                                                            <li class="Skill">CSS</li>
                                                                            <li class="Skill">JS</li>
                                                                            <li class="Skill">Angular</li>
                                                                            <li class="Skill">Jquery</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="Data_Col Data_Col--End">
                                                                    <i class="material-icons">
                                                                        lock
                                                                    </i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Taps__Panel ProfilePage__PasswordChange"
                                             data-panel="SecurityInfo">
                                            <div class="Card__Inner">
                                                <div class="Card__Header">
                                                    <h3 class="Card__Title">Security Information</h3>
                                                </div>
                                                <div class="Card__Content">
                                                    <div class="Card Card--Border">
                                                        <div class="Card__Inner--Group">
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
            </div>
        </div>
    </section>
    <div class="Popup Popup--Dark" data-name="UpdateUser">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <div class="Popup__Head">
                    <h3 class="Popup__Title">@lang("updateProfile")</h3>
                    <i class="material-icons Popup__Close">close</i>
                </div>
                <div class="Popup__Body">
                    <form class="Form Form--Dark">
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
                                                   type="email" name="Email" placeholder="@lang("email")">
                                            <label class="Input__Label" for="Email">@lang("email")</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Col-6-md">
                                <div class="Form__Group">
                                    <div class="Form__Date">
                                        <div class="Date__Area">
                                            <input id="CreateDate" class="Date__Field"
                                                   type="text" name="CreateDate"
                                                   placeholder="Create Date">
                                            <label class="Date__Label" for="CreateDate">Create Date</label>
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
    <div class="Popup Popup--Dark" data-name="UpdateEmployee">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <div class="Popup__Head">
                    <h3 class="Popup__Title">@lang("updateProfile")</h3>
                    <i class="material-icons Popup__Close">close</i>
                </div>
                <div class="Popup__Body">
                    <form class="Form Form--Dark">
                        <div class="Row GapC-1-5">
                            <div class="Col-6-md">
                                <div class="Form__Group">
                                    <div class="Form__Input">
                                        <div class="Input__Area">
                                            <input id="FullName" class="Input__Field" type="text"
                                                   name="FullName" placeholder="Full Name">
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
                                            <div class="Selector"
                                                 data-name="FamilySituation" data-required="true">
                                                <div class="Selector__Main">
                                                    <div class="Selector__WordLabel">Family Situation</div>
                                                    <div class="Selector__WordChoose">Family Situation</div>
                                                    <i class="material-icons Selector__Arrow">
                                                        keyboard_arrow_down
                                                    </i>
                                                </div>
                                                <ul class="Selector__Options">
                                                    <li class="Selector__Option">Celibate</li>
                                                    <li class="Selector__Option">married</li>
                                                </ul>
                                            </div>
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
    <div class="Popup Popup--Dark" data-name="UpdateWork">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <div class="Popup__Head">
                    <h3 class="Popup__Title">@lang("updateProfile")</h3>
                    <i class="material-icons Popup__Close">close</i>
                </div>
                <div class="Popup__Body">
                    <form class="Form Form--Dark">
                        <div class="Row GapC-1-5">
                            <div class="Col-6-md">
                                <div class="Form__Group">
                                    <div class="Form__Select">
                                        <div class="Select__Area">
                                            <div class="Selector"
                                                 data-name="Gender" data-required="true">
                                                <div class="Selector__Main">
                                                    <div class="Selector__WordLabel">Department</div>
                                                    <div class="Selector__WordChoose">Department</div>
                                                    <i class="material-icons Selector__Arrow">
                                                        keyboard_arrow_down
                                                    </i>
                                                </div>
                                                <ul class="Selector__Options">
                                                    <li class="Selector__Option">Computer Science</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Col-6-md">
                                <div class="Form__Group">
                                    <div class="Form__Select">
                                        <div class="Select__Area">
                                            <div class="Selector"
                                                 data-name="Gender" data-required="true">
                                                <div class="Selector__Main">
                                                    <div class="Selector__WordLabel">Job Position</div>
                                                    <div class="Selector__WordChoose">Job Position</div>
                                                    <i class="material-icons Selector__Arrow">
                                                        keyboard_arrow_down
                                                    </i>
                                                </div>
                                                <ul class="Selector__Options">
                                                    <li class="Selector__Option">IT</li>
                                                </ul>
                                            </div>
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
                                            <div class="Selector"
                                                 data-name="Gender" data-required="true">
                                                <div class="Selector__Main">
                                                    <div class="Selector__WordLabel">Contract Duration</div>
                                                    <div class="Selector__WordChoose">Contract Duration</div>
                                                    <i class="material-icons Selector__Arrow">
                                                        keyboard_arrow_down
                                                    </i>
                                                </div>
                                                <ul class="Selector__Options">
                                                    <li class="Selector__Option">3 Month</li>
                                                    <li class="Selector__Option">6 Month</li>
                                                    <li class="Selector__Option">1 Year</li>
                                                    <li class="Selector__Option">2 Year</li>
                                                    <li class="Selector__Option">3 Year</li>
                                                    <li class="Selector__Option">4 Year</li>
                                                    <li class="Selector__Option">5 Year</li>
                                                </ul>
                                            </div>
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
    <div class="Popup Popup--Dark" data-name="UpdatePassword">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <div class="Popup__Head">
                    <h3 class="Popup__Title">@lang("updateProfile")</h3>
                    <i class="material-icons Popup__Close">close</i>
                </div>
                <div class="Popup__Body">
                    <form class="Form Form--Dark">
                        <div class="Row GapC-1-5">
                            <div class="Col-6-md">
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
                            <div class="Col-6-md">
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
    <div class="Popup Popup--Dark" data-name="UpdateSocialMedia">
        <div class="Popup__Content">
            <div class="Popup__Card">
                <div class="Popup__Head">
                    <h3 class="Popup__Title">@lang("updateProfile")</h3>
                    <i class="material-icons Popup__Close">close</i>
                </div>
                <div class="Popup__Body">
                    <form class="Form Form--Dark">
                        <div class="Row GapC-1-5">
                            <div class="Col-6-md">
                                <div class="Form__Group">
                                    <div class="Form__Select">
                                        <div class="Select__Area">
                                            <div class="Selector"
                                                 data-name="SocialMedia_1" data-selected="FaceBook"
                                                 data-required="true">
                                                <div class="Selector__Main">
                                                    <div class="Selector__WordLabel">Social Media</div>
                                                    <div class="Selector__WordChoose">Social Media</div>
                                                    <i class="material-icons Selector__Arrow">
                                                        keyboard_arrow_down
                                                    </i>
                                                </div>
                                                <ul class="Selector__Options">
                                                    <li class="Selector__Option">Facebook</li>
                                                    <li class="Selector__Option">Whatsapp</li>
                                                    <li class="Selector__Option">Linkedin</li>
                                                    <li class="Selector__Option">Google +</li>
                                                </ul>
                                            </div>
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
                                            <div class="Selector"
                                                 data-name="SocialMedia_2" data-required="true">
                                                <div class="Selector__Main">
                                                    <div class="Selector__WordLabel">Social Media</div>
                                                    <div class="Selector__WordChoose">Social Media</div>
                                                    <i class="material-icons Selector__Arrow">
                                                        keyboard_arrow_down
                                                    </i>
                                                </div>
                                                <ul class="Selector__Options">
                                                    <li class="Selector__Option">Facebook</li>
                                                    <li class="Selector__Option">Whatsapp</li>
                                                    <li class="Selector__Option">Linkedin</li>
                                                    <li class="Selector__Option">Google +</li>
                                                </ul>
                                            </div>
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
@endsection