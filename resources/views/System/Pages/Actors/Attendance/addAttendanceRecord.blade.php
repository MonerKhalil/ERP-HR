@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddAttendancePage">
        <div class="AddAttendancePage">
            <div class="AddAttendancePage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __('RegisterAttendanceRecord') ,
                    'paths' => [['Attendances' , '#'] , ['New Attendance']] ,
                    'summery' => __('RegisterAttendancePage')
                ])
            </div>
        </div>
        <div class="AddAttendancePagePrim__Content">
            <div class="Row">
                <div class="AddAttendancePage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="AttendancePage__Information">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__Inner">
                                            <div class="Card__Header">
                                                <div class="Card__Title">
                                                    <h3>@lang("AttendanceInfo")</h3>
                                                </div>
                                            </div>
                                            <div class="Card__CenterButton">
                                                <button class="Button" id="checkInButton"
                                                >@lang("checkIn")</button>
                                            </div>
                                            <div class="Card__CenterButton-hidden">
                                                <button class="Button" id="checkOutButton"
                                                >@lang("checkOut")</button>
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
