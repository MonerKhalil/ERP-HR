@extends("System.Pages.globalPage")


@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => __("viewAudit") ,
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
                                                                <li><i class="OpenPopup material-icons IconClick SearchTools__FilterIcon"
                                                                       data-popUp="SearchAbout">filter_list</i></li>
                                                                <li><span class="SearchTools__Separate"></span></li>
                                                                <li><a href="#">
                                                                        <i class="material-icons IconClick">print</i>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Card__Inner p0">
                                                <div class="Table__ContentTable">
                                                    <table class="Center Table__Table" >
                                                        <tr class="Item HeaderList">
                                                            <th class="Item__Col">@lang("event")</th>
                                                            <th class="Item__Col">@lang("tableEdit")</th>
                                                            <th class="Item__Col">@lang("fromUser")</th>
                                                            <th class="Item__Col">@lang("userId")</th>
                                                            <th class="Item__Col">@lang("editDate")</th>
                                                            <th class="Item__Col">@lang("details")</th>
                                                        </tr>
                                                        @foreach($data as $AuditingData)
                                                            @php
                                                                $RealData = $AuditingData["data"]["data"];
                                                            @endphp
                                                            <tbody class="GroupRows">
                                                                <tr class="GroupRows__MainRow">
                                                                    <td class="Item__Col">{{$RealData["event"]}}</td>
                                                                    <td class="Item__Col">{{$RealData["table_name"]}}</td>
                                                                    <td class="Item__Col">{{$RealData["user_name"]}}</td>
                                                                    <td class="Item__Col">#{{$RealData["user_id"]}}</td>
                                                                    <td class="Item__Col">{{$RealData["date"]}}</td>
                                                                    <td class="Item__Col Item__Col--Details">
                                                                        <span class="Details__Button">@lang("details")</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="GroupRows__SubRows">
                                                                    <td class="Item__Col" colspan="6">
                                                                        <div class="Table__ContentTable">
                                                                            <table class="Left Table__Table">
                                                                                <tr class="Item HeaderList">
                                                                                    @if(count($RealData["new_values"]) > 0)
                                                                                        @foreach($RealData["new_values"] as $Key=>$Value)
                                                                                            <th class="Item__Col">{{ $Key }}</th>
                                                                                        @endforeach
                                                                                    @elseif(count($RealData["old_values"]) > 0)
                                                                                        @foreach($RealData["old_values"] as $Key=>$Value)
                                                                                            <th class="Item__Col">{{ $Key }}</th>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tr>
                                                                                @if(count($RealData["new_values"]) > 0)
                                                                                    <tr class="ReplaceNewBackGround Item DataItem">
                                                                                        @foreach($RealData["new_values"] as $Key=>$Value)
                                                                                            <td class="Item__Col">{{ $Value }}</td>
                                                                                        @endforeach
                                                                                    </tr>
                                                                                @endif
                                                                                @if(count($RealData["old_values"]) > 0)
                                                                                    <tr class="ReplaceOldBackGround Item DataItem">
                                                                                        @foreach($RealData["old_values"] as $Key=>$Value)
                                                                                            <td class="Item__Col">{{ $Value }}</td>
                                                                                        @endforeach
                                                                                    </tr>
                                                                                @endif
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        @endforeach
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
        'InfoForm' => ["Route" => route("audit.show") , "Method" => "get"] ,
        'FilterForm' => [ ['Type' => 'number' , 'Info' =>
                ['Name' => "filter[user_id]" , 'Placeholder' => __("userIdEditing") ] ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "filter[user_name]" , 'Placeholder' => __("userNameEditing")]
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "filter[date]" , 'StartDateName' => "filter[start_date]"
                , 'EndDateName' => "filter[end_date]" , 'Placeholder' => __("createDate") ]
            ] ]
    ])
@endsection
