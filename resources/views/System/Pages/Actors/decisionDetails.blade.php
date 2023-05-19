@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--DecisionDetailsPage">
        <div class="DecisionDetailsPage">
            <div class="DecisionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تفاصيل القرار" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="DecisionDetailsPage__Content">
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
                                                        نوع القرار
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$decision->type_decision["name"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        رقم القرار
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$decision["number"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ القرار
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$decision["date"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            @if($decision["effect_salary"] != "none")
                                                <div class="ListData__Item ListData__Item--NoAction">
                                                    <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        نوع التأثير على الراتب
                                                    </span>
                                                        <span class="Data_Value">
                                                        {{$decision["effect_salary"]}}
                                                    </span>
                                                    </div>
                                                </div>
                                                @if($decision["effect_salary"] == "increment")
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                قيمة الاضافة على الراتب
                                                            </span>
                                                            <span class="Data_Value">
                                                                {{$decision["value"]}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                قيمة الاضافة على الحوافز
                                                            </span>
                                                            <span class="Data_Value">
                                                                {{$decision["rate"]}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                قيمة الحسم من الراتب
                                                            </span>
                                                            <span class="Data_Value">
                                                                {{$decision["value"]}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                نسبة الحسم من الحوافز
                                                            </span>
                                                            <span class="Data_Value">
                                                                {{$decision["rate"]}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                تاريخ الانشاء على النظام
                                                            </span>
                                                            <span class="Data_Value">
                                                                {{$decision["created_at"]}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ListData__Item ListData__Item--NoAction">
                                                        <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                تاريخ التعديل على النظام
                                                            </span>
                                                            <span class="Data_Value">
                                                                {{$decision["updated_at"]}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                @lang("decisionContent")
                                            </h4>
                                        </div>
                                        <div class="PrintPage__TextEditorContent">
                                            <div class="TextEditorContent">
                                                <div class="TextEditorContent__Content">
                                                    <div class="Card Content">
                                                        <div class="Card__Inner">
                                                            {{$decision["content"]}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على القرار
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a href="{{route("system.decisions.print.pdf" , $decision["id"])}}"
                                                   class="Button Button--Primary">
                                                    طباعة القرار
                                                </a>
                                                <a href="{{route("system.decisions.edit" , $decision["id"])}}"
                                                   class="Button Button--Primary">
                                                    تعديل قرار
                                                </a>
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
