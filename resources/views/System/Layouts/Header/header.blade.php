<header class="HeaderPage">
    <div class="HeaderPage__Wrap">
        <div class="Container--Header">
            <div class="HeaderPage__Content">
                <div class="HeaderPage__MenusOpening">
                    <div class="MenusOpening">
                        <div class="MenuIcon">
                            <i class="material-icons IconClick">menu</i>
                        </div>
                        <div class="Logo">
                            <a href="#" title="ERP Epic">
                                <img src="{{asset("System/Assets/Images/Logo.png")}}"
                                     alt="#" class="Logo__Image">
                                <span class="Logo__SystemName">ERP Epic</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="HeaderPage__AccountAlerts">
                    <div class="AccountAlerts">
                        <ul class="Alerts">
                            <li class="Alert Alert--Notification">
                                <i class="material-icons IconClick">
                                    notifications
                                </i>
                                <div class="Dropdown">
                                    <div class="Dropdown__Header">
                                        <h3 class="Title">@lang("notification")</h3>
                                        <span class="ReadAll">@lang("markRead")</span>
                                    </div>
                                    <ul class="Dropdown__Content">
                                        <li class="Dropdown__Item">
                                            <div class="NotificationIcon NotificationIcon--Send">
                                                <i class="material-icons">description</i>
                                            </div>
                                            <div class="NotificationDetails">
                                                <p class="NotificationSummery">
                                                    Please check your mail
                                                </p>
                                                <p class="NotificationDate">2hr ago</p>
                                            </div>
                                            <div class="NotificationRemove">
                                                <i class="material-icons">close</i>
                                            </div>
                                        </li>
                                        <li class="Dropdown__Item">
                                            <div class="NotificationIcon NotificationIcon--Receive">
                                                <i class="material-icons">description</i>
                                            </div>
                                            <div class="NotificationDetails">
                                                <p class="NotificationSummery">
                                                    Please check your mail
                                                </p>
                                                <p class="NotificationDate">2hr ago</p>
                                            </div>
                                            <div class="NotificationRemove">
                                                <i class="material-icons">close</i>
                                            </div>
                                        </li>
                                        <li class="Dropdown__Item">
                                            <div class="NotificationIcon NotificationIcon--Receive">
                                                <i class="material-icons">description</i>
                                            </div>
                                            <div class="NotificationDetails">
                                                <p class="NotificationSummery">
                                                    Please check your mail
                                                </p>
                                                <p class="NotificationDate">2hr ago</p>
                                            </div>
                                            <div class="NotificationRemove">
                                                <i class="material-icons">close</i>
                                            </div>
                                        </li>
                                        <li class="Dropdown__Item">
                                            <div class="NotificationIcon NotificationIcon--Receive">
                                                <i class="material-icons">description</i>
                                            </div>
                                            <div class="NotificationDetails">
                                                <p class="NotificationSummery">
                                                    Please check your mail
                                                </p>
                                                <p class="NotificationDate">2hr ago</p>
                                            </div>
                                            <div class="NotificationRemove">
                                                <i class="material-icons">close</i>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="Dropdown__Footer">
                                        <a href="#" title="View All Notification">@lang("viewNotification")</a>
                                    </div>
                                </div>
                            </li>
                            <li class="Alert Alert--Language">
                                <i class="material-icons IconClick">language</i>
                                <div class="Dropdown">
                                    <ul class="Dropdown__Content">
                                        <li class="Dropdown__Item">
                                            <a href="{{route("lang.change","en")}}">@lang("english")</a>
                                        </li>
                                        <li class="Dropdown__Item">
                                            <a href="{{route("lang.change","ar")}}">@lang("arabic")</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="UserImage">
                            <img src="{{asset("System/Assets/Images/Avatar.jpg")}}" alt="#">
                            <div class="Dropdown">
                                <div class="Dropdown__Header">
                                    <div class="UserImage">
                                        <img src="{{asset("System/Assets/Images/Avatar.jpg")}}" alt="#">
                                    </div>
                                    <div class="UserDetails">
                                        <div class="UserName">Amir HO</div>
                                        <div class="UserEmail">example@example.com</div>
                                    </div>
                                </div>
                                <ul class="Dropdown__Content">
                                    <li class="Dropdown__Item">
                                        <a href="{{route("profile.show")}}">
                                            <i class="material-icons">
                                                person
                                            </i>
                                            <span>@lang("viewProfile")</span>
                                        </a>
                                    </li>
                                    <li class="Dropdown__Item">
                                        <a href="javascript:document.logOutSystem.submit()">
                                            <i class="material-icons">
                                                logout
                                            </i>
                                            <span>@lang("signout")</span>
                                        </a>
                                        <form action="{{route("logout")}}"
                                              name="logOutSystem" method="post">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
