@extends("System.master")

@section("CSS_Extra")
    <style>
        .FooterPage .RowFooter{
            display: flex;
            justify-content: space-between;
            align-content: center;
        }
    </style>
@endsection

@section("MainContent")
    {{--  Main Content  --}}
    <main class="MainContent">
        <section class="MainContent__Section MainContent__Section--Print">
            <div class="PrintPage">
                <div class="PrintPage__Content">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="Col">
                                <div class="Card">
                                    <div class="PrintPage__CompanyInfo">
                                        <div class="ImageCompany">
                                            <img src="{{asset("System/Assets/Images/Logo.png")}}"
                                                 alt="Company Image" />
                                        </div>
                                        <div class="DescriptionCompany">
                                            <div class="Text">
                                                <div class="CompanyName">Company : ERP Epic</div>
                                                <div class="Address">Address : Damascus</div>
                                                <div class="Telephone">Tel : 123123123</div>
                                                <div class="Email">Email : Amir@Amir.com</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Col">
                                <div class="Card">
                                    <div class="Card__Inner">
                                            <div class="ListData NotResponsive ListData--CustomPrint">
                                                <div class="ListData__Head">
                                                        <h4 class="ListData__Title">
                                                            Main Information
                                                        </h4>
                                                    </div>
                                                <div class="PrintPage__Data">
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                                <span class="Data_Label">
                                                                    Name 1
                                                                </span>
                                                            <span class="Data_Value">
                                                                        Value 1
                                                                </span>
                                                        </div>
                                                        <div class="Data_Col Data_Col--End">
                                                            <i class="material-icons">
                                                                verified
                                                            </i>
                                                        </div>
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
                                                        <div class="Data_Col Data_Col--End">
                                                            <i class="material-icons">
                                                                verified
                                                            </i>
                                                        </div>
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
                                                        <div class="Data_Col Data_Col--End">
                                                            <i class="material-icons">
                                                                verified
                                                            </i>
                                                        </div>
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
                                                        <div class="Data_Col Data_Col--End">
                                                            <i class="material-icons">
                                                                verified
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Col">
                                <div class="Card">
                                    <div class="Card__Inner">
                                        <div class="ListData NotResponsive ListData--CustomPrint">
                                            <div class="ListData__Head">
                                                <h4 class="ListData__Title">
                                                    Decision Content
                                                </h4>
                                            </div>
                                            <div class="PrintPage__Data">
                                                <div class="PrintPage__TextEditorContent">
                                                    @include("System.Components.textEditorContent" , [
                                                        "Content" => "<p>Lorem</p>"
                                                    ])
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
                    <div class="RowFooter">
                        <div class="FooterPage__CopyRight">
                            Copyright © 2022
                        </div>
                        <div class="FooterPage__Links">
                            Designed by <span class="SystemName"> ERP Epic </span> All rights reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
