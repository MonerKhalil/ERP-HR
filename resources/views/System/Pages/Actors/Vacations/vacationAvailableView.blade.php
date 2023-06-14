@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewAvailableView">
        <div class="ViewAvailableViewPage">
            <div class="ViewAvailableViewPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "عرض اجازاتي المتاحة" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="ViewAvailableViewPage__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card">
                                <div class="CollapsibleMenu CollapsibleMenu--Vacation">
                                    <div class="CollapsibleMenu__Content">
                                        <div class="Col-12 CollapsibleMenu__CollapseItem">
                                            <div class="CollapseItem__Header">
                                                <div class="CollapseItem__Text">
                                                    <span class="Title">
                                                        Lorem ipsum dolor sit amet :
                                                    </span>
                                                    <span class="Value">
                                                        45
                                                    </span>
                                                </div>
                                                <div class="CollapseItem__ExpansionButton">
                                                    <i class="material-icons">add</i>
                                                </div>
                                            </div>
                                            <div class="CollapseItem__Body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At labore minima odio suscipit tempora. Alias architecto, asperiores dicta, eligendi error et nulla pariatur perferendis possimus quidem quos ratione suscipit ullam.
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
