@extends("System.master")

@section("MainContent")

    {{--  Main Header  --}}
    <header class="HeaderPage HeaderPage--Print">
        <div class="HeaderPage__Wrap">
            <div class="Container--Header">
                <div class="HeaderPage__Content">
                    <div class="HeaderPage__MenusOpening">
                        <div class="MenusOpening">
                            <div class="Logo">
                                <a href="#" title="ERP Epic">
                                    <img src="{{asset("System/Assets/Images/Logo.png")}}"
                                         alt="#" class="Logo__Image">
                                    <span class="Logo__SystemName">ERP Epic</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{--  Main Content  --}}
    <main class="MainContent">
        <section class="MainContent__Section MainContent__Section--Print">
            <div class="PrintPage">
                <div class="ViewUsers__Breadcrumb">
                    @include('System.Components.breadcrumb' , [
                        'mainTitle' => __("printInformation") ,
                        'summery' => __("titlePrintInformation")
                    ])
                </div>
                <div class="PrintPage__Content">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="Col">
                                <div class="Card">
                                    <div class="Card__Inner">
                                        <div class="ListData">
                                            <div class="ListData__Head">
                                                <h4 class="ListData__Title">
                                                    Main Information
                                                </h4>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        Name 1
                                                    </span>
                                                    <span class="Data_Value">
                                                        Value 1
                                                    </span>
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
    </main>
    {{--  Footer  --}}
    <footer class="FooterPage FooterPage--Print">
        <div class="FooterPage__Wrap">
            <div class="Container--MainContent">
                <div class="FooterPage__Content">
                    <div class="Row m0">
                        <div class="Col-6-xs">
                            <div class="FooterPage__CopyRight">
                                Copyright © 2022
                            </div>
                        </div>
                        <div class="Col-6-xs">
                            <div class="FooterPage__Links">
                                Designed by <span class="SystemName"> ERP Epic </span> All rights reserved
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

@endsection
