<div class="MultiSelector Open">
    <div class="MultiSelector__Main">
        <div class="MultiSelector__WordLabel">{{$Label}}</div>
        <div class="MultiSelector__WordChoose"></div>
        <i class="material-icons MultiSelector__Arrow">
            keyboard_arrow_down
        </i>
    </div>
    @if(isset($OptionsValues))
        @php
            $Counter = 0 ;
        @endphp
        <ul class="Selector__Options">
            @foreach($OptionsValues as $value => $lable)
                <li class="Selector__Option" data-option="{{$value}}">
                    <input id="Option{{$Counter}}" name=""
                           class="MultiSelector__InputCheckBox" type="checkbox" hidden>
                    <label for="Option{{$Counter}}" class="CheckBoxRow">
                        <span class="CheckBoxNormal MultiSelector__CheckBox">
                            <i class="material-icons ">
                            check_small
                        </i>
                        </span>
                        <span class="MultiSelector__Title"><{{$lable}}/span>
                    </label>
                </li>
                @php
                    $Counter++ ;
                @endphp
            @endforeach
        </ul>
    @elseif(isset($Options))
        @php
            $Counter = 0 ;
        @endphp
        <ul class="Selector__Options">
            @foreach($Options as $Option)
                <li class="MultiSelector__Option">
                    <input id="Option{{$Counter}}" name="{{$Option['value']}}"
                           class="MultiSelector__InputCheckBox" type="checkbox" hidden>
                    <label for="Option{{$Counter}}" class="MultiSelector__Label">
                        <span class="MultiSelector__CheckBox">
                            <i class="material-icons ">
                                check_small
                            </i>
                        </span>
                        <span class="MultiSelector__Title">{{$Option['label']}}</span>
                    </label>
                </li>
                @php
                    $Counter++ ;
                @endphp
            @endforeach
        </ul>
    @endif
</div>
