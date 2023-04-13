<div class="Popup Popup--Dark" data-name="SearchAbout">
    <div class="Popup__Content">
        <div class="Popup__Card">
            <div class="Popup__Head">
                <h3 class="Popup__Title">Search Here</h3>
                <i class="material-icons Popup__Close">close</i>
            </div>
            <div class="Popup__Body">
                @if(isset($InfoForm))
                <form class="Form Form--Dark"
                      action="{{$InfoForm['Route']}}" method="{{$InfoForm['Method']}}">
                    <div class="Row GapC-1-5">
                        @if(isset($SearchForm))
                            <div class="Col">
                                <div class="Form__Group">
                                    <div class="Form__Input">
                                        <div class="Input__Area">
                                            <input id="SearchField" class="Input__Field"
                                                   type="text" name="{{$SearchForm['Name']}}"
                                                   placeholder="{{$SearchForm['Placeholder']}}">
                                            <label class="Input__Label" for="SearchField">{{$SearchForm['Placeholder']}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($FilterForm))
                            <?php
                                $Counter = 0 ;
                            ?>
                            @foreach($FilterForm as $Field)
                                @if($Field["Type"] == "text" || $Field["Type"] == "email")
                                    <div class="Col-6-md">
                                        <div class="Form__Group">
                                            <div class="Form__Input">
                                                <div class="Input__Area">
                                                    <input id="{{"Input".$Counter}}"
                                                           class="Input__Field"
                                                           type="{{$Field["Type"]}}"
                                                           name="{{$Field["Info"]["Name"]}}"
                                                           placeholder="{{$Field["Info"]["Placeholder"]}}"
                                                           @if(isset($Field["Info"]["Value"]))
                                                                value="{{$Field["Info"]["Value"]}}"
                                                           @endif
                                                           @if(isset($Field["Info"]["Required"]))
                                                                required
                                                            @endif
                                                    >
                                                    <label class="Input__Label"
                                                           for="{{"Input".$Counter}}">{{$Field["Info"]["Placeholder"]}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $Counter++
                                    ?>
                                @endif
                                @if($Field["Type"] == "select")
                                    <div class="Col-6-md">
                                        <div class="Form__Group">
                                            <div class="Form__Select">
                                                <div class="Select__Area">
                                                    <div class="Selector"
                                                         data-name="{{$Field["Info"]["Name"]}}"
                                                         @if(isset($Field["Info"]["Required"]))
                                                            data-required="true"
                                                         @endif>
                                                        <div class="Selector__Main">
                                                            <div class="Selector__WordLabel">
                                                                {{$Field["Info"]["Placeholder"] ?? ""}}
                                                            </div>
                                                            <div class="Selector__WordChoose">
                                                                {{$Field["Info"]["Value"] ?? ""}}
                                                            </div>
                                                            <i class="material-icons Selector__Arrow">
                                                                keyboard_arrow_down
                                                            </i>
                                                        </div>
                                                        <ul class="Selector__Options">
                                                            @foreach($Field["Info"]["Options"] as $Option)
                                                                <li class="Selector__Option"
                                                                    data-option=""
                                                                >{{$Option["Value"]}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="Col">
                            <div class="Form__Group">
                                <div class="Form__Button">
                                    <button class="Button Send"
                                            type="submit">@lang("updateData")</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
