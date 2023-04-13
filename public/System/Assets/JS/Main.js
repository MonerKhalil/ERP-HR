
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
	=           Form       =
    =============================================*/
    $("form").ready(function (){
        $("form").each((Index , Value)=> {
            $(Value).submit(()=>{
                LoaderView();
            });
        });
    });
    $(".Form").ready(function () {
        $(this).find(".Form__Input--Password").each((Index , Value)=> {
            $(Value).find(".Input__Icon").click((Icon)=>{
                const InputField = $(Value).find(".Input__Field") ;
                const IsView = InputField.attr("type") === 'password' ;
                if(IsView)
                    InputField.attr("type" , "text");
                else
                    InputField.attr("type" , "password");
            });
        });
        $(this).find(".Form__Date").each((Index , Value)=> {
           $(Value).find("input").flatpickr();
        });
    });

    /*===========================================
	=           Selector       =
    =============================================*/
    $(".Selector").ready(function (){
        $(".Selector").each((_ , Selector)=>{
            $(Selector).find(".Selector__Main").click(() => {
                $(Selector).toggleClass("Open");
                closeOutSide($(Selector)[0] , ()=> {
                    $(Selector).removeClass("Open");
                });
            });
            $(Selector).find(".Selector__Options .Selector__Option")
                .each((Index_3 , Value_3) => {
                    $(Value_3).click(() => {
                        $(Selector).toggleClass("Open");
                        ClickSelect($(Value_3).text());
                    });
                });
            CreateSelect($(Selector).attr("data-name") ,
                $(Selector).attr("data-required")) ;
            if($(Selector).attr("data-selected"))
                ClickSelect($(Selector).attr("data-selected")) ;

            function CreateSelect(Name = String , IsRequired) {
                const Required = IsRequired ? "required" : "" ;
                const InputElement = `<input type="text" value="#"
                    name="${Name}" class="Selector__SelectForm" ${Required}>` ;
                $(Selector).append(InputElement);
            }

            function ClickSelect(OptionSelected = String) {
                $(Selector).addClass("Selected");
                $(Selector).find(".Selector__Main .Selector__WordChoose")
                    .text(OptionSelected);
                $(Selector).find(".Selector__SelectForm")
                    .attr("value" , OptionSelected);
            }
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
            // $(Table).find(".Table__BulkTools")
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
