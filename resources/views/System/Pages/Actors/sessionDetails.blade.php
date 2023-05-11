@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--SessionDetailsPage">
        <div class="SessionDetailsPage">
            <div class="SessionDetailsPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تفاصيل الجلسة" ,
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
                                                        اسم الجلسة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$sessionDecision["name"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ الجلسة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$sessionDecision["date_session"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        الهدف من الجلسة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$sessionDecision["description"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        رئيس الجلسة
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$sessionDecision->moderator["first_name"].$sessionDecision->
                                                            moderator["last_name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        اعضاء الجلسة
                                                    </span>
                                                    <span class="Data_Value">
                                                        @foreach($sessionDecision->members as $Members)
                                                            {{$Members["first_name"].$Members["last_name"]}} ,
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ الاضافة على النظام
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$sessionDecision["created_at"]}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ لتعديل على النظام
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{$sessionDecision["updated_at"]}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على الجلسة
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a  href="{{route("system.decisions.session_decisions.show" , $sessionDecision["id"])}}"
                                                    class="Button Button--Primary">
                                                    عرض القرارات
                                                </a>
                                                <a  href="{{route("system.session_decisions.edit" , $sessionDecision["id"])}}"
                                                    class="Button Button--Primary">
                                                    تعديل الجلسة
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
