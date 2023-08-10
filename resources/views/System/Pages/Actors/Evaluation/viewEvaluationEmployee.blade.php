@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--NewTypeViewPage">
        <div class="NewTypeViewPage">
            <div class="NewTypeViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض جميع تقييمات الموظف" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NewTypeViewPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card NewTypeViewPage__TableUsers">
                                <div class="Table">
                                    <div class="Card__InnerGroup">
                                        <div class="Card__Inner py2"></div>
                                        @if(count($evaluation->enter_evaluation_employee) > 0)
                                            <div class="Card__Inner p0">
                                                <div class="Table__ContentTable">
                                                    <table class="Table__Table" >
                                                        <tr class="Item HeaderList">
                                                            <th class="Item__Col">#</th>
                                                            <th class="Item__Col">
                                                                اسم الموظف
                                                            </th>
                                                            <th class="Item__Col">
                                                                تاريخ التقييم
                                                            </th>
                                                            <th class="Item__Col">
                                                                التقييم من قِبل
                                                            </th>
                                                            <th class="Item__Col">
                                                                هل تم التقييم
                                                            </th>
                                                            <th class="Item__Col">
                                                                التقييمات
                                                            </th>
                                                            <th class="Item__Col">
                                                                المزيد
                                                            </th>
                                                        </tr>
                                                        @foreach($evaluation->enter_evaluation_employee as $Index => $EvaluationItem)
                                                            @php
                                                                $IsEvaluation = true ;
                                                                foreach($typeEvaluation as $ItemType)
                                                                    if($EvaluationItem[$ItemType] == 0) {
                                                                        $IsEvaluation = false ;
                                                                        break ;
                                                                    }
                                                            @endphp
                                                            <tr class="Item DataItem">
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationItem["id"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $evaluation->employee["first_name"].$evaluation->employee["last_name"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    -
                                                                </td>
                                                                <td class="Item__Col">
                                                                    {{ $EvaluationItem->employee["first_name"].$evaluation->employee["last_name"] }}
                                                                </td>
                                                                <td class="Item__Col">
                                                                    @if($IsEvaluation)
                                                                        تم التقييم
                                                                    @else
                                                                        لم يتم بعد
                                                                    @endif
                                                                </td>
                                                                <td class="Item__Col">
                                                                    @if($IsEvaluation)
                                                                        <i class="material-icons IconClick OpenPopup"
                                                                           data-popUp="Evaluation_{{ $EvaluationItem["id"] }}">
                                                                            visibility
                                                                        </i>
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td class="Item__Col MoreDropdown">
                                                                    @if(Auth()->user()["id"] === $EvaluationItem->employee["user_id"])
                                                                        <i class="material-icons Popper--MoreMenuTable MenuPopper IconClick More__Button"
                                                                           data-MenuName="MoreEvaluationOption_{{ $EvaluationItem["id"] }}">
                                                                            more_horiz
                                                                        </i>
                                                                        <div class="Popper--MoreMenuTable MenuTarget Dropdown"
                                                                             data-MenuName="MoreEvaluationOption_{{ $EvaluationItem["id"] }}">
                                                                            <ul class="Dropdown__Content">
                                                                                <li>
                                                                                    <a href="{{ route("system.evaluation.employee.show.add.evaluation" , $evaluation["id"]) }}"
                                                                                       class="Dropdown__Item">
                                                                                        اضافة تقييم لهذا الموظف
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    @else
                                                                        -
                                                                    @endif
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
                                            <div class="Card__Pagination"></div>
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

@section("PopupPage")

    @foreach($evaluation->enter_evaluation_employee as $Index => $EvaluationItem)
        @php
            $IsEvaluation = true ;
            foreach($typeEvaluation as $ItemType)
                if($EvaluationItem[$ItemType] == 0) {
                    $IsEvaluation = false ;
                    break ;
                }
        @endphp
        @if($IsEvaluation)
            <div class="Popup Popup--Dark" data-name="Evaluation_{{ $EvaluationItem["id"] }}">
                <div class="Popup__Content">
                    <div class="Popup__Card">
                        <i class="material-icons Popup__Close">close</i>
                        <div class="Popup__CardContent">
                            <div class="Popup__InnerGroup">
                                <div class="ListData NotResponsive">
                                    <div class="ListData__Head">
                                        <h4 class="ListData__Title">
                                            معلومات التقييم
                                        </h4>
                                    </div>
                                    <div class="ListData__Content">
                                        @foreach($typeEvaluation as $ItemType)
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                <span class="Data_Label">
                                                    by {{ $ItemType }}
                                                </span>
                                                    <span class="Data_Value">
                                                    {{ $EvaluationItem[$ItemType] }}
                                                </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

@endsection
