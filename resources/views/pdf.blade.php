<!doctype html>
@if(app()->getLocale()==="en")
<html lang="en" dir="ltr">
@else
<html lang="ar" dir="rtl">
@endif
<head>
    {{-- Meta System --}}
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Welcome Welcome Welcome !!!">
    <meta name="keywords" content="Demo">
    <meta name="author" content="Amir">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- Title Page System --}}
    <title>HR System</title>
    {{-- Logo System --}}
    <link rel="icon" href="{{asset('System/Assets/Images/Logo.png')}}">
    {{-- Icons System --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    {{-- Normalize System --}}
    <link rel="stylesheet" href='{{asset('System/Assets/CSS/Normalize.css')}}' type="text/css" />
    {{-- Libraries System --}}
    <link rel="stylesheet" href='{{asset('System/Assets/Lib/Libraries.css')}}' type="text/css" />
    {{-- Main CSS System --}}
    <link rel="stylesheet" href='{{asset('System/Assets/CSS/Style.css')}}' type="text/css" />
    {{-- CSS Extra--}}
    <style>
        .FooterPage .RowFooter{
            display: flex;
            justify-content: space-between;
            align-content: center;
        }
    </style>
</head>

<body>
<div id="Wrapper">
    {{--  Main Content  --}}
    <main class="MainContent">
        <section class="MainContent__Section MainContent__Section--Print">
            <div class="PrintPage">
                <div class="ViewUsers__Content">
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
                                <div class="Card ViewUsers__TableUsers">
                                    <div class="Table">
                                        <div class="Card__Inner p0">
                                            <div class="Table__ContentTable">
                                                <div class="Table__Table">
                                                    <div class="Item HeaderList">
                                                        @foreach($data["head"] as $Head)
                                                            <div class="Item__Col">
                                                                <span>{{$Head}}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @foreach($data["body"] as $Row)
                                                        <div class="Item DataItem">
                                                            @foreach($Row as $DataColumn)
                                                                <div class="Item__Col">{{$DataColumn}}</div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
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
</div>
{{-- Scripts --}}
<script src="{{asset("System/Assets/Lib/Libraries.js")}}"></script>
{{-- Main JS --}}
<script src="{{asset("System/Assets/JS/Main.js")}}"></script>
<script>
    window.onload = function () {
        javascript:window.print();
    };
</script>
</body>
</html>
