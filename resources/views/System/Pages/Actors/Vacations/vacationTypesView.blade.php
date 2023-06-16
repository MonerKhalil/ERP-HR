@extends("System.Pages.globalPage")

{{--@php--}}
{{--    dd($data[0]);--}}
{{--@endphp--}}

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewTypeVacationsPage">
        <div class="ViewTypeVacationsPage">
            <div class="ViewTypeVacationsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض كل انواع الاجازات" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewTypeVacationsPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewTypeVacationsPage__TableUsers">
                                <div class="Table">
                                    <form name="PrintAllTablePDF"
                                          action="{{ route("system.leave_types.export.pdf") }}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form name="PrintAllTableXlsx"
                                          action="{{ route("system.leave_types.export.xls") }}"
                                          class="FilterForm"
                                          method="post">
                                        @csrf
                                    </form>
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="Card__InnerGroup">
                                            <div class="Card__Inner py1">
                                                <div class="Table__Head">
                                                    <div class="Card__ToolsGroup">
                                                        <div class="Card__Tools Table__BulkTools">
                                                            @include("System.Components.bulkAction" , [
                                                                "Options" => [ [
                                                                    "Label" => "حذف الانواع" ,
                                                                     "Action" => route("system.leave_types.multi.delete") ,
                                                                     "Method" => "delete"
                                                                ] ]
                                                            ])
                                                        </div>
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
                                                                <li class="Table__PrintMenu">
                                                                    <i class="material-icons IconClick PrintMenu__Button"
                                                                       title="Print">print</i>
                                                                    <div class="Dropdown PrintMenu__Menu">
                                                                        <ul class="Dropdown__Content">
                                                                            <li class="Dropdown__Item">
                                                                                <a href="javascript:document.PrintAllTablePDF.submit()">
                                                                                    @lang("printTablePDFFile")
                                                                                </a>
                                                                            </li>
                                                                            <li class="Dropdown__Item">
                                                                                <a href="javascript:document.PrintAllTableXlsx.submit()">
                                                                                    @lang("printTableXlsxFile")
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($data) > 0)
                                                <div class="Card__Inner p0">
                                                    <div class="Table__ContentTable">
                                                        <table class="Center Table__Table" >
                                                            <tr class="Item HeaderList">
                                                                <th class="Item__Col Item__Col--Check">
                                                                    <input id="ItemRow_Main" class="CheckBoxItem"
                                                                           type="checkbox" hidden>
                                                                    <label for="ItemRow_Main" class="CheckBoxRow">
                                                                        <i class="material-icons ">
                                                                            check_small
                                                                        </i>
                                                                    </label>
                                                                </th>
                                                                <th class="Item__Col">#</th>
                                                                <th class="Item__Col">اسم الاجازة</th>
                                                                <th class="Item__Col">نوع الاجازة</th>
                                                                <th class="Item__Col">تشمل الاجازة</th>
                                                                <th class="Item__Col">سنوات العمل الواجب تحقيقها</th>
                                                                <th class="Item__Col">ايام الاجازة</th>
                                                                <th class="Item__Col">عدد ايام الاجازة في السنة</th>
                                                                <th class="Item__Col">عدد سنوات العمل</th>
                                                                <th class="Item__Col">عدد سنوات العمل الاضافية</th>
                                                                <th class="Item__Col">المزيد</th>
                                                            </tr>
                                                            @foreach($data as $Index => $VacationTypeData)
                                                                <tr class="Item DataItem">
                                                                    <td class="Item__Col Item__Col--Check">
                                                                        <input id="MoreRequestVacations_{{ $VacationTypeData["id"] }}"
                                                                               class="CheckBoxItem" hidden
                                                                               name="ids[]" type="checkbox"
                                                                               value="{{ $VacationTypeData["id"] }}" >
                                                                        <label for="MoreRequestVacations_{{ $VacationTypeData["id"] }}"
                                                                               class="CheckBoxRow">
                                                                            <i class="material-icons ">
                                                                                check_small
                                                                            </i>
                                                                        </label>
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $VacationTypeData["id"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $VacationTypeData["name"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $VacationTypeData["type_effect_salary"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $VacationTypeData["gender"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $VacationTypeData["years_employee_services"] }}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        {{ $VacationTypeData["leave_limited"] ? "محددة" : "مفتوحة"}}
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        @if($VacationTypeData["max_days_per_years"] != "")
                                                                            {{ $VacationTypeData["max_days_per_years"] }}
                                                                        @else
                                                                            _
                                                                        @endif
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        @if($VacationTypeData["years_employee_services"] != "")
                                                                            {{ $VacationTypeData["years_employee_services"] }}
                                                                        @else
                                                                            _
                                                                        @endif
                                                                    </td>
                                                                    <td class="Item__Col">
                                                                        @if($VacationTypeData["number_years_services_increment_days"] != "")
                                                                            {{ $VacationTypeData["number_years_services_increment_days"] }}
                                                                        @else
                                                                            _
                                                                        @endif
                                                                    </td>
                                                                    <td class="Item__Col MoreDropdown">
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="MoreTypeVacations_{{$VacationTypeData["id"]}}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="MoreTypeVacations_{{$VacationTypeData["id"]}}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{ route("system.leave_types.show" , $VacationTypeData["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        عرض التفاصيل
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="{{ route("system.leave_types.edit" , $VacationTypeData["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        تعديل النوع
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            @else
                                                @include("System.Components.noData")
                                            @endif
                                            <div class="Card__Inner">
                                                <div class="Card__Pagination">
                                                    @include("System.Components.paginationNum" , [
                                                        "PaginationData" => $data ,
                                                        "PartsViewNum" => 5
                                                    ])
                                                    @include("System.Components.paginationSelect" , [
                                                        "PaginationData" => $data
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

@section("PopupPage")

    @php
        $TypeEffectSalary = [] ;
        foreach ($type_effect_salary as $TypeItem) {
            array_push($TypeEffectSalary , [ "Label" => $TypeItem , "Value" => $TypeItem ]) ;
        }
    @endphp

    @php
        $GenderTypes = [] ;
        foreach ($gender as $Index => $GenderType) {
            array_push($GenderTypes , [ "Label" => $GenderType ,
                 "Value" => $GenderType] ) ;
        }
    @endphp

    @include("System.Components.searchForm" , [
            'InfoForm' => ["Route" => "" , "Method" => "get"] ,
            'FilterForm' => [

                    ['Type' => 'number' , 'Info' =>
                        ['Name' => "filter[id]" ,
                        'Placeholder' => 'رقم النوع'] ] ,


                    ['Type' => 'text' , 'Info' =>
                        ['Name' => "filter[name]" ,
                        'Placeholder' => 'اسم النوع'] ] ,


                    ['Type' => 'select' , 'Info' =>
                        ['Name' => "filter[leave_limited]" ,
                        'Placeholder' => 'نوع الاجازة' ,
                        "Options" => $TypeEffectSalary
                    ] ] ,

                    ['Type' => 'select' , 'Info' =>
                        ['Name' => "filter[leave_limited]" , 'Placeholder' => 'تشمل الاجازة' ,
                        "Options" => $GenderTypes
                    ] ] ,


                    ['Type' => 'select' , 'Info' =>
                        ['Name' => "filter[leave_limited]" , 'Placeholder' => 'ايام الاجازة' ,
                        "Options" => [
                           [ "Label" => "محدودة" , "Value" => "1" ] ,
                           [ "Label" => "مفتوحة" , "Value" => "0" ] ,
                        ]
                    ] ] ,

                    ['Type' => 'number' , 'Info' =>
                        ['Name' => "filter[years_employee_services]" ,
                        'Placeholder' => 'سنوات العمل الواجب تحقيقها'] ] ,

                    ['Type' => 'number' , 'Info' =>
                        ['Name' => "filter[max_days_per_years]" ,
                        'Placeholder' => 'عدد ايام الاجازة في السنة'] ] ,

                    ['Type' => 'number' , 'Info' =>
                        ['Name' => "filter[years_employee_services]" ,
                        'Placeholder' => 'عدد سنوات العمل'] ] ,

                    ['Type' => 'number' , 'Info' =>
                        ['Name' => "filter[number_years_services_increment_days]" ,
                        'Placeholder' => 'عدد سنوات العمل الاضافية'] ] ,
                ]
        ])

@endsection
