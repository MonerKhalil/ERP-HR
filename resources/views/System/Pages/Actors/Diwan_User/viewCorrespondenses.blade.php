@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--ViewUsers">
        <div class="ViewCorrespondences">
            <div class="ViewCorrespondences__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "View Correspondences" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit"
                ])
            </div>
            <div class="ViewCorrespondences__Content">
                <div class="Container--MainContent">
                    <div class="Row">
                        <div class="Col">
                            <div class="Card ViewCorrespondences__TableCorrespondences">
                                <div class="Table">
                                    <div class="Card__InnerGroup">
                                        <div class="Card__Inner">
                                            <div class="Table__Head">
                                                <div class="Card__ToolsGroup">
                                                    <div class="Card__Tools Table__BulkTools">
                                                        <div class="BulkTools">
                                                            <div class="Form Form--Dark">
                                                                <div class="Form__Group">
                                                                    <div class="Form__Select">
                                                                        <div class="Select__Area">
                                                                            <div class="Selector Selected Size-2"
                                                                                 data-name="BulkAction" data-required="false">
                                                                                <div class="Selector__Main">
                                                                                    <div class="Selector__WordChoose">Bulk Action</div>
                                                                                    <i class="material-icons Selector__Arrow">
                                                                                        keyboard_arrow_down
                                                                                    </i>
                                                                                </div>
                                                                                <ul class="Selector__Options">
                                                                                    <li class="Selector__Option">Delete</li>
                                                                                    <li class="Selector__Option">Print</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Form__Group">
                                                                    <div class="Form__Button">
                                                                        <button class="Button Send Size-2"
                                                                                type="submit">Apply</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Card__Tools Card__SearchTools">
                                                        <ul class="SearchTools">
                                                            <li><i class="OpenPopup material-icons IconClick"
                                                                   data-popUp="SearchAbout">search</i></li>
                                                            <li><span class="SearchTools__Separate"></span></li>
                                                            <li><i class="material-icons IconClick">print</i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="Card__Inner p0">
                                            <div class="Table__ContentList">
                                                <form class="Table__List" action="" method="post">
                                                    <div class="Item HeaderList">
                                                        <div class="Item__Col Item__Col--Check">
                                                            <input id="ItemRow_Main" class="CheckBoxItem" type="checkbox" hidden>
                                                            <label for="ItemRow_Main" class="CheckBoxRow">
                                                                <i class="material-icons ">
                                                                    check_small
                                                                </i>
                                                            </label>
                                                        </div>
                                                        <div class="Item__Col"><span>Name</span></div>
                                                        <div class="Item__Col">Date</div>
                                                        <div class="Item__Col"><span>Type</span></div>
                                                        <div class="Item__Col"><span>Source</span></div>
                                                        <div class="Item__Col"><span>Destination</span></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="Card__Inner">
                                            <div class="Table__Pagination">
                                                @include("System.Components.paginationNum")
                                                @include("System.Components.paginationSelect")
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
