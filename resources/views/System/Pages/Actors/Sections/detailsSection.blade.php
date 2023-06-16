@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--DetailsSectionPage">
        <div class="DetailsSectionPage">
            <div class="DetailsSectionPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "تفاصيل القسم" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="DetailsSectionPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card">
                                <div class="Card__Inner">
                                    <div class="ListData NotResponsive">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                معلومات القسم
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        اسم القسم
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $sections["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        مدير القسم
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $Section->moderator["first_name"].$Section->moderator["last_name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        مكان القسم
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $Section->address["name"] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ListData__Item ListData__Item--NoAction">
                                                <div class="Data_Col">
                                                    <span class="Data_Label">
                                                        تاريخ انشاء القسم
                                                    </span>
                                                    <span class="Data_Value">
                                                        {{ $Section["created_at"] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ListData">
                                        <div class="ListData__Head">
                                            <h4 class="ListData__Title">
                                                العمليات على القسم
                                            </h4>
                                        </div>
                                        <div class="ListData__Content">
                                            <div class="Card__Inner px0">
                                                <a  href="{{route("system.sections.edit" , $Section["id"])}}"
                                                    class="Button Button--Primary">
                                                    تعديل القسم
                                                </a>
                                                <form class="Form"
                                                      style="display: inline-block" method="post"
                                                      action="{{route("system.sections.destroy" , $Section["id"])}}">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="Button Button--Danger">
                                                        حذف القسم
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
