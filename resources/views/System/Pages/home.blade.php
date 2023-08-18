@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--RequestOvertimeForm">
        <div class="RequestOvertimeForm">
            <div class="RequestOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "الصفحة الرئيسية" ,
                    'paths' => [] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="RequestOvertimeForm__Content">
                <div class="ViewUsers__Content">
                    <div class="Row">
                        <div class="RequestOvertimeForm__Form">
                            <div class="Container--MainContent">
                                <div class="MessageProcessContainer">
                                    @include("System.Components.messageProcess")
                                </div>
                                <div class="Row GapC-1">
                                    <div class="Col-4-md">
                                        <div class="stat-card">
                                            <div class="stat-card__content">
                                                <p class="text-uppercase mb-1 text-muted">Users</p>
                                                <h2>21,254</h2>
{{--                                                <div>--}}
{{--                                                    <span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span>--}}
{{--                                                    <span class="text-muted">vs last 28 days</span>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="stat-card__icon stat-card__icon--3">
                                                <div class="stat-card__icon-circle">
                                                    <i class="material-icons">person</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Col-4-md">
                                        <div class="stat-card">
                                            <div class="stat-card__content">
                                                <p class="text-uppercase mb-1 text-muted">Users</p>
                                                <h2>21,254</h2>
                                                {{--                                                <div>--}}
                                                {{--                                                    <span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span>--}}
                                                {{--                                                    <span class="text-muted">vs last 28 days</span>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                            <div class="stat-card__icon stat-card__icon--1">
                                                <div class="stat-card__icon-circle">
                                                    <i class="material-icons">person</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Col-4-md">
                                        <div class="stat-card">
                                            <div class="stat-card__content">
                                                <p class="text-uppercase mb-1 text-muted">Users</p>
                                                <h2>21,254</h2>
                                                {{--                                                <div>--}}
                                                {{--                                                    <span class="text-danger font-weight-bold mr-1"><i class="fa fa-arrow-down"></i> -5%</span>--}}
                                                {{--                                                    <span class="text-muted">vs last 28 days</span>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                            <div class="stat-card__icon stat-card__icon--2">
                                                <div class="stat-card__icon-circle">
                                                    <i class="material-icons">person</i>
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
