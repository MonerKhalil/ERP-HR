@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SessionDetailsPage">
        <div class="SessionDetailsPage">
            <div class="SessionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض تفاصيل النوع" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="SessionDetailsPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card">
                                <div class="Card__Inner">
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("basics")
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الموظف المراد تقيمه
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $evaluation->employee["first_name"].$evaluation->employee["last_name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الاشخاص الذين سيقومون بعملية التقييم
                                                    </span>
                                                    <span class="Data_Value">
                                                        @php
                                                            $EmployeesList = "" ;
                                                            foreach ($evaluation->enter_evaluation_employee as $Employee) {
                                                                if($EmployeesList !== "")
                                                                    $EmployeesList = $EmployeesList." , " ;
                                                                $EmployeesList = $EmployeesList.$Employee->employee["first_name"]
                                                                    .$Employee->employee["last_name"] ;
                                                            }
                                                        @endphp
                                                        {{ $EmployeesList }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ التقييم
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $evaluation["evaluation_date"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ التقييم التالي
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $evaluation["next_evaluation_date"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ انشاء هذا النوع
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $evaluation["created_at"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ تحديث هذا النوع
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $evaluation["updated_at"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                الوصف الخاص بهذا التقييم
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الوصف
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $evaluation["description"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على النوع
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <form class="Form"
                                                      style="display: inline-block" method="post"
                                                      action="{{ route("system.evaluation.employeedestroy.evaluation" , $evaluation["id"]) }}">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="Button Button--Danger">
                                                        حذف المعلومات
                                                    </button>
                                                </form>
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
@endsection
