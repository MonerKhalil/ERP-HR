<?php
    $MyAccount = auth()->user() ;
    $IsHavePermissionAttendanceRead = $MyAccount->can("read_attendances") || $MyAccount->can("all_attendances") ;
    $IsHavePermissionAttendanceEdit = $MyAccount->can("update_attendances") || $MyAccount->can("all_attendances") ;
    $IsHavePermissionAttendanceDelete = $MyAccount->can("delete_attendances") || $MyAccount->can("all_attendances") ;
    $IsHavePermissionAttendanceExport = $MyAccount->can("export_attendances") || $MyAccount->can("all_attendances") ;
    $IsHavePermissionAttendanceCreate = $MyAccount->can("create_attendances") || $MyAccount->can("all_attendances") ;
?>

@extends("System.Pages.globalPage")

@section("ContentPage")
    @if($IsHavePermissionAttendanceCreate)
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
                                                @if(isset($attendance["check_in"]))
                                                    <div class="Taps__Item TimeOut"
                                                         data-content="TimeOut">
                                                        Time Out
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="Taps__Panel" data-panel="TimeIn">
                                            <form action="{{ route("system.attendances.store.type" , "check_in") }}" method="post">
                                                @csrf
                                                <div class="AttendanceClock__DateTime">
                                                    <div class="CircleTime ClockTime">
                                                        <div class="Day"></div>
                                                        <div class="Time"></div>
                                                        <div class="Date"></div>
                                                    </div>
                                                </div>
                                                <div class="AttendanceClock__Register">
                                                    @if(isset($attendance["check_in"]))
                                                        <div class="BoxRegister">
                                                            Welcome! {{ $employee["first_name"]." ".$employee["last_name"] }} <br>
                                                            Time In at {{ \Carbon\Carbon::parse($attendance["check_in"])->format('H:i:s A') }} Success!
                                                        </div>
                                                    @else
                                                        <button class="Button Size-2 Button--Primary">
                                                            Check In Record
                                                        </button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                        @if(isset($attendance["check_in"]))
                                            <div class="Taps__Panel" data-panel="TimeOut">
                                                <form action="{{ route("system.attendances.store.type" , "check_out") }}" method="post">
                                                    @csrf
                                                    <div class="AttendanceClock__DateTime">
                                                        <div class="CircleTime ClockTime">
                                                            <div class="Day"></div>
                                                            <div class="Time"></div>
                                                            <div class="Date"></div>
                                                        </div>
                                                    </div>
                                                    <div class="AttendanceClock__Register">
                                                        @if(isset($attendance["check_out"]))
                                                            <div class="BoxRegister">
                                                                Welcome! {{ $employee["first_name"]." ".$employee["last_name"] }} <br>
                                                                Time Out at {{ \Carbon\Carbon::parse($attendance["check_out"])->format('H:i:s A') }} Success!
                                                            </div>
                                                        @else
                                                            <button class="Button Size-2 Button--Primary">
                                                                Check Out Record
                                                            </button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
