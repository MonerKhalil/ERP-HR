@extends("System.Pages.globalPage")

{{--@php--}}
{{--    dd($finalData);--}}
{{--@endphp--}}

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ReportEmployeesView">
        <div class="ReportEmployeesView">
            <div class="ReportEmployeesView__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تقرير عن الموظفين" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ReportEmployeesView__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ReportEmployeesView__TableUsers">
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
                                            <div class="Card__Inner py1">
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
                                                            <th class="Item__Col">
                                                                #
                                                            </th>
                                                            <th class="Item__Col">
                                                                اسم الموظف
                                                            </th>
                                                            <th class="Item__Col">
                                                                رقم الاضبارة
                                                            </th>
                                                            <th class="Item__Col">
                                                                الوظيفة الحالية
                                                            </th>
                                                            <th class="Item__Col">
                                                                المزيد
                                                            </th>
                                                        </tr>
                                                        @foreach($finalData as $RowData)
                                                            <tbody class="GroupRows">
                                                                <tr class="GroupRows__MainRow">
                                                                    <td class="Item__Col">
                                                                        {{ $RowData["id"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RowData["first_name"]." ".$RowData["last_name"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RowData["gender"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $RowData["current_job"] }}
                                                                    </td>
                                                                    <td class="Item__Col Item__Col--Details">
                                                                        <span class="Details__Button">@lang("details")</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="GroupRows__SubRows">
                                                                    <td class="Item__Col" colspan="5">
                                                                    <div class="Report">
                                                                        <div class="Report__Content">
                                                                            <div class="ListData NotResponsive">
                                                                                <div class="ListData__Content">
                                                                                    @foreach($dataSelected as $Index => $ReportSelected)
                                                                                        <div class="ListData__Item ListData__Item--NoAction">
                                                                                            <div class="Data_Col">
                                                                                        <span class="Data_Label">
                                                                                            {{ $Index }}
                                                                                        </span>
                                                                                                <span class="Data_Value">
                                                                                            {{ $ReportSelected }}
                                                                                        </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                </tr>
                                                            </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="Card__Inner">
                                                <div class="Card__Pagination">
                                                    @include("System.Components.paginationNum" , [
                                                        "PaginationData" => $finalData ,
                                                        "PartsViewNum" => 5
                                                    ])
                                                    @include("System.Components.paginationSelect" , [
                                                        "PaginationData" => $finalData
                                                    ])
                                                </div>
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
