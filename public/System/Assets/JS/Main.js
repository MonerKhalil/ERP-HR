
$(document).ready(function (){

    "use strict" ;

    /*===========================================
	=           Header Page       =
    =============================================*/
    const Header = $(".HeaderPage") ;
    Header.ready(function (){
        $(".HeaderPage .Alert").each(function() {
            $(this).children("i").click(()=> {
                $(this).toggleClass("Open");
                if($(this).hasClass("Open"))
                    closeOutSide($(this)[0] , ()=> {
                        $(this).removeClass("Open");
                    });
            });
        });
        $(".HeaderPage .AccountAlerts > .UserImage").each(function (){
            $(this).children("img").click(() => {
                $(this).toggleClass("Open");
                if($(this).hasClass("Open"))
                    closeOutSide($(this)[0] , ()=> {
                        $(this).removeClass("Open");
                    });
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
        $(this).find(".Form__Select").each((Index , Value) => {
            $(Value).find(".Selector").each((Index_2 , Selector) => {
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
                            $(Selector).addClass("Selected");
                            $(Selector).find(".Selector__Main .Selector__WordChoose")
                                .text($(Value_3).text());
                            ClickSelect($(Value_3).text());
                        });
                    });
                CreateSelect($(Selector).attr("data-name") ,
                    $(Selector).attr("data-required")) ;

                function CreateSelect(Name = String , IsRequired) {
                    const Required = IsRequired ? "required" : "" ;
                    const InputElement = `<input type="text" value="#"
                    name="${Name}" class="Selector__SelectForm" ${Required}>` ;
                    $(Selector).append(InputElement);
                }

                function ClickSelect(OptionSelected = String) {
                    $(Selector).find(".Selector__SelectForm")
                        .attr("value" , OptionSelected);
                }
            });
        });
        $(this).find(".Form__Date").each((Index , Value)=> {
           $(Value).find("input").flatpickr();
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
    }

    function CloseMenu() {
        CloseNavigationsGroup() ;
        Header.removeClass("OpenMenu") ;
        MenuNav.removeClass("Open") ;
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
            closeOutSide($(Value).find(".Popup__Card")[0] , ()=>{
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
    $(document)[0].addEventListener("click" , EventClick);
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
