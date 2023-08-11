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
                                <div class="AttendanceClock Taps">
                                    <div class="AttendanceClock__TypeTime">
                                        <div class="TypeTime">
                                            <div class="Taps__Item TimeIn Active"
                                                 data-content="TimeIn">
                                                Time In
                                            </div>
                                            <div class="Taps__Item TimeOut"
                                                 data-content="TimeOut">
                                                Time Out
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Taps__Panel" data-panel="TimeIn">
                                        <form action="#" method="post">
                                            <div class="AttendanceClock__DateTime">
                                                <div class="CircleTime ClockTime">
                                                    <div class="Day">Monday</div>
                                                    <div class="Time">10:20:39 PM</div>
                                                    <div class="Date">December 20,2018</div>
                                                </div>
                                            </div>
                                            <div class="AttendanceClock__Register">
                                                @if(true)
                                                    <button class="Button Size-2 Button--Primary">
                                                        Attendance Record
                                                    </button>
                                                @endif
                                                @if(false)
                                                    <div class="BoxRegister">
                                                        Welcome! MR.Amir Alhloo . <br>
                                                        Time In at 10:20:34 PM Success!
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <div class="Taps__Panel" data-panel="TimeOut">
                                        <form action="#" method="post">
                                            <div class="AttendanceClock__DateTime">
                                                <div class="CircleTime ClockTime">
                                                    <div class="Day">sunday</div>
                                                    <div class="Time">10:20:39 PM</div>
                                                    <div class="Date">December 19,2018</div>
                                                </div>
                                            </div>
                                            <div class="AttendanceClock__Register">
                                                @if(true)
                                                    <button class="Button Size-2 Button--Primary">
                                                        Attendance Record
                                                    </button>
                                                @endif
                                                @if(false)
                                                    <div class="BoxRegister">
                                                        Welcome! MR.Amir Alhloo . <br>
                                                        Time In at 10:20:34 PM Success!
                                                    </div>
                                                @endif
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
    </section>
@endsection
