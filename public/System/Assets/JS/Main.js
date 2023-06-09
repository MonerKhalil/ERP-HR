
$(document).ready(function (){

    "use strict" ;

    /*===========================================
	=           Header Page       =
    =============================================*/
    const Header = $(".HeaderPage") ;
    Header.ready(function () {
        $(".HeaderPage .Alert").each(function() {
            $(this).children("i").click(()=> {
                $(this).children(".Dropdown")
                    .toggleClass("Show").trigger("ShowChange");
            });
        });
        $(".HeaderPage .AccountAlerts > .UserImage").each(function (){
            $(this).children("img").click(() => {
                $(this).find(".Dropdown")
                    .toggleClass("Show").trigger("ShowChange")
            });
        });
        $(".HeaderPage__MenusOpening .MenuIcon").each(function() {
           $(this).click(()=> {
               if(Header.hasClass("OpenMenu"))
                   CloseMenu();
               else
                   OpenMenu();
           });
        });
    });

    /*===========================================
	=           Navigations Menu       =
    =============================================*/
    const MenuNav = $(".NavigationsMenu") ;
    MenuNav.ready(function () {
        let IsHover = false ;
        $(".NavigationsGroup__GroupItem").each(function (){
            $(this).children(".Title").click(()=>{
                if(!$(this).hasClass("Open"))
                    CloseNavigationsGroup();
                $(this).toggleClass("Open");
            });
        });
        $(".NavigationsMenu__CloseMenu").click(() => {
            CloseMenu();
        });
        MenuNav.hover(function () {
            if(IsOpen()) {
                IsHover = false ;
            } else {
                IsHover = true ;
                OpenMenu();
            }
        } , function (){
            if(IsHover) CloseMenu() ;
        });
    });

    function CloseNavigationsGroup() {
        $(".NavigationsGroup__GroupItem").each(function() {
            $(this).removeClass("Open");
        });
    }

    /*===========================================
	=           Footer Page       =
    =============================================*/
    const Footer = $(".FooterPage") ;

    /*===========================================
	=           Selector       =
    =============================================*/
    $(".Selector").ready(function (){
        $(".Selector").each((_ , Selector)=> {
            $(Selector).find(".Selector__Main").click(() => {
                $(Selector).toggleClass("Open");
                closeOutSide($(Selector)[0] , ()=> {
                    $(Selector).removeClass("Open");
                });
            });
            CreateSelect($(Selector).attr("data-name")
                , $(Selector).attr("data-required"));
            $(Selector).find(".Selector__Options .Selector__Option")
                .each((Index_3 , Value_3) => {
                    $(Value_3).click(() => {
                        const OptionValue = $(Value_3).attr("data-option");
                        $(Selector).toggleClass("Open");
                        ClickSelect($(Value_3).text() , OptionValue);
                    });
                });
            if($(Selector).attr("data-selected"))
                DefaultValue($(Selector).attr("data-selected")) ;

            function CreateSelect(Name = String , IsRequired) {
                const Required = IsRequired ? "required" : "" ;
                const InputElement = `<input type="text" value=""
                    name="${Name}" class="Selector__SelectForm" ${Required} hidden>` ;
                $(Selector).append(InputElement);
            }

            function DefaultValue(Value = String) {
                $(Selector).find(".Selector__Options .Selector__Option")
                    .each((_ , Option) => {
                        if($(Option).attr("data-option") === Value) {
                            ClickSelect($(Option).text() , Value);
                        }
                    });
            }

            function ClickSelect(OptionSelected = String
                , ValueOption = String) {
                const InputField = $(Selector).find(".Selector__SelectForm").get(0) ;
                $(Selector).addClass("Selected");
                $(Selector).find(".Selector__Main .Selector__WordChoose")
                    .text(OptionSelected);
                $(InputField).attr("value" , ValueOption);
                $(InputField).valid() ;
                $(Selector).attr("data-selected" , ValueOption);
            }
        });
    });

    function ClearSelector(Selector = HTMLElement) {
        $(Selector).removeClass("Selected");
        $(Selector).find(".Selector__Main .Selector__WordChoose")
            .text("");
        $(Selector).find(".Selector__SelectForm")
            .attr("value" , "");
        $(Selector).attr("data-selected" , "");
    }
    /*===========================================
	=           Form       =
    =============================================*/
    $("form").ready(function (){
        $("form").each((Index , Value)=> {
            $.validator.addMethod("RegexPassword"
                , function (Value , Element) {
                return /^([a-zA-Z0-9@*#]{8,15})$/.test(Value) ;
            } ,
                $("html").get(0).lang === "ar" ? "يجب ان تكون كلمة السر تحتوي من 8 الى 15 رمز"
                    : "The password must contain from 8 to 15 characters"
            );
            const ValidatorForm = $(Value).validate({

                ignore : ".IgnoreValidate" ,

                rules : {

                    "password" : {
                        RegexPassword : true
                    } ,

                    "re_password" : {
                        equalTo: "#Password"
                    }
                } ,

                success : function (ErrorLabel , FieldElement) {
                    const Group = $(FieldElement).closest(".Form__Group").get(0) ;
                    const ErrorElement = $(Group).find(".Form__Error") ;
                    if(ErrorElement.length > 0)
                        ErrorElement.remove() ;
                } ,

                errorPlacement : function (Error , Element) {
                    const Group = $(Element).closest(".Form__Group").get(0) ;
                    const ErrorElement = $(Group).find(".Form__Error") ;
                    if(ErrorElement.length === 0) {
                        const ErrorContainer = `<div class="Form__Error">
                            <div class="Error__Area">
                                <small>${$(Error).text()}</small>
                            </div>
                        </div>` ;
                        $(Group).append(ErrorContainer) ;
                    } else {
                        $(ErrorElement).find(".Error__Area small")
                            .text($(Error).text()) ;
                    }
                } ,

                invalidHandler : function () {
                    LoaderHidden() ;
                } ,

                submitHandler : function (form) {
                    if($(form).valid()) {
                        LoaderView();
                        $(form).get(0).submit();
                    }
                }
            });
            $(Value).find("input , textarea").each((_ , Field) => {
                $(Field).on("blur" , function () {
                    $(Field).valid() ;
                });
            });
        });
    })
    $(".Form").ready(function () {
        $(".Form").each((_ , Form) => {
            $(Form).find(".Form__Input--Password").each((Index , Value)=> {
                $(Value).find(".Input__Icon").click((Icon)=>{
                    const InputField = $(Value).find(".Input__Field") ;
                    const IsView = InputField.attr("type") === 'password' ;
                    if(IsView)
                        InputField.attr("type" , "text");
                    else
                        InputField.attr("type" , "password");
                });
            });
            $(Form).find(".Form__Date").each((Index , Value)=> {
                const Input = $(Value).find("input").get(0) ;
                if($(Input).hasClass("RangeData")) {
                    $(Input).flatpickr({
                        mode: "range"
                    });
                }
                else
                    $(Input).flatpickr();
            });
            $(Form).find(".RestButton").each((_ , Buttons) => {
                $(Buttons).click(()=> {
                    $(Form).find(`.Date__Field , .Input__Field , .Textarea__Field`)
                        .each((_ , Field) => {
                       $(Field).val("");
                    });
                    $(Form).find(`.Selector`).each((_ , Selector) => {
                        ClearSelector(Selector);
                    });
                });
            });
            $(Form).find(".TextEditor").each((_ , TextEditor) => {
                $(TextEditor).trumbowyg() ;
            });
        });
    });

    /*===========================================
	=           Menu And Header       =
    =============================================*/
    function IsOpen() {
        return Header.hasClass("OpenMenu") &&
            MenuNav.hasClass("Open") ;
    }

    function OpenMenu() {
        Header.addClass("OpenMenu") ;
        MenuNav.addClass("Open") ;
        Footer.addClass("OpenMenu")
    }

    function CloseMenu() {
        CloseNavigationsGroup() ;
        Header.removeClass("OpenMenu") ;
        MenuNav.removeClass("Open") ;
        Footer.removeClass("OpenMenu")
    }

    /*===========================================
	=           Loader Upload       =
    =============================================*/
    function LoaderView() {
        $(".Loader--Upload").ready(function (){
            $(".Loader--Upload").each((Index , Value)=> {
                $(Value).show();
            })
        });
    }

    function LoaderHidden() {
        $(".Loader--Upload").ready(function (){
            $(".Loader--Upload").each((Index , Value)=> {
                $(Value).hide();
            })
        });
    }

    /*===========================================
	=           Profile Page       =
    =============================================*/
    $(".ProfilePage").ready(function (){
        $(".ProfilePage").find("form.ChangeImage").each((Index , Value)=>{
            const InputFile = $(Value).find("#ImageChange");
            InputFile.change(()=>{
                //Check Image
                $(Value).submit();
            });
        });
    });

    /*===========================================
	=           Popup Component       =
    =============================================*/
    $(".Popup").ready(function (){
        $(".Popup").each((Index , Value)=> {
            $(Value).find(".Popup__Close").click(()=>{
                $(Value).removeClass("Open");
            });
        });
    });
    $(".OpenPopup").ready(function (){
        $(".OpenPopup").each((Index , Value)=>{
            const PopupName = $(Value).attr("data-popUp");
            let PopupElement ;
            $(".Popup").each((Index_2 , PopupValue)=>{
                if($(PopupValue).attr("data-name") === PopupName)
                    PopupElement = PopupValue ;
            });
            $(Value).click(()=>{
                $(PopupElement).addClass("Open");
            });
        });
    });

    /*===========================================
	=           Taps Layout       =
    =============================================*/
    $(".Taps").ready(function () {
        $(".Taps").each((Index , TapElement) => {
           let CurrentTap , CurrentPanel ;
           $(TapElement).find(".Taps__Item").each((Index_2 , TapItem) => {
              const ContentAttribute = $(TapItem).attr("data-content");
              let PanelElement ;
              $(TapElement).find(".Taps__Panel").each((Index_3 , PanelItem)=> {
                  if($(PanelItem).attr("data-panel") === ContentAttribute)
                      PanelElement = PanelItem ;
              });
              if(Index_2 === 0)
                  Select(TapItem , PanelElement);
              $(TapItem).click(()=> Select(TapItem , PanelElement));
           });

           function Select(TapButton , Panel) {
               $(CurrentTap).removeClass("Active");
               $(CurrentPanel).removeClass("Active");
               CurrentTap = TapButton ;
               CurrentPanel = Panel ;
               $(CurrentTap).addClass("Active") ;
               $(CurrentPanel).addClass("Active");
           }
        });
    });

    /*===========================================
	=           Dropdown       =
    =============================================*/
    $(".Dropdown").ready(function (){
        $(".Dropdown").each((_ , Dropdown)=>{
            $(Dropdown).on("ShowChange" , function (){
                if($(Dropdown).hasClass("Show"))
                    closeOutSide($(Dropdown)[0] , ()=>{
                        $(Dropdown).removeClass("Show");
                    });
            });
        });
    });

    /*===========================================
	=           Drag & Drop       =
    =============================================*/
    $(".DragDrop").ready(function() {
        let ItemTarget = undefined ;
        let LastZone = undefined ;

        $(".DragDrop__Zone").each((_ , Zone) => {
            const NamesItem = $(Zone).attr("data-namesItem").split(" ") ;
            CheckEmptyZone(true);
            $(Zone).on("dragover" , (ev) => {
                ev.preventDefault();
                CheckEmptyZone();
                let IsAcceptItem = false ;
                for (let i = 0; i < NamesItem.length ; i++) {
                    if(NamesItem[i] === $(ItemTarget)
                        .attr("data-nameItem")) {
                        IsAcceptItem = true ;
                        break ;
                    }
                }
                if(IsAcceptItem) {
                    const ItemBottom = InsertAboveItem(ev.originalEvent.clientY) ;
                    if(!ItemBottom) {
                        $(Zone).append(ItemTarget)
                    } else {
                        $(ItemTarget).insertBefore(ItemBottom)
                    }
                }
            });

            function InsertAboveItem(MouseY = Number) {
                let ClosestItem = undefined ;
                let ClosestOffset = Number.NEGATIVE_INFINITY ;
                $(Zone).find(".DragDrop.DragDrop__Item:not(.IsDragging)")
                    .each((_ , Item) => {
                        const HeightItem = $(Item).height() ;
                        const TopBoundItem = Item.getBoundingClientRect().top
                            + (HeightItem / 2);
                        const Offset = MouseY - TopBoundItem ;
                        if(Offset < 0 && Offset > ClosestOffset) {
                            ClosestOffset = Offset ;
                            ClosestItem = Item ;
                        }
                    });
                return ClosestItem ;
            }

            function CheckEmptyZone(IsInitial = false) {

                if(!IsInitial) {
                    if(Zone !== LastZone) {
                        setTimeout(() => {
                            if(LastZone)
                                Check(LastZone);
                            LastZone = Zone ;
                        } , 10);
                    }
                }

                Check(Zone);

                function Check(ZoneContent) {
                    if($(ZoneContent).children().length === 0) {
                        $(ZoneContent).addClass("Empty");
                        const DropText = `
                        <div class="DragDrop__Tip">
                            Drop Here
                        </div>
                    ` ;
                        $(ZoneContent).append(DropText);
                    } else {
                        $(ZoneContent).find(".DragDrop__Tip").remove();
                        $(ZoneContent).removeClass("Empty");
                    }
                }
            }

        });

        $(".DragDrop__Item").each((_ , Item) => {
            $(Item).prop("draggable" , "true");
            $(Item).on("dragstart" , () => {
                $(Item).addClass("IsDragging") ;
                ItemTarget = Item ;
            });
            $(Item).on("dragend" , () => {
                $(Item).removeClass("IsDragging") ;
                ItemTarget = undefined ;
                LastZone = undefined ;
            });
        });
    });

    /*===========================================
	=           Drag & Drop By Click       =
    =============================================*/
    $(".DragDropClick").ready(function (){

    });

    /*===========================================
	=           Table Layout       =
    =============================================*/
    $(".Table").ready(function () {
        $(".Table").each((_ , Table) => {
            $(Table).find(".Table__List").each((_ , List)=>{
                $(List).find(".HeaderList").each((_ , HeaderList) => {
                    $(HeaderList).find(".CheckBoxItem").change((ev) => {
                        if($(ev.currentTarget).is(":checked"))
                            $(List).find(".DataItem").each((_ , Item) => {
                                $(Item).find(".CheckBoxItem").prop('checked', true);
                            });
                        else
                            $(List).find(".DataItem").each((_ , Item) => {
                                $(Item).find(".CheckBoxItem").prop('checked', false);
                            });
                    });
                });
                $(List).find(".DataItem").each((_ , DataItem) => {
                    $(DataItem).find(".CheckBoxItem").change((ev) => {
                        const CheckBoxHeader = $(List).find(".HeaderList .CheckBoxItem") ;
                        if(CheckBoxHeader.is(":checked") &&
                            !$(ev.currentTarget).is(":checked")) {
                            CheckBoxHeader.prop('checked', false);
                        }
                    });
                });
            });
            $(Table).find(".GroupRows").each((_ , Group) => {
                const MainRow = $(Group).find(".GroupRows__MainRow").get(0) ;
                const SubRows = $(Group).find(".GroupRows__SubRows").get(0) ;
                $(MainRow).find(".Details__Button").click(() => {
                        $(MainRow).toggleClass("Show") ;
                        $(SubRows).fadeToggle() ;
                    });
            });
            // $(Table).find(".Table__BulkTools")
        });
    });

    /*===========================================
	=           Cookies Page       =
    =============================================*/
    $(".Cookies").ready(function () {
        if(document.cookie === "") {
            $(".Cookies").addClass("Show");
            $(".Cookies__Accept").click(() => {
                document.cookie = "Accept" ;
                $(".Cookies").removeClass("Show");
            });
            $(".Cookies__Decline").click(() => {
                document.cookie = "Decline" ;
                $(".Cookies").removeClass("Show");
            });
        }
    });

    /*===========================================
	=           Bulk Tools       =
    =============================================*/
    $(".BulkTools").ready(function (){
        $(".BulkTools").each((_ , Bulk) => {
            const ClosestForm = $(Bulk).closest("form").get(0) ;
            let IsHaveDeleteInput = false ;
            if(ClosestForm !== undefined)
                $(Bulk).find(".Selector__Option").each((_ , Option) => {
                    $(Option).click(() => {
                       const Action = $(Option).attr("data-action") ;
                       const Method = $(Option).attr("data-method") ;
                       if(Method === "delete") {
                           if(!IsHaveDeleteInput) {
                               const DeleteInput = `
                           <input type="hidden" name="_method" value="delete" />` ;
                               $(Bulk).append(DeleteInput) ;
                               IsHaveDeleteInput = true ;
                           }
                       } else {
                           if(IsHaveDeleteInput) {
                               $(Bulk).find("input[value='delete']").remove() ;
                               IsHaveDeleteInput = false ;
                           }
                       }
                        $(ClosestForm).attr("action" , Action) ;
                        $(ClosestForm).attr("method" , Method) ;
                    });
                });
            else
                console.log("BulkTools Is undefined");
        });
    });

});

window.onload = function (){

    /*===========================================
	=           Loader Page       =
    =============================================*/
    $(".Loader--Page").ready(function () {
        $(this).find(".Loader--Page").remove();
    });
}


/*===========================================
=           Functions       =
=============================================*/
function closeOutSide(ElementTarget = HTMLElement,
                      CallbackFunc = Function ,
                      ElementEvent = undefined) {
    setTimeout(()=>{
        $(document)[0].addEventListener("click" , EventClick);
    } , 100)
    function EventClick(event) {
        if(!ElementTarget.contains(event.target)) {
            CallbackFunc() ;
            $(document)[0].removeEventListener("click" , EventClick);
        }
    }
}


/*===========================================
=           Notes       =
=============================================*/

/*
    * Solution About "closeOutSide" Function for create more one Event When Click Same Menu Button
    *
 */
