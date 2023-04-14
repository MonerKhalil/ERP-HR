<div class="Pagination--Select">
    <div class="Pagination__List">
        <span class="Pagination__PageWord">Page</span>
        <form class="Form Form--Dark">
            <div class="Form__Select">
                <div class="Select__Area">
                    @include("System.Components.selector" , [
                        'Name' => "Pagination" , "DefaultValue" => "1" ,
                        "Label" => "\"&nbsp;\"" ,
                        "Options" => [ ["Label" => "1" , "Value" => "1"] ,
                                       ["Label" => "2" , "Value" => "2"] ,
                                       ["Label" => "3" , "Value" => "3"] ,
                                       ["Label" => "4" , "Value" => "4"] ,
                                       ["Label" => "5" , "Value" => "5"] ,
                                       ["Label" => "6" , "Value" => "6"] ] ,
                    ])
                </div>
            </div>
        </form>
        <span class="Pagination__PageOf">Of 102</span>
    </div>
</div>
