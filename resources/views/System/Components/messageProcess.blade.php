
@if(isset($Type) && isset($Message))
    @php
        $TypeMessage = "" ;
        if($Type == "Success")
            $TypeMessage = "Success" ;
        elseif($Type == "Error")
            $TypeMessage = "Error" ;
        elseif($Type == "Warning")
            $TypeMessage = "Warning" ;
        elseif($Type == "Info")
            $TypeMessage = "Info" ;
    @endphp
    <div class="MessageProcess MessageProcess--{{$TypeMessage}} Show">
        <div class="MessageProcess__MainContent">
            <div class="MessageProcess__Header">
                <div class="MessageProcess__Title">
                    @if($TypeMessage == "Success")
                        <i class="material-icons">task_alt</i>
                        <span class="Title">Success Message</span>
                    @elseif($TypeMessage == "Info")
                        <i class="material-icons">tips_and_updates</i>
                        <span class="Title">Information Message</span>
                    @elseif($TypeMessage == "Error")
                        <i class="material-icons">error</i>
                        <span class="Title">Error Message</span>
                    @elseif($TypeMessage == "Warning")
                        <i class="material-icons">crisis_alert</i>
                        <span class="Title">Warning Message</span>
                    @endif
                </div>
                <div class="MessageProcess__Close">
                    <i class="material-icons">close</i>
                </div>
            </div>
            <hr class="MessageProcess__Separate">
            <div class="MessageProcess__Body">
                <p class="MessageProcess__Message">{{$Message}}</p>
            </div>
        </div>
    </div>
@endif


{{--
    Type : Success || Error || Warning || Info
    Message : String
--}}
