@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewSession") ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewUsers__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewUsers__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF" action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx" action="#"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="Card__InnerGroup">
                                            <div class="Card__Inner">
                                                <div class="Table__Head">
                                                    <div class="Justify-Content-End Card__ToolsGroup">
                                                        <div class="Card__Tools Card__SearchTools">
                                                            <ul class="SearchTools">
                                                                <li>
                                                                    <i class="OpenPopup material-icons IconClick SearchTools__FilterIcon"
                                                                       data-popUp="SearchAbout">filter_list
                                                                    </i>
                                                                </li>
                                                                <li>
                                                                    <span class="SearchTools__Separate"></span>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons IconClick">print</i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Card__Inner p0">
                                                <div class="Table__ContentTable">
                                                    <table class="Left Table__Table" >
                                                        <tr class="Item HeaderList">
                                                            <th class="Item__Col">#</th>
                                                            <th class="Item__Col">@lang("sessionName")</th>
                                                            <th class="Item__Col">@lang("sessionTitle")</th>
                                                            <th class="Item__Col">@lang("sessionDate")</th>
                                                            <th class="Item__Col">@lang("sessionDecisions")</th>
                                                            <th class="Item__Col">@lang("sessionDetails")</th>
                                                        </tr>
                                                            <tbody class="GroupRows">
                                                                <tr class="GroupRows__MainRow">
                                                                    <td class="Item__Col">1</td>
                                                                    <td class="Item__Col">Session One</td>
                                                                    <td class="Item__Col">About Habd</td>
                                                                    <td class="Item__Col">12-2-2022</td>
                                                                    <td class="Item__Col Item__Col--Details">
                                                                        <span class="Details__Button">@lang("decisions")</span>
                                                                    </td>
                                                                    <td class="Item__Col Link">
                                                                        <a href="#">@lang("details")</a>
                                                                    </td>
                                                                </tr>
                                                                <tr class="GroupRows__SubRows">
                                                                    <td class="Item__Col" colspan="6">
                                                                        <div class="Table__ContentTable">
                                                                            <table class="Left Table__Table">
                                                                                <thead>
                                                                                    <tr class="Item HeaderList">
                                                                                        <th class="Item__Col">#</th>
                                                                                        <th class="Item__Col">@lang("decisionType")</th>
                                                                                        <th class="Item__Col">@lang("decisionNumber")</th>
                                                                                        <th class="Item__Col">@lang("dateDecision")</th>
                                                                                        <th class="Item__Col">@lang("dateDecisionEnd")</th>
                                                                                        <th class="Item__Col">@lang("download")</th>
                                                                                        <th class="Item__Col">@lang("details")</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="Item DataItem">
                                                                                        <td class="Item__Col">1</td>
                                                                                        <td class="Item__Col">Type 1</td>
                                                                                        <td class="Item__Col">33</td>
                                                                                        <td class="Item__Col">12-2-2022</td>
                                                                                        <td class="Item__Col">-</td>
                                                                                        <td class="Item__Col Link">
                                                                                            <a href="#">Download</a>
                                                                                        </td>
                                                                                        <td class="Item__Col Link">
                                                                                            <a href="#">Details</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="Card__Inner">
{{--                                                <div class="Card__Pagination">--}}
{{--                                                    @include("System.Components.paginationNum" , [--}}
{{--                                                        "PaginationData" => $users ,--}}
{{--                                                        "PartsViewNum" => 5--}}
{{--                                                    ])--}}
{{--                                                    @include("System.Components.paginationSelect" , [--}}
{{--                                                        "PaginationData" => $users--}}
{{--                                                    ])--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("PopupPage")
    @include("System.Components.searchForm" , [
        'InfoForm' => ["Route" => "" , "Method" => "get"] ,
        'FilterForm' => [ ['Type' => 'number' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Session ID'] ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "" , 'Placeholder' => 'Session Title']
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Session Date' , "StartDateName" => ""
                , "EndDateName" => ""]
            ] , ['Type' => 'number' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Decision ID']
            ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "" , 'Placeholder' => 'Decision Title']
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Decision Date' , "StartDateName" => ""
                , "EndDateName" => ""]
            ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "" , 'Placeholder' => 'Session Date End' , "StartDateName" => ""
                , "EndDateName" => ""] ]
            ]
    ])
@endsection
