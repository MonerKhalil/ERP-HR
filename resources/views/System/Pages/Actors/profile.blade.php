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
                            <div class="Card">
                                <div class="Card__Header">
                                    <div class="Card__Title">
                                        <h3>@lang("connectedBy")</h3>
                                    </div>
                                </div>
                                <div class="Card__Content">
                                    <div class="ProfilePage__Connection">
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
                            <div class="Card">
                                <div class="Card__Header">
                                    <div class="Card__Title">
                                        <h3>@lang("skills")</h3>
                                    </div>
                                </div>
                                <div class="Card__Content">
                                    <div class="ProfilePage__Skills">
                                        <ul class="Skills__List">
                                            <li class="Skill">HTML</li>
                                            <li class="Skill">CSS</li>
                                            <li class="Skill">JS</li>
                                            <li class="Skill">Angular</li>
                                            <li class="Skill">Jquery</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Col-9-md">
                            <div class="ProfilePage__Information">
                                <div class="Card">
                                    <div class="Card__Header">
                                        <h3 class="Card__Title">@lang("personalInformation")</h3>
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
                                                            @lang("fullName")
                                                        </span>
                                                        <span class="Data_Value">
                                                            Amir HO
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="Popup Popup--Dark" data-name="UpdateData">
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
                                            <input id="DateBirth" class="Date__Field"
                                                   type="text" name="DateBirth"
                                                   placeholder="@lang("dateBirthday")">
                                            <label class="Date__Label" for="DateBirth">@lang("dateBirthday")</label>
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
