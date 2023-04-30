<nav class="NavigationsMenu">
    <div class="NavigationsMenu__Wrap">
        <div class="NavigationsMenu__Content">
            <header class="NavigationsMenu__Header">
                <div class="Logo">
                    <a href="#" title="ERP Epic">
                        <img src="{{asset("System/Assets/Images/Logo.png")}}"
                             alt="#" class="Logo__Image">
                        <span class="Logo__SystemName">ERP Epic</span>
                    </a>
                </div>
                <i class="material-icons IconClick NavigationsMenu__CloseMenu">close</i>
            </header>
            <main class="NavigationsMenu__Navigations">
                <ul class="NavigationsMenu__NavigationsGroup">
                    <li class="NavigationsGroup__Title">
                        <span class="Title">@lang("admin")</span>
                    </li>
                    <li class="NavigationsGroup__NavItem">
                        <div class="Title">
                            <a href="{{route("audit.show")}}" class="NavName">
                                <i class="material-icons Icon">
                                    track_changes
                                </i>
                                <span class="Label">@lang("auditTrack")</span>
                            </a>
                        </div>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    grade
                                </i>
                                <span class="Label">@lang("roles")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("roles.index")}}" class="NavName">
                                        <span class="Label">@lang("viewRoles")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("roles.create")}}" class="NavName">
                                        <span class="Label">@lang("addRole")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    group
                                </i>
                                <span class="Label">@lang("users")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("users.index")}}" class="NavName">
                                        <span class="Label">@lang("viewUsers")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("users.create")}}" class="NavName">
                                        <span class="Label">@lang("addUser")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="NavigationsMenu__NavigationsGroup">
                    <li class="NavigationsGroup__Title">
                        <span class="Title">@lang("resumeSection")</span>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    badge
                                </i>
                                <span class="Label">@lang("employees")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="#" class="NavName">
                                        <span class="Label">@lang("viewEmployees")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="#" class="NavName">
                                        <span class="Label">@lang("addEmployee")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    groups_2
                                </i>
                                <span class="Label">@lang("decisionsSession")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="/Test-7" class="NavName">
                                        <span class="Label">@lang("viewSessions")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="/Test-6" class="NavName">
                                        <span class="Label">@lang("addSession")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="NavigationsMenu__NavigationsGroup Visible-phoneLandscape">
                    <li class="NavigationsGroup__Title">
                        <span class="Title">@lang("app")</span>
                    </li>
                    <li class="NavigationsGroup__NavItem">
                        <div class="Title">
                            <a href="#" class="NavName">
                                <i class="material-icons Icon">
                                    notifications
                                </i>
                                <span class="Label">@lang("notification")</span>
                            </a>
                        </div>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">language</i>
                                <span class="Label">@lang("language")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("lang.change","en")}}" class="NavName">
                                        <span class="Label">@lang("english")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("lang.change","ar")}}" class="NavName">
                                        <span class="Label">@lang("arabic")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="NavigationsMenu__NavigationsGroup Visible-phoneLandscape">
                    <li class="NavigationsGroup__Title">
                        <span class="Title">@lang("account")</span>
                    </li>
                    <li class="NavigationsGroup__NavItem">
                        <div class="Title">
                            <a href="{{route("profile.show")}}" class="NavName">
                                <i class="material-icons Icon">
                                    assignment_ind
                                </i>
                                <span class="Label">@lang("profile")</span>
                            </a>
                        </div>
                    </li>
                    <li class="NavigationsGroup__NavItem">
                        <div class="Title">
                            <a href="#" class="AnchorSubmit NavName"
                               data-form="logOutSystem">
                                <i class="material-icons Icon">
                                    logout
                                </i>
                                <span class="Label">@lang("signout")</span>
                            </a>
                            <form action="{{route("logout")}}"
                                  class="logoutForm"
                                  name="logOutSystem" method="post">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </main>
            <footer class="NavigationsMenu__Footer">

            </footer>
        </div>
    </div>
</nav>
