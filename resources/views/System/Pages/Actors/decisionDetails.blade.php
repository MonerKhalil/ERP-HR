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
                                                        Value 1
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        رقم القرار
                                                    </span>
                                                    <span class="Data_Value">
                                                        Value 1
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ القرار
                                                    </span>
                                                    <span class="Data_Value">
                                                        Value 1
                                                    </span>
                                                </div>
                                            </div>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur
                                                                adipisicing elit. Aliquid animi aut
                                                                autem, delectus dolorum eaque eligendi
                                                                eos et facilis fugit magnam numquam
                                                                perferendis perspiciatis provident quam
                                                                quos saepe tempora voluptas.</p>
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
                                                <form action="#" method="post"
                                                      class="Form Form--Dark">
                                                    <button class="Button Button--Primary">طباعة القرار</button>
                                                    <button class="Button Button--Primary">تعديل قرار</button>
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
