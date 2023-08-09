@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--RequestOvertimeForm">
        <div class="RequestOvertimeForm">
            <div class="RequestOvertimeForm__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "اضافة نوع تقييم جديد" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="RequestOvertimeForm__Content">
                <div class="ViewUsers__Content">
                    <div class="Row">
                        <div class="RequestOvertimeForm__Form">
                            <div class="Container--MainContent">
                                <div class="MessageProcessContainer">
                                    @include("System.Components.messageProcess")
                                </div>
                                <div class="Row">
                                    <div class="Card">
                                        <div class="Card__Content">
                                            <div class="Card__Inner">
                                                <div class="Card__Body">
                                                    <form class="Form Form--Dark"
                                                          action="{{ route("system.evaluation.employeestore") }}"
                                                          method="post">
                                                        @csrf
                                                        <div class="ListData">
                                                            <div class="ListData__Head">
                                                                <h4 class="ListData__Title">
                                                                    معلومات التقييم الجديد
                                                                </h4>
                                                            </div>
                                                            <div class="ListData__Content">
                                                                <div class="ListData__CustomItem">
                                                                    <div class="Row GapC-1-5">
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $EvaluationEmployees = [] ;
                                                                                            foreach ($employees as $Employee) {
                                                                                                array_push($EvaluationEmployees , [
                                                                                                    "Label" => $Employee["first_name"].$Employee["last_name"]
                                                                                                    , "Value" => $Employee["id"] , "Name" => "evaluation_employees[]"] ) ;
                                                                                            }
                                                                                        @endphp

                                                                                        @include("System.Components.multiSelector" , [
                                                                                            'Name' => "_" , "Required" => "true" ,
                                                                                            "NameIDs" => "EvaluationEmployeesID" ,
                                                                                            "DefaultValue" => "" , "Label" => "الموظفين الذين سيقومون بالتقييم" ,
                                                                                            "Options" => $EvaluationEmployees
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Select">
                                                                                    <div class="Select__Area">
                                                                                        @php
                                                                                            $Employees = [] ;
                                                                                            foreach ($employees as $Employee) {
                                                                                                array_push($Employees , [
                                                                                                    "Label" => $Employee["first_name"].$Employee["last_name"]
                                                                                                    , "Value" => $Employee["id"]]) ;
                                                                                            }
                                                                                        @endphp

                                                                                        @include("System.Components.selector" , [
                                                                                            'Name' => "employee_id" , "DefaultValue" => "" ,
                                                                                            "Label" => "الموظف المراد تقييمه" , "Required" => "true",
                                                                                            "Options" => $Employees
                                                                                        ])
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="StartEvaluationDate"
                                                                                               name="evaluation_date"
                                                                                               class="DateMinToday Date__Field"
                                                                                               TargetDateStartName="StartEvaluationDate"
                                                                                               type="text" placeholder="تاريخ البدأ بالتقييم"
                                                                                               required>
                                                                                        <label class="Date__Label"
                                                                                               for="StartEvaluationDate">
                                                                                            تاريخ البدأ بالتقييم
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-4-md Col-6-sm">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Date">
                                                                                    <div class="Date__Area">
                                                                                        <input id="NextEvaluationDate"
                                                                                               name="next_evaluation_date"
                                                                                               class="DateEndFromStart Date__Field"
                                                                                               data-StartDateName="StartEvaluationDate"
                                                                                               type="text" placeholder="تاريخ التقييم التالي"
                                                                                               required>
                                                                                        <label class="Date__Label"
                                                                                               for="NextEvaluationDate">
                                                                                            تاريخ التقييم التالي
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="Col-12">
                                                                            <div class="Form__Group">
                                                                                <div class="Form__Textarea">
                                                                                    <div class="Textarea__Area">
                                                                                        <textarea id="NotesForEvaluation" class="Textarea__Field" name="description" rows="3" placeholder="ملاحظات حول هذا التقييم"></textarea>
                                                                                        <label class="Textarea__Label" for="NotesForEvaluation">ملاحظات حول هذا التقييم</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="Row GapC-1-5">
                                                                <div class="Col-12">
                                                                    <div class="Form__Group">
                                                                        <div class="Form__Button">
                                                                            <button class="Button Send"
                                                                                    type="submit">اضافة معلومات تقييم جديد</button>
                                                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
