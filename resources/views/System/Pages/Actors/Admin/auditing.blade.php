@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewUsers">
            <div class="ViewUsers__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "View Auditing" ,
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
                                                    <table class="Left Table__Table" >
                                                        <tr class="Item HeaderList">
                                                            <th class="Item__Col">Event</th>
                                                            <th class="Item__Col">On Table</th>
                                                            <th class="Item__Col">From User</th>
                                                            <th class="Item__Col">User Id</th>
                                                            <th class="Item__Col">Edit Date</th>
                                                            <th class="Item__Col">Details</th>
                                                        </tr>
                                                        @foreach($data as $AuditingData)
                                                            @php
                                                                $RealData = $AuditingData["data"]["data"] ;
                                                            @endphp
                                                            <tbody class="GroupRows">
                                                                <tr class="GroupRows__MainRow">
                                                                    <td class="Item__Col">{{$RealData["event"]}}</td>
                                                                    <td class="Item__Col">{{$RealData["table_name"]}}</td>
                                                                    <td class="Item__Col">{{$RealData["user_name"]}}</td>
                                                                    <td class="Item__Col">#{{$RealData["user_id"]}}</td>
                                                                    <td class="Item__Col">{{$RealData["date"]}}</td>
                                                                    <td class="Item__Col Item__Col--Details">
                                                                        <span class="Details__Button">Details</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="GroupRows__SubRows">
                                                                    <td class="Item__Col" colspan="6">
                                                                        <div class="Table__ContentTable">
                                                                            <table class="Left Table__Table">
                                                                                <tr class="Item HeaderList">
                                                                                    <th class="Item__Col">Type Value</th>
                                                                                    <th class="Item__Col">ID</th>
                                                                                    <th class="Item__Col">Name</th>
                                                                                    <th class="Item__Col">Email</th>
                                                                                </tr>
                                                                                @if(count($RealData["new_values"]) > 0)
                                                                                    <tr class="ReplaceNewBackGround Item DataItem">
                                                                                        <td class="Item__Col">New Value</td>
                                                                                        <td class="Item__Col">#{{$RealData["new_values"]["id"]}}</td>
                                                                                        <td class="Item__Col">{{$RealData["new_values"]["name"]}}</td>
                                                                                        <td class="Item__Col">{{$RealData["new_values"]["email"]}}</td>
                                                                                    </tr>
                                                                                @endif
                                                                                @if(count($RealData["old_values"]) > 0)
                                                                                    <tr class="ReplaceOldBackGround Item DataItem">
                                                                                        <td class="Item__Col">Old Value</td>
                                                                                        <td class="Item__Col">#{{$RealData["old_values"]["id"]}}</td>
                                                                                        <td class="Item__Col">{{$RealData["old_values"]["name"]}}</td>
                                                                                        <td class="Item__Col">{{$RealData["old_values"]["email"]}}</td>
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
{{--                                                <div class="Table__Pagination">--}}
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
                ['Name' => "filter[user_id]" , 'Placeholder' => 'User ID Editing'] ] , ['Type' => 'text' , 'Info' =>
                    ['Name' => "filter[user_name]" , 'Placeholder' => 'User Name Editing']
                ] , ['Type' => 'dateRange' , 'Info' =>
                ['Name' => "filter[date]" , 'Placeholder' => 'Create Editing']
            ] ]
    ])
@endsection
