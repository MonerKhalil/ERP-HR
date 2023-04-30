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
                                                <table class="Table__Table">
                                                    <thead>
                                                        <tr class="Item HeaderList">
                                                            @foreach($data["head"] as $Head)
                                                                <th class="Item__Col">
                                                                    <span>{{$Head}}</span>
                                                                </th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data["body"] as $Row)
                                                            <tr class="Item DataItem">
                                                                @foreach($Row as $DataColumn)
                                                                    <td class="Item__Col">{{$DataColumn}}</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
