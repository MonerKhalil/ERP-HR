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
                                    <a href="{{route("system.employees.index")}}" class="NavName">
                                        <span class="Label">@lang("viewEmployees")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.employees.create")}}" class="NavName">
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
                                    description
                                </i>
                                <span class="Label">@lang("contracts")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.employees.contract.index")}}" class="NavName">
                                        <span class="Label">@lang("viewContracts")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.employees.contract.create")}}" class="NavName">
                                        <span class="Label">@lang("addContract")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    menu_book
                                </i>
                                <span class="Label">@lang("courses")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.conferences.index")}}" class="NavName">
                                        <span class="Label">@lang("viewCourses")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.conferences.create")}}" class="NavName">
                                        <span class="Label">@lang("addCourse")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    description
                                </i>
                                <span class="Label">@lang("EmployeesEOF")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.data_end_services.index")}}" class="NavName">
                                        <span class="Label">@lang("viewEOF")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.data_end_services.create")}}" class="NavName">
                                        <span class="Label">@lang("addEOF")</span>
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
                                    <a href="{{route("system.session_decisions.index")}}" class="NavName">
                                        <span class="Label">@lang("viewSessions")</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("system.session_decisions.create")}}" class="NavName">
                                        <span class="Label">@lang("addSession")</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    emoji_food_beverage
                                </i>
                                <span class="Label">الاجازات</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.leaves.all.status" , "pending") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">اجازاتي المعلقة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.leaves.all.status" , "approve") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">اجازاتي المقبولة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.leaves.all.status" , "reject") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">اجازاتي المرفوضة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.leaves.show.leavesType") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">عرض اجازاتي المتاحة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.leaves_admin.index") }}" class="NavName">
                                        <!-- Admin -->
                                        <span class="Label">عرض طلبات الاجازة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <!-- User -->
                                    <a href="{{ route("system.leaves_admin.create") }}" class="NavName">
                                        <span class="Label">ادراج اجازة ادارية</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <!-- User -->
                                    <a href="{{ route("system.leaves.create.request") }}" class="NavName">
                                        <span class="Label">طلب اجازة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <!-- Admin -->
                                    <a href="{{ route("system.leave_types.index") }}" class="NavName">
                                        <span class="Label">انواع الاجازات</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <!-- User -->
                                    <a href="{{ route("system.leave_types.create") }}" class="NavName">
                                        <span class="Label">اضافة نوع جديد</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    more_time
                                </i>
                                <span class="Label">العمل الاضافي</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtime_types.create") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">اضافة نوع جديد</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtime_types.index") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">عرض جميع الانواع</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtimes.create.request") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">اضافة طلب</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtimes_admin.create") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">ادراج عمل اضافي اداري</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtimes_admin.index") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">عرض كافة الطلبات</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtimes.all.status" , "pending") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">عرض طلباتي المعلقة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtimes.all.status" , "approve") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">عرض طلباتي المقبولة</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.overtimes.all.status" , "reject") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">عرض طلباتي المرفوضة</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    edit_note
                                </i>
                                <span class="Label">التقييمات</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="/Test-44" class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            اضافة نوع تقييم جديد
                                        </span>
                                    </a>
                                    <a href="/Test-45" class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            عرض انواع التقييم
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    meeting_room
                                </i>
                                <span class="Label">الاقسام</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.sections.create") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            اضافة قسم جديد
                                        </span>
                                    </a>
                                    <a href="{{ route("system.sections.index") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            عرض جميع الاقسام
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    weekend
                                </i>
                                <span class="Label">العطل الرسمية</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.public_holidays.create") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            اضافة عطلة جديدة
                                        </span>
                                    </a>
                                    <a href="{{ route("system.public_holidays.index") }}" class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            عرض كل العطل
                                        </span>
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
                                <span class="Label">@lang("correspondences")</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("correspondences.index")}}" class="NavName">
                                        <span class="Label">عرض المراسلات</span>
                                    </a>
                                </div>
                            </li>
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{route("correspondences.create")}}" class="NavName">
                                        <span class="Label">إضافة مراسلة</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="NavigationsGroup__NavItem">
                        <div class="Title">
                            <a href="{{route("system.employees.report")}}" class="NavName">
                                <i class="material-icons Icon">
                                    description
                                </i>
                                <span class="Label">
                                    التقارير
                                </span>
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="NavigationsMenu__NavigationsGroup">
                    <li class="NavigationsGroup__Title">
                        <span class="Title">الاعدادات</span>
                    </li>
                    <li class="NavigationsGroup__NavItem">
                        <div class="Title">
                            <a href="{{route("system.company_settings.show")}}" class="NavName">
                                <i class="material-icons Icon">
                                    widgets
                                </i>
                                <span class="Label">
                                    اعدادات الشركة
                                </span>
                            </a>
                        </div>
                    </li>
                    <li class="NavigationsGroup__GroupItem">
                        <div class="Title">
                            <div class="NavName">
                                <i class="material-icons Icon">
                                    room_preferences
                                </i>
                                <span class="Label">اعدادات الدوام</span>
                            </div>
                            <span class="material-icons ArrowRight">
                                play_arrow
                            </span>
                        </div>
                        <ul class="NavigationsGroup__SubItems">
                            <li class="NavigationsGroup__NavItem">
                                <div class="Title">
                                    <a href="{{ route("system.work_settings.create") }}"
                                       class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            اضافة نوع دوام جديد
                                        </span>
                                    </a>
                                    <a href="{{ route("system.work_settings.index") }}"
                                       class="NavName">
                                        <!-- User -->
                                        <span class="Label">
                                            عرض انواع الدوام
                                        </span>
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
