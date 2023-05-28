
$(document).ready(function (){

    "use strict" ;

    const LanguagePage = $("html").get(0).lang ;

    /*===========================================
	=           Authentication Process       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    const Token = $(`meta[name="csrf-token"]`).prop('content') ;
    const RememberStorage = localStorage.getItem("Remember") ;
    $(".AuthenticationPage").ready(function (){
        $(".AuthenticationPage").each((_ , Page) => {
            $(Page).find("#AuthenticationForm").submit(function (){
               const IsRemember = $(Page).find("#RememberMe")
                   .is(':checked') ;
               localStorage.setItem("Remember" , IsRemember) ;
            });
        });
    });
    $(".logoutForm").ready(function (){
        $(".logoutForm").each((_ , Form) => {
           $(Form).submit(function () {
               localStorage.clear() ;
           });
        });
    });
    if(RememberStorage != null && RememberStorage === "true")
        localStorage.setItem("Token" , Token) ;

    /*===========================================
	=           Header Page       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

    const Footer = $(".FooterPage") ;

    /*===========================================
	=           Selector       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    function SelectorOperation( SelectorInfo = {
        Operation : "InitializeSelector" | "SetRequired" | "ResetRequired" | "RemoveAllOption"
            | "SetOption" | "Clone" | "Clear" ,
        Selector : HTMLElement ,
        OptionContent : HTMLElement | undefined ,
        Option : HTMLElement | undefined ,
        InsertOption : {
            Label : String ,
            Value : String
        } | undefined
    }) {
        switch (SelectorInfo.Operation) {
            case "InitializeSelector" :
                InitializeSelectorElement() ;
                break ;
            case "SetRequired" :
                SetRequired() ;
                break ;
            case "ResetRequired" :
                ResetRequired() ;
                break ;
            case "Clone" :
                CloneSelector() ;
                break;
            case "Clear" :
                ClearSelector() ;
                break ;
            case "RemoveAllOption" :
                RemoveAllOption() ;
                break ;
            case "SetOption" :
                SetOption() ;
                break ;
        }

        function InitializeSelectorElement() {

            $(SelectorInfo.Selector).find(".Selector__Main").click(() => {
                $(SelectorInfo.Selector).toggleClass("Open");
                closeOutSide($(SelectorInfo.Selector)[0] , ()=> {
                    $(SelectorInfo.Selector).removeClass("Open");
                });
            });

            CreateSelect($(SelectorInfo.Selector).attr("data-name")
                , $(SelectorInfo.Selector).attr("data-required"));

            $(SelectorInfo.Selector).find(".Selector__Options .Selector__Option")
                .each((Index_3 , Value_3) => {
                    $(Value_3).click(() => {
                        const OptionValue = $(Value_3).attr("data-option");
                        $(SelectorInfo.Selector).toggleClass("Open");
                        ClickSelect($(Value_3).text() , OptionValue);
                    });
                });

            if($(SelectorInfo.Selector).attr("data-selected"))
                DefaultValue($(SelectorInfo.Selector).attr("data-selected")) ;

            function CreateSelect(Name = String , IsRequired) {
                const Required = IsRequired ? "required" : "" ;
                if($(SelectorInfo.Selector).find(".Selector__SelectForm").length > 0) {
                    const InputSelector = $(SelectorInfo.Selector)
                        .find(".Selector__SelectForm").get(0) ;
                    $(InputSelector).attr("name" , Name) ;
                    $(InputSelector).prop('required', Required === "required");
                } else {
                    const InputElement = `<input type="text" value=""
                    name="${Name}" class="Selector__SelectForm" ${Required} hidden>` ;
                    $(SelectorInfo.Selector).append(InputElement);
                }
            }

            function DefaultValue(Value = String) {
                $(SelectorInfo.Selector).find(".Selector__Options .Selector__Option")
                    .each((_ , Option) => {
                        if($(Option).attr("data-option") === Value) {
                            ClickSelect($(Option).text() , Value);
                        }
                    });
            }
        }

        function CloneSelector() {
            $(SelectorInfo.Selector).off()
            InitializeSelectorElement(SelectorInfo.Selector) ;
        }

        function ClearSelector() {
            $(SelectorInfo.Selector).removeClass("Selected");
            $(SelectorInfo.Selector).find(".Selector__Main .Selector__WordChoose")
                .text("");
            $(SelectorInfo.Selector).find(".Selector__SelectForm")
                .attr("value" , "");
            $(SelectorInfo.Selector).attr("data-selected" , "");
        }

        function ResetRequired() {
            $(SelectorInfo.Selector).attr("data-required" , false) ;
            $(SelectorInfo.Selector).find(".Selector__SelectForm")
                .prop("required" , false) ;
        }

        function SetRequired() {
            $(SelectorInfo.Selector).attr("data-required" , true) ;
            $(SelectorInfo.Selector).find(".Selector__SelectForm")
                .prop("required" , true) ;
        }

        function RemoveAllOption() {
            $(SelectorInfo.Selector).find(".Selector__Options")
                .children().remove();
            ClearSelector() ;
        }

        function SetOption() {
            const OptionElement = `
                <li class="Selector__Option"
                    data-option="${SelectorInfo.InsertOption.Value}">
                    ${SelectorInfo.InsertOption.Label}
                </li>
            ` ;
            const NewOption = $(OptionElement).appendTo($(SelectorInfo.Selector)
                .find(".Selector__Options").get(0)) ;
            $(NewOption).click(() => {
                const OptionValue = $(NewOption).attr("data-option");
                $(SelectorInfo.Selector).toggleClass("Open");
                ClickSelect($(NewOption).text() , OptionValue);
            });
        }

        function ClickSelect(OptionSelected = String
            , ValueOption = String) {
            const InputField = $(SelectorInfo.Selector).find(".Selector__SelectForm").get(0) ;
            $(SelectorInfo.Selector).addClass("Selected");
            $(SelectorInfo.Selector).find(".Selector__Main .Selector__WordChoose")
                .text(OptionSelected);
            $(InputField).attr("value" , ValueOption);
            $(InputField).valid() ;
            $(SelectorInfo.Selector).attr("data-selected" , ValueOption);
        }

    }

    $(".Selector").ready(function (){
        $(".Selector").each((_ , Selector)=> {
            SelectorOperation({
                Operation : "InitializeSelector" ,
                Selector : Selector
            }) ;
        });
    });

    /*===========================================
	=           Multi Selector       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    $(".MultiSelector").ready(function (){
        $(".MultiSelector").each((_ , MultiSelector)=> {
            $(MultiSelector).find(".MultiSelector__Main").click(() => {
                $(MultiSelector).toggleClass("Open");
                closeOutSide($(MultiSelector)[0] , ()=> {
                    $(MultiSelector).removeClass("Open");
                });
            });
            $(MultiSelector).find(".MultiSelector__InputCheckBox").on("change" , CheckBoxCountChecked);

            function CheckBoxCountChecked() {
                let Counter = $(MultiSelector)
                    .find(".MultiSelector__InputCheckBox:checked").length ;
                if(Counter === 0) {
                    $(MultiSelector).find(".MultiSelector__WordChoose")
                        .text("") ;
                    $(MultiSelector).removeClass("Selected") ;
                } else {
                    $(MultiSelector).find(".MultiSelector__WordChoose")
                        .text((LanguagePage === "ar") ? `${Counter} من العناصر تم اختيارهم` : `${Counter} Selected`) ;
                    $(MultiSelector).addClass("Selected") ;
                }
                console.log(Counter) ;
            }
        });
    });

    /*===========================================
	=           Form       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    function FormOperation(FormInfo = {
        Operation : "InitializeForm" | "RefreshValidationForm" |
            "CloneFields" | "DisabledForm" | "EnabledForm" | "RestFields"
            | "IgnoreField" | "NotIgnoreField" ,
        FormElement : HTMLFormElement ,
        ClonePart : {
            ElementTarget : HTMLElement | undefined ,
            ElementPart : HTMLElement ,
            WithClear : false
        } | undefined
    }) {

        switch (FormInfo.Operation) {
            case "InitializeForm" :
                InitializeForm() ;
                RefreshValidationForm() ;
                break ;
            case "RefreshValidationForm" :
                RefreshValidationForm() ;
                break ;
            case "CloneFields" :
                CloneField() ;
                RefreshValidationForm() ;
                break ;
            case "NotIgnoreField" :
                ActiveField() ;
                break ;
            case "IgnoreField" :
                IgnoreField() ;
                break
            case "DisabledForm" :
                DisabledField() ;
                break ;
            case "EnabledForm" :
                EnabledField() ;
                break ;
            case "RestFields" :
                ClearFields(FormInfo.ClonePart.ElementTarget) ;
                break ;
        }

        function InitializeForm() {
            if($(FormInfo.FormElement).hasClass("FilterForm")) {
                const ActionForm = $(FormInfo.FormElement).attr("action") ;
                const Params = GetFullParams() ;
                if(Params !== undefined)
                    $(FormInfo.FormElement).attr("action" , `${ActionForm}?${Params}`);
            }
            $(FormInfo.FormElement).find("input , textarea").each((_ , Field) => {
                $(Field).attr("data-FieldID" , 1) ;
            });
            $(FormInfo.FormElement).find("input:not(.Date__Field) , textarea").each((_ , Field) => {
                $(Field).on("blur" , function () {
                    $(Field).valid() ;
                });
            });
            $(FormInfo.FormElement).find(".Form__Input--Password").each((_ , Field)=> {
                InitialFieldPassword(Field);
            });
            $(FormInfo.FormElement).find(".Form__Date").each((_ , Field)=> {
                InitialFieldDate(Field) ;
            });
            $(FormInfo.FormElement).find(".Form__UploadFile").each((_ , UploadFile) => {
                InitialFieldUpload(UploadFile) ;
            });
            $(FormInfo.FormElement).find(".RestButton").each((_ , Buttons) => {
                $(Buttons).click(()=> {
                    ClearFields(FormInfo.FormElement) ;
                });
            });
            $(FormInfo.FormElement).find(".TextEditor").each((_ , TextEditor) => {
                InitialFieldEditor(TextEditor) ;
            });
        }

        function RefreshValidationForm() {
            $(FormInfo.FormElement).removeData("validator") ;
            $(FormInfo.FormElement).removeData("unobtrusiveValidation") ;
            $.validator.addMethod("RegexPassword"
                , function (Value) {
                    return /^([a-zA-Z0-9@*#]{8,15})$/.test(Value) ;
                } ,
                LanguagePage === "ar" ? "يجب ان تكون كلمة السر تحتوي من 8 الى 15 رمز"
                    : "The password must contain from 8 to 15 characters");
            $(FormInfo.FormElement).validate({

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
        }

        function InitialFieldPassword(Field = HTMLElement) {
            $(Field).find(".Input__Icon").click(()=>{
                const InputField = $(Field).find(".Input__Field") ;
                const IsView = InputField.attr("type") === 'password' ;
                if(IsView)
                    InputField.attr("type" , "text");
                else
                    InputField.attr("type" , "password");
            });
        }

        function InitialFieldDate(Field = HTMLElement) {
            const Input = $(Field).find("input").get(0) ;
            let FlatPickerObject ;
            if($(Input).hasClass("RangeData")) {
                const InputAria = $(Field).find(".Date__Area").get(0) ;
                let IsDetermine = $(InputAria).find(".StartDate").length > 0 ;
                const InputStartDate = $(Input).attr("date-StartDateName") ;
                const InputEndDate = $(Input).attr("date-EndDateName") ;
                FlatPickerObject = $(Input).flatpickr({
                    mode: "range" ,
                    onClose: function(selectedDates, dateStr, instance) {
                        if(selectedDates.length > 1) {
                            AddValue(selectedDates, dateStr, instance) ;
                        } else {
                            DeleteValue() ;
                        }
                        $(Input).valid() ;
                    }
                });
                $(Input).on("change" , function () {
                    if($(Input).val() === "")
                        DeleteValue() ;
                })
                DeleteValue() ;

                function AddValue(selectedDates, dateStr, instance) {
                    let dateStart = instance.formatDate(selectedDates[0], "d/m/Y");
                    let dateEnd = instance.formatDate(selectedDates[1], "d/m/Y");
                    if(dateStart && dateEnd) {
                        if(new Date(dateStart).getTime() >
                            new Date(dateEnd).getTime()) {
                            let Temp = dateEnd ;
                            dateStart = dateEnd ;
                            dateEnd = Temp ;
                        }
                        if(IsDetermine) {
                            const StartDateInput = $(InputAria).find(".StartDate").get(0) ;
                            const EndDateInput = $(InputAria).find(".EndDate").get(0) ;
                            $(StartDateInput).attr("value" , dateStart) ;
                            $(EndDateInput).attr("value" , dateEnd) ;
                        } else {
                            const InputElements = `
                                        <input class="IgnoreValidate StartDate" type="hidden"
                                               name="${InputStartDate}" value="${dateStart}">
                                        <input class="IgnoreValidate EndDate" type="hidden"
                                               name="${InputEndDate}" value="${dateEnd}">
                                    `;
                            $(InputAria).append(InputElements) ;
                            IsDetermine = true ;
                        }
                    }
                }

                function DeleteValue() {

                    if(IsDetermine) {
                        const StartDateInput = $(InputAria).find(".StartDate").get(0) ;
                        const EndDateInput = $(InputAria).find(".EndDate").get(0) ;
                        $(StartDateInput).remove() ;
                        $(EndDateInput).remove() ;
                        IsDetermine = false ;
                    }

                }

            } else if($(Input).hasClass("DateMinToday")) {
                FlatPickerObject = $(Input).flatpickr({
                    minDate: "today"
                });
            } else if($(Input).hasClass("DateEndFromStart")) {
                const TargetDateStartName = $(Input).attr("data-StartDateName") ;
                if(TargetDateStartName !== undefined) {
                    const EndDateObject = FlatPickerObject = $(Input).flatpickr({
                        disable: [
                            function() {
                                return true;
                            }
                        ]
                    });
                    const DateStartEle = $(document)
                        .find(`.Date__Field[TargetDateStartName="${TargetDateStartName}"]`).get(0) ;
                    $(DateStartEle).on("change" , function () {
                        DateEndSet() ;
                    });
                    if(DateStartEle._flatpickr.selectedDates.length > 0) {
                        DateEndSet() ;
                        if($(Input).attr("value")) {
                            EndDateObject.setDate($(Input).attr("value")) ;
                        }
                    }

                    function DateEndSet() {
                        const CurrentSelected = DateStartEle._flatpickr.selectedDates ;
                        EndDateObject.set("disable" , []) ;
                        EndDateObject.clear();
                        EndDateObject.set("minDate" , CurrentSelected[0]) ;
                    }
                }
            } else if($(Input).hasClass("MultiDate")) {
                FlatPickerObject = $(Input).flatpickr({
                    mode: "multiple"
                });
            } else if($(Input).hasClass("TimeNoDate")) {
                FlatPickerObject = $(Input).flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i"
                });
            } else {
                FlatPickerObject = $(Input).flatpickr();
            }
            if($(Input).hasClass("MinimumNow")) {
                FlatPickerObject.set("minDate" , new Date());
            }

            if(!$(Input).hasClass("RangeData")) {
                FlatPickerObject.set("onClose" , function() {
                    $(Input).valid() ;
                });
            }

        }

        function InitialFieldUpload(Field = HTMLElement) {

            const FieldComponent = $(Field).find(".FileUpload").get(0) ;
            const InputFile = $(FieldComponent).find(".FileUpload__InputFile").get(0) ;
            const FieldValue = $(FieldComponent).find(".FileUpload__FileName").get(0) ;
            $(InputFile).on("change" , function () {
                AddFile($(InputFile).val()) ;
            });
            if($(InputFile).attr("value"))
                AddFile($(InputFile).attr("value")) ;

            function AddFile(PathFile) {
                $(FieldComponent).addClass("Selected") ;
                $(FieldValue).text(PathFile) ;
                $(InputFile).attr("value" , PathFile) ;
            }


            if($(Field).find(".UploadFile__Field").attr("value") !== "") {
                $(Field).find(".UploadFile__Area")
                    .addClass("SelectedFile") ;
            }
            $(Field).find(".UploadFile__Field").on("change" , (ev) => {
                const PathFile = $(ev.target).val() ;
                if(PathFile !== undefined && PathFile !== "")
                    $(Field).find(".UploadFile__Area")
                        .addClass("SelectedFile") ;
                else
                    $(Field).find(".UploadFile__Area")
                        .removeClass("SelectedFile") ;
            });
        }

        function InitialFieldEditor(TextEditor = HTMLElement) {
            const Model = $(TextEditor).trumbowyg({
                lang: LanguagePage === "ar" ? 'ar' : 'en' ,
                tagsToRemove: ['script' , 'link'] ,
                btns: [
                    ['viewHTML'],
                    ['undo', 'redo'],
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['superscript', 'subscript'],
                    ['link'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                ]
            }).get(0) ;
            $(Model).on("tbwinit" , function () {
                $('.trumbowyg-editor').on("blur" , function(){
                    $(TextEditor).valid() ;
                });
            });
        }

        function ActiveField() {
            $(FormInfo.ClonePart.ElementPart)
                .find("input , textarea").each((_ , Field) => {
                $(Field).removeClass("IgnoreValidate");
            });
            RefreshValidationForm() ;
        }

        function IgnoreField() {
            $(FormInfo.ClonePart.ElementPart)
                .find("input , textarea").each((_ , Field) => {
                    $(Field).addClass("IgnoreValidate");
            });
            RefreshValidationForm() ;
        }

        function DisabledField() {
            $(FormInfo.ClonePart.ElementPart).find("input , textarea")
                .each((_ , Value) => {
                    $(Value).prop("disabled" , true) ;
                });
        }

        function EnabledField() {
            $(FormInfo.ClonePart.ElementPart).find("input , textarea")
                .each((_ , Value) => {
                    $(Value).prop("disabled" , false) ;
                });
        }

        function CloneField() {
            $(FormInfo.ClonePart.ElementPart).off() ;
            $(FormInfo.ClonePart.ElementPart).find("input , textarea").each((_ , Field) => {
                const FieldCloneNum = Number($(Field).attr("data-FieldID")) + 1 ;
                $(Field).attr("data-FieldID" , FieldCloneNum) ;
                if(FieldCloneNum) {
                    const OldInputID = $(Field).attr("id") ;
                    if(OldInputID) {
                        const NewInputID = `${OldInputID}_${FieldCloneNum}` ;
                        $(Field).attr("id" , NewInputID) ;
                        $(Field).siblings("label").attr("for" , NewInputID) ;
                    }
                } else {
                    $(Field).attr("data-FieldID" , 1) ;
                }
            });
            $(FormInfo.ClonePart.ElementTarget).find("input , textarea").each((_ , Field) => {
                const FieldCloneNum = Number($(Field).attr("data-FieldID")) + 1 ;
                $(Field).attr("data-FieldID" , FieldCloneNum) ;
            });
            $(FormInfo.ClonePart.ElementPart).find("input:not(.Date__Field) , textarea").each((_ , Field) => {
                $(Field).on("blur" , function () {
                    $(Field).valid() ;
                });
            });
            $(FormInfo.ClonePart.ElementPart).find(".Form__Input").each((_ , Field) => {
                if(FormInfo.ClonePart.WithClear)
                    $(Field).find("Input__Field").val("") ;
            });
            $(FormInfo.ClonePart.ElementPart).find(".Form__Input--Password").each((_ , Field)=> {
                if(FormInfo.ClonePart.WithClear)
                    $(Field).find(".Input__Field").val("") ;
                InitialFieldPassword(Field);
            });
            $(FormInfo.ClonePart.ElementPart).find(".Form__Date").each((_ , Field)=> {
                if(FormInfo.ClonePart.WithClear)
                    $(Field).find(".Date__Field").val("") ;
                InitialFieldDate(Field);
            });
            $(FormInfo.ClonePart.ElementPart).find(".Form__UploadFile").each((_ , UploadFile) => {
                if(FormInfo.ClonePart.WithClear) {
                    $(UploadFile).find(".UploadFile__Area")
                        .removeClass("SelectedFile") ;
                    $(UploadFile).find(".UploadFile__Field").val("");
                }
                InitialFieldUpload(UploadFile) ;
            });
            $(FormInfo.ClonePart.ElementPart).find(".TextEditor").each((_ , TextEditor) => {
                if(FormInfo.ClonePart.WithClear)
                    $(FormInfo.ClonePart.ElementPart).find(".Textarea__Field").val("") ;
                InitialFieldEditor(TextEditor) ;
            });
            $(FormInfo.ClonePart.ElementPart).find(".Selector").each((_ , Selector) => {
                if(FormInfo.ClonePart.WithClear)
                    SelectorOperation({
                        Operation : "Clear" ,
                        Selector : Selector ,
                    }) ;
                SelectorOperation({
                    Operation : "Clone" ,
                    Selector : Selector ,
                }) ;
            });
        }

        function ClearFields(PartOfForm = HTMLElement) {
            $(PartOfForm).find(`.Input__Field , .Textarea__Field`)
                .each((_ , Field) => {
                    $(Field).val("");
                });
            $(PartOfForm).find(".Date__Field").each((_ , Field) => {
                Field._flatpickr.clear();
            });
            $(PartOfForm).find(`.Selector`).each((_ , Selector) => {
                SelectorOperation({
                    Operation : "Clear" ,
                    Selector : Selector
                });
            });
        }
    }

    $(".Form").ready(function () {
        $(".Form").each((_ , Form) => {
            FormOperation({
                Operation : "InitializeForm" ,
                FormElement : Form ,
            });
        });
    });

    $(".AnchorSubmit").ready(function () {
        $(".AnchorSubmit").each((_ , Anchor) => {
            const FormName = $(Anchor).attr("data-form") ;
            $(Anchor).click(() => {
                $(document).find(`form[name="${FormName}"]`).submit() ;
            });
        });
    });

    /*===========================================
	=           Menu And Header       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

    $(".Dropdown").ready(function (){
        $(".Dropdown").each((_ , Dropdown)=>{
            $(Dropdown).on("ShowChange" , function (){
                if($(Dropdown).hasClass("Show"))
                    closeOutSide($(Dropdown)[0] , ()=>{
                        $(Dropdown).removeClass("Show");
                        console.log("Dropdown") ;
                    });
            });
        });
    });

    /*===========================================
	=           Drag & Drop       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

    $(".DragDropClick").ready(function (){

    });

    /*===========================================
	=           Table Layout       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    $(".Table").ready(function () {
        $(".Table").each((_ , Table) => {
            const BulkTools =  $(Table).find(".Table__BulkTools").get(0) ?? undefined ;
            $(Table).find(".Table__Table").each((_ , List) => {
                $(List).find(".HeaderList").each((_ , HeaderList) => {
                    $(HeaderList).find(".CheckBoxItem").change((ev) => {
                        if($(ev.currentTarget).is(":checked")) {
                            $(List).find(".DataItem").each((_ , Item) => {
                                $(Item).find(".CheckBoxItem").prop('checked', true);
                            }) ;
                            BulkVisible(true) ;
                        }
                        else {
                            $(List).find(".DataItem").each((_ , Item) => {
                                $(Item).find(".CheckBoxItem").prop('checked', false);
                            }) ;
                            BulkVisible(false) ;
                        }
                    });
                });
                $(List).find(".DataItem").each((_ , DataItem) => {
                    $(DataItem).find(".CheckBoxItem").change((ev) => {
                        const CheckBoxHeader = $(List).find(".HeaderList .CheckBoxItem") ;
                        BulkVisible($(List).find(".CheckBoxItem:checked").length > 0) ;
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
            $(Table).find(".Table__PrintMenu").each((_ , PrintMenu) => {
                $(PrintMenu).find(".PrintMenu__Button").click(() => {
                    $(PrintMenu).find(".PrintMenu__Menu.Dropdown")
                        .addClass("Show").trigger("ShowChange") ;
                });
            });
            $(Table).find(".Item__Col.MoreDropdown").each((_ , MoreDropdown) => {
                const DropdownMenu = $(MoreDropdown).find(".Dropdown").get(0) ;
               $(MoreDropdown).find(".More__Button").click(() => {
                   $(DropdownMenu).toggleClass("Show")
                       .trigger("ShowChange") ;
               });
            });

            function BulkVisible(IsVisible = Boolean) {
                if(BulkTools && IsVisible)
                    $(BulkTools).addClass("Show") ;
                else
                    $(BulkTools).removeClass("Show") ;
            }
        });
    });

    /*===========================================
	=           Cookies Page       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

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

    /**
     * @author Amir Alhloo
     */

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
                           $(ClosestForm).attr("method" , "post") ;
                       } else {
                           if(IsHaveDeleteInput) {
                               $(Bulk).find("input[value='delete']").remove() ;
                               IsHaveDeleteInput = false ;
                           }
                           $(ClosestForm).attr("method" , Method) ;
                       }
                        $(ClosestForm).attr("action" , Action) ;
                    });
                });
            else
                console.log("BulkTools Is undefined");
        });
    });

    /*===========================================
	=           Message Process Component       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    $(".MessageProcess").ready(function (){
        $(".MessageProcess").each((_ , Message) => {
            $(Message).find(".MessageProcess__Close")
                .click(() => {
                    $(Message).remove();
                });
        });
    });

    /*===========================================
	=           Notification Component       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    $(".Notification").ready(function() {
        $(".Notification").each((_ , Notification) => {
            $(Notification).find(".Notification__Remove i").click(() => {
                LoaderView() ;
                $.ajax({
                   url : "d" ,
                   type : "delete" ,
                   dataType : 'text' ,
                }).done(() => {
                    LoaderHidden() ;
                    $(Notification).remove() ;
                }).fail(() => {
                    LoaderHidden() ;
                });
            });
        });
    });

    /*===========================================
	=           Filter Selector       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    function initializeFilterSelector(SelectorInfo = {
        Operation : "InitializeMainSelector" | "InitializeTargetSelector" ,
        MainSelector : HTMLElement ,
        TargetSelector : HTMLElement ,
    }) {

        switch (SelectorInfo.Operation) {
            case "InitializeMainSelector" :
                initializeMainSelector() ;
                break ;
            case "InitializeTargetSelector" :
                initializeSubSelectorBefore() ;
                break ;
        }

        function initializeMainSelector() {
            const TargetName = $(SelectorInfo.MainSelector).attr("data-TargetSelectorName") ;
            const RouteURL = $(SelectorInfo.MainSelector).attr("data-Route") ;
            const Method = $(SelectorInfo.MainSelector).attr("data-Method") ;
            const DataName = $(SelectorInfo.MainSelector).attr("data-ParamsName") ;
            let SelectorTarget = undefined ;
            $(document).find(".FilterSelectorTarget")
                .each((_ , FilterSelectorTarget) => {
                    const SelectorName = $(FilterSelectorTarget)
                        .find(".Selector").attr("data-name");
                    if(SelectorName === TargetName)
                        SelectorTarget = FilterSelectorTarget ;
                });
            if(SelectorTarget === undefined)
                return ;
            $(SelectorInfo.MainSelector).find(".Selector .Selector__Options .Selector__Option")
                .click((ev) => {
                    LoaderView() ;
                    const ValueName = $(ev.target).attr("data-option") ;
                    $.ajax({
                        url: `${RouteURL}?${DataName}=${ValueName}`,
                        type: `${Method}`,
                        dataType: "json",
                        success : function (ResponseData) {
                            const OptionsContent = $(SelectorTarget)
                                .find(".Selector .Selector__Options").get(0) ;
                            /* Foreach on ResponseData Var To Append into Options Element */
                            initializeSubSelectorAfter(SelectorTarget);
                        }
                    }).done(() => {
                        LoaderHidden() ;
                    }).fail(() => {
                        LoaderHidden() ;
                    });
                });
        }

        function initializeSubSelectorBefore() {
            $(SelectorInfo.TargetSelector).hide() ;
            $(SelectorInfo.TargetSelector).off() ;
        }

        function initializeSubSelectorAfter(SelectorParent = HTMLElement) {
            const SelectorTarget = $(SelectorParent).find(".Selector").get(0) ;
            SelectorOperation({
                Operation : "InitializeSelector" ,
                Selector : SelectorTarget
            });
            if($(SelectorParent).hasClass("FilterSelector"))
                initializeFilterSelector({
                    Operation : "InitializeMainSelector" ,
                    MainSelector : SelectorParent
                });
            $(SelectorParent).show() ;
        }

        // function DeactivateSubSelector() {
        //
        // }
    }


    $(".FilterSelector").ready(function() {
        $(".FilterSelector:not(.FilterSelectorTarget)").each((_ , FilterSelector) => {
            initializeFilterSelector({
                Operation : "InitializeMainSelector" ,
                MainSelector : FilterSelector
            });
        });
        $(".FilterSelectorTarget").each((_ , SelectorTarget) => {
            initializeFilterSelector({
                Operation : "InitializeTargetSelector" ,
                TargetSelector : SelectorTarget
            });
        });
    });

    /*===========================================
	=           Selector2Readonly       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    function OperationSelector2ReadOnly(SelectorInfo = {
        MainSelector : HTMLElement ,
        Operation : "SelectorInit" | "SelectorRest"
    }) {

        switch (SelectorInfo.Operation) {
            case "SelectorInit" :
                SelectorInit();
                break ;
            case "SelectorRest" :
                SelectorRest();
                break ;
        }

        function SelectorInit() {
            const ClassContainer = $(SelectorInfo.MainSelector).attr("data-ClassContainer") ;
            const FieldsName = $(SelectorInfo.MainSelector).attr("data-ReadonlyNames") ;
            const Location = $(SelectorInfo.MainSelector).attr("data-Location") ;
            const TitleReadOnly = $(SelectorInfo.MainSelector).attr("data-TitleField") ;
            const MinFieldsRead = Number($(SelectorInfo.MainSelector).attr("data-RequiredNum")) ;
            const MaxFieldsRead = Number($(SelectorInfo.MainSelector).attr("data-MaxRequiredNum")) ;
            let ValuesDefault = undefined  ;
            let AllValues = $(SelectorInfo.MainSelector)
                .find(".Selector .Selector__Options .Selector__Option").length ;

            $(SelectorInfo.MainSelector).attr("CounterID" , 0) ;
            $(SelectorInfo.MainSelector).attr("ValueSelectedNum" , 0) ;

            if($(SelectorInfo.MainSelector).attr("data-DefaultValues") !== undefined)
                ValuesDefault = $(SelectorInfo.MainSelector).attr("data-DefaultValues").split(",");

            $(SelectorInfo.MainSelector).find(".Selector .Selector__Options .Selector__Option")
                .each((_ , OptionElement) => {
                    if(ValuesDefault !== undefined) {
                        const TempValue = $(OptionElement).attr("data-option") ;
                        for (let i = 0; i < ValuesDefault.length ; i++) {
                            if(ValuesDefault[i] === TempValue)
                                SelectedOption(OptionElement) ;
                        }
                    }
                    $(OptionElement).click(() => {
                        SelectedOption(OptionElement) ;
                    });
                });

            function SelectedOption(OptionSelector = HTMLElement) {
                const OptionValue = $(OptionSelector).attr("data-option") ;
                const OptionLabel = $(OptionSelector).text() ;
                const OptionForm = $(OptionSelector).closest("form").get(0) ;
                let CounterID = Number($(SelectorInfo.MainSelector).attr("CounterID")) ;
                let ValueSelected = Number($(SelectorInfo.MainSelector).attr("ValueSelectedNum")) ;
                const ReadOnlyElement = $(`
                        <div class="ReadonlySelector ${ClassContainer}">
                            <div class="Form__Group">
                                <div class="Form__FieldReadOnly">
                                    <div class="FieldReadOnly__Area">
                                        <input id="LeaderSession${CounterID}"
                                               class="FieldReadOnly__Field"
                                               style="color: transparent"
                                               type="text" name="${FieldsName}"
                                               value="${OptionValue}" readonly
                                               placeholder="Test" required >
                                        <label class="FieldReadOnly__Label"
                                               for="LeaderSession${CounterID}">
                                               ${TitleReadOnly}
                                       </label>
                                        <span class="FieldReadOnly__Value">${OptionLabel}</span>
                                        <i class="material-icons FieldReadOnly__Close">
                                            cancel
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).get(0) ;
                if(Location === "Before")
                    $(SelectorInfo.MainSelector).before($(ReadOnlyElement)) ;
                else
                    $(SelectorInfo.MainSelector).after($(ReadOnlyElement)) ;
                $(ReadOnlyElement).find(".FieldReadOnly__Close").click(() => {
                    $(OptionSelector).show() ;
                    if(ValueSelected === AllValues)
                        $(SelectorInfo.MainSelector).show();
                    ValueSelected-- ;
                    if(ValueSelected < MinFieldsRead)
                        SelectorOperation({
                            Operation : "SetRequired" ,
                            Selector : $(SelectorInfo.MainSelector).find(".Selector").get(0) ,
                        });
                    if(ValueSelected < MaxFieldsRead) {
                        $(SelectorInfo.MainSelector).show();
                        SelectorOperation({
                            Operation : "SetRequired" ,
                            Selector : $(SelectorInfo.MainSelector).find(".Selector").get(0) ,
                        });
                    }
                    $(ReadOnlyElement).remove();
                    FormOperation({
                        Operation : "RefreshValidationForm",
                        FormElement : OptionForm
                    });
                    $(SelectorInfo.MainSelector).attr("ValueSelectedNum" , ValueSelected);
                });
                $(OptionSelector).hide() ;
                SelectorOperation({
                    Operation : "Clear" ,
                    Selector : $(SelectorInfo.MainSelector).find(".Selector").get(0) ,
                });
                ValueSelected++ ;
                if(ValueSelected >= MinFieldsRead) {
                    SelectorOperation({
                        Operation : "ResetRequired",
                        Selector : $(SelectorInfo.MainSelector).find(".Selector").get(0) ,
                    });
                } else if(ValueSelected >= MaxFieldsRead) {
                    SelectorOperation({
                        Operation : "ResetRequired",
                        Selector : $(SelectorInfo.MainSelector).find(".Selector").get(0) ,
                    });
                    $(SelectorInfo.MainSelector).hide();
                }
                if(ValueSelected === AllValues)
                    $(SelectorInfo.MainSelector).hide();
                FormOperation({
                    Operation : "RefreshValidationForm",
                    FormElement : OptionForm
                });
                $(SelectorInfo.MainSelector).attr("CounterID" , CounterID) ;
            }
        }

        function SelectorRest() {
            $(SelectorInfo.MainSelector).attr("CounterID" , 0) ;
            $(SelectorInfo.MainSelector).attr("ValueSelectedNum" , 0) ;

        }

    }

    $(".Selector2Readonly").ready(function () {
        $(".Selector2Readonly").each((_ , ParentSelector) => {
            OperationSelector2ReadOnly({
                MainSelector : ParentSelector ,
                Operation : "SelectorInit"
            });
        });
    });

    /*===========================================
	=           Menu Popper      =
    =============================================*/

    /*
    * for fix overflow
    */

    /**
     * @author Amir Alhloo
     */

    $(".MenuPopper").ready(function (){
        $(".MenuPopper").each((_ , MenuObject) => {
            const MenuName = $(MenuObject).attr("data-MenuName") ;
            const TargetMenu = $(document)
                .find(`.MenuTarget[data-MenuName="${MenuName}"]`).get(0) ;
            if(TargetMenu === undefined)
                return ;
            if($(TargetMenu).hasClass("Dropdown")) {
                const ParentMenu = $(TargetMenu).parent().get(0) ;
                const PopperDropdown = Popper.createPopper(MenuObject
                    , TargetMenu , {
                        placement: (LanguagePage === "ar") ? 'bottom-start' : 'bottom-end',
                    });
                $(TargetMenu).on("ShowChange" , function (){
                    if($(TargetMenu).hasClass("Show")) {
                        $(TargetMenu).appendTo("body") ;
                        PopperDropdown.update();
                        closeOutSide($(TargetMenu)[0] , ()=>{
                            $(TargetMenu).appendTo(ParentMenu) ;
                            PopperDropdown.update();
                        });
                    }
                });
            }
        });
    });


    /*===========================================
    =           Fields Visibility        =
    =============================================*/

    function initializeFieldsVisibility(FieldInfo = {
        Operation : "InitializeVisibilityOption" | "InitializeVisibilityTarget" ,
        VisibilityOption : HTMLElement ,
        VisibilityTarget : HTMLElement ,
    }) {

        switch (FieldInfo.Operation) {
            case "InitializeVisibilityOption" :
                InitVisibilityOption() ;
                break ;
            case "InitializeVisibilityTarget" :
                InitVisibilityTarget() ;
                break ;
        }

        function InitVisibilityOption() {
            const TargetName = $(FieldInfo.VisibilityOption).attr("data-ElementsTargetName") ;
            const DataDefault =$(FieldInfo.VisibilityOption).attr("data-VisibilityDefault") ;
            $(FieldInfo.VisibilityOption).find(".Selector").each((_ , Selectors) => {
                $(Selectors).find(".Selector__Option").each((_ , Option) => {
                    const ValueOption = $(Option).attr("data-option") ;
                    $(Option).click(() => {
                        TriggerName(TargetName , ValueOption);
                    });
                });
                if(DataDefault)
                    TriggerName(TargetName , DataDefault) ;
                else
                    TriggerName(TargetName , '') ;
            }) ;
            $(FieldInfo.VisibilityOption).find(".MultiSelector").each((_ , MultiSelector) => {
                $(MultiSelector).find(".MultiSelector__Option .MultiSelector__InputCheckBox")
                    .each((_ , OptionCheckbox) => {
                        TriggerNameMulti(TargetName , $(OptionCheckbox).attr("name")
                            , $(OptionCheckbox).is(":checked")) ;
                    $(OptionCheckbox).on("change" , function () {
                        TriggerNameMulti(TargetName , $(OptionCheckbox).attr("name")
                            , $(OptionCheckbox).is(":checked")) ;
                    });
                });
            });
            $(FieldInfo.VisibilityOption).find(".CheckBox__Input").on('change', ()=>{
                TriggerName(TargetName , $(this).val());
            }) ;
        }

        function InitVisibilityTarget() {

        }

        function TriggerName(NameElement = String , ValueSelected = String) {
            $(".VisibilityTarget").each((_ , VisibilityTarget) => {
                const ElementName =  $(VisibilityTarget).attr("data-TargetName") ;
                if(ElementName === NameElement) {
                    const ElementValue = $(VisibilityTarget).attr("data-TargetValue").split(",") ?? undefined ;
                    {
                        $(VisibilityTarget).hide();
                        $(VisibilityTarget).find(".Form__Group").each((_ , FieldGroup) => {
                            const FormElement = $(FieldGroup).closest("form").get(0) ;
                            FormOperation({
                                Operation : "IgnoreField" ,
                                FormElement : FormElement ,
                                ClonePart : {
                                    ElementPart : FieldGroup ,
                                }
                            });
                            FormOperation({
                                Operation : "DisabledForm" ,
                                FormElement : FormElement ,
                                ClonePart : {
                                    ElementPart : FieldGroup
                                }
                            })
                        });
                    }

                    if(ElementValue !== undefined)
                        for (let i = 0; i < ElementValue.length; i++)
                            if(ElementValue[i] === ValueSelected){
                                {
                                    $(VisibilityTarget).show();
                                    $(VisibilityTarget).find(".Form__Group").each((_ , FieldGroup) => {
                                        const FormElement = $(FieldGroup).closest("form").get(0) ;
                                        FormOperation({
                                            Operation : "NotIgnoreField" ,
                                            FormElement : FormElement ,
                                            ClonePart : {
                                                ElementPart : FieldGroup ,
                                            }
                                        });
                                        FormOperation({
                                            Operation : "EnabledForm" ,
                                            FormElement : FormElement ,
                                            ClonePart : {
                                                ElementPart : FieldGroup ,
                                            }
                                        });
                                    });
                                }
                                break ;
                            }
                }
            });
        }

        function TriggerNameMulti(NameElement = String , NameCheckBox = String
                                  , IsChecked = Boolean) {
            $(".VisibilityTarget").each((_ , VisibilityTarget) => {
                let CheckedNumOption = Number($(VisibilityTarget).attr("data-CheckedNumber"));
                if(!CheckedNumOption) {
                    $(VisibilityTarget).attr("data-CheckedNumber" , 0) ;
                    CheckedNumOption = 0 ;
                }
                const ElementName = $(VisibilityTarget).attr("data-TargetName");
                if(ElementName === NameElement) {
                    const CheckboxesName = $(VisibilityTarget).attr("data-TargetCheckboxName")
                        .split(",") ?? undefined ;
                    for (let i = 0; i < CheckboxesName.length ; i++) {
                        if(CheckboxesName[i] === NameCheckBox) {
                            if(IsChecked)
                                CheckedNumOption++ ;
                            else if(CheckedNumOption > 0)
                                CheckedNumOption-- ;
                            break ;
                        }
                    }
                    if(CheckedNumOption > 0) {
                        $(VisibilityTarget).find(".Form__Group").each((_ , FieldGroup) => {
                            const FormElement = $(FieldGroup).closest("form").get(0) ;
                            FormOperation({
                                Operation : "NotIgnoreField" ,
                                FormElement : FormElement ,
                                ClonePart : {
                                    ElementPart : FieldGroup ,
                                }
                            });
                            FormOperation({
                                Operation : "EnabledForm" ,
                                FormElement : FormElement ,
                                ClonePart : {
                                    ElementPart : FieldGroup ,
                                }
                            });
                        });
                        $(VisibilityTarget).show();
                    }
                    else {
                        $(VisibilityTarget).find(".Form__Group").each((_ , FieldGroup) => {
                            const FormElement = $(FieldGroup).closest("form").get(0) ;
                            FormOperation({
                                Operation : "IgnoreField" ,
                                FormElement : FormElement ,
                                ClonePart : {
                                    ElementPart : FieldGroup ,
                                }
                            });
                            FormOperation({
                                Operation : "DisabledForm" ,
                                FormElement : FormElement ,
                                ClonePart : {
                                    ElementPart : FieldGroup
                                }
                            })
                        });
                        $(VisibilityTarget).hide();
                    }
                    $(VisibilityTarget).attr("data-CheckedNumber" , CheckedNumOption) ;
                }
            });
        }

    }

    $(".VisibilityOption").ready(function () {
        $(".VisibilityOption").each((_ , VisibilityOption) => {
            initializeFieldsVisibility({
                Operation : "InitializeVisibilityOption" ,
                VisibilityOption : VisibilityOption ,
                VisibilityTarget : undefined
            });
        });
    });

    /*===========================================
	=           Duplicate Form       =
    =============================================*/

    /**
     * @author Anas Bakkar
     */

    $("#duplicateDoc").click(function(){
        const Clone = $("#documentForm").last().clone(false);
        const Form = $("#documentForm").closest(".Form").get(0) ;
        Clone.appendTo($("#parentForm"));
        FormOperation({
            Operation : "CloneFields" ,
            FormElement : Form ,
            ClonePart : {
                ElementPart : Clone ,
                WithClear : true
            }
        });
    });

    /*===========================================
	=           Duplicate Form       =
    =============================================*/

    /**
     * @author Amir Alhloo
     */

    function DuplicateFrom(InfoParam = {
        MainForm : HTMLFormElement ,
        ButtonClone : HTMLElement ,
        TargetElement : HTMLElement ,
        ParentContainer : HTMLElement ,
        Operation : "InitClone" | "RestByRemove" | "RestByClearData" | "ChangeTargetClone" ,
        ClearClone : Boolean
    }) {
        let CloneElement = undefined ;

        switch (InfoParam.Operation) {
            case "InitClone" :
                InitializeDuplicateFrom() ;
                break ;
            case "RestByRemove" :
                RestByRemove() ;
                break ;
            case "RestByClearData" :
                RestByClearData() ;
                break ;
            case "ChangeTargetClone" :
                ChangeTargetClone() ;
                break ;
        }

        function InitializeDuplicateFrom() {
            $(InfoParam.ButtonClone).click(() => {
                EventClickButtonClone() ;
            });
        }

        function EventClickButtonClone() {
            CloneProcess() ;
            AppendClone() ;
        }

        function CloneProcess() {
            CloneElement = $(InfoParam.TargetElement).clone(false) ;
            FormOperation({
                Operation : "CloneFields" ,
                FormElement : InfoParam.MainForm ,
                ClonePart : {
                    ElementTarget : InfoParam.TargetElement ,
                    ElementPart : CloneElement ,
                    WithClear : InfoParam.ClearClone
                }
            });
            $(CloneElement).find(".Selector2Readonly").each((_ , Selector) => {
                OperationSelector2ReadOnly({
                    MainSelector : Selector ,
                    Operation : "SelectorInit"
                });
            });
        }

        function AppendClone() {
            const TargetAppend = CloneElement.appendTo($(InfoParam.ParentContainer)) ;
            FormOperation({
                Operation : "RefreshValidationForm" ,
                FormElement : InfoParam.MainForm ,
                ClonePart : {
                    ElementPart: TargetAppend,
                    WithClear: false
                }
            }) ;
        }

        function RestByRemove() {
            $(InfoParam.ParentContainer).children().remove();
        }

        function ChangeTargetClone() {
            $(InfoParam.ButtonClone).off();
            InitializeDuplicateFrom();
        }

        function RestByClearData() {} // All Data In Inputs Deleted
    }

    $(".ButtonCloneForm").ready(function(){
        $(".ButtonCloneForm").each((_ , ButtonClone) => {
            const TargetElementName = $(ButtonClone).attr("data-TargetElementName") ;
            const IsCleanClone = $(ButtonClone).attr("data-IsCloneClear") ?? true ;
            const TargetElement = $(document).find(`.CloneItem[data-NameElement=${TargetElementName}]`).get(0);
            const TargetParentClone = $(document).find(`.ParentClone[data-NameElement=${TargetElementName}]`).get(0);
            const FormTarget = $(TargetElement).closest("form").get(0) ;
            const MainCloneClear = $(TargetElement).clone(false);
            DuplicateFrom({
                MainForm : FormTarget ,
                ButtonClone : ButtonClone ,
                TargetElement : MainCloneClear ,
                ParentContainer : TargetParentClone ,
                Operation : "InitClone" ,
                ClearClone : IsCleanClone
            });
        });
    });

    /*===========================================
	=           Venobox      =
    =============================================*/
    $(".venobox").ready(function () {
        $(".venobox").each((_ , VenoBox) => {
            $(VenoBox).venobox({
                framewidth : "100vw" ,
                frameheight : "100vh"
            });
        });
    });


    /*===========================================
	=           Pages Setting       =
    =============================================*/

    $("#VacationListDate").ready(function () {

        $("#VacationListDate").each((_ , VacationList) => {
            const ListDate = $("#VacationListDate").get(0);
            const VacationTypeSelector = $("#VacationType").find(".Selector").get(0) ;
            const ButtonClone = $(VacationList).find(".ButtonCloneForm").get(0) ;
            const TargetElementName = $(ButtonClone).attr("data-TargetElementName") ;
            const IsCleanClone = $(ButtonClone).attr("data-IsCloneClear") ?? true ;
            const TargetElement = $(document).find(`.CloneItem[data-NameElement=${TargetElementName}]`).get(0);
            const TargetParentClone = $(document).find(`.ParentClone[data-NameElement=${TargetElementName}]`).get(0);
            const FormTarget = $(TargetElement).closest("form").get(0) ;
            const Except = $(VacationList).attr("data-ValueExcept").split(",") ;
            const MainCloneClear = $(TargetElement).clone(false);
            let CurrentValue = undefined ;

            $(ListDate).hide() ;

            $(VacationTypeSelector).find(".Selector__Option").each((_ , Option) => {
                const OptionValue = $(Option).attr("data-option") ;
                $(Option).click(() => {
                    $(ListDate).show();
                    if(CurrentValue && CurrentValue === OptionValue) {

                    } else {
                        DuplicateFrom({
                            Operation : "RestByRemove" ,
                            ParentContainer : TargetParentClone
                        });
                        if(IsValueContentInArray(Except , OptionValue)) {
                            ExceptValueApply(TargetElement) ;
                            ExceptValueApply(MainCloneClear) ;
                            InitVacationListPage() ;
                        } else {
                            ExceptValueNotApply(TargetElement) ;
                            ExceptValueNotApply(MainCloneClear) ;
                            InitVacationListPage() ;
                        }
                        FormOperation({
                            Operation : "RestFields" ,
                            FormElement : FormTarget ,
                            ClonePart : {
                                ElementTarget : TargetElement
                            }
                        });
                        DuplicateFrom({
                            MainForm : FormTarget ,
                            ButtonClone : ButtonClone ,
                            TargetElement : MainCloneClear ,
                            ParentContainer : TargetParentClone ,
                            Operation : "ChangeTargetClone" ,
                            ClearClone : true
                        });
                        CurrentValue = OptionValue ;
                    }
                });
            });

            InitVacationListPage() ;

            function ExceptValueApply(EleTarget = HTMLElement) {
                const SelectorType = $(EleTarget).find("#VacationNaturalID").get(0) ;
                const StartDate = $(SelectorType).next().get(0) ;
                const StartEnd = $(StartDate).next().get(0) ;
                $(SelectorType).css("display" , "none") ;
                $(StartDate).css("display" , "none") ;
                $(StartEnd).css("display" , "none") ;
                FormOperation({
                    Operation : "IgnoreField" ,
                    FormElement : FormTarget ,
                    ClonePart : {
                        ElementPart : SelectorType ,
                        WithClear : false
                    }
                });
                FormOperation({
                    Operation : "IgnoreField" ,
                    FormElement : FormTarget ,
                    ClonePart : {
                        ElementPart : StartDate ,
                        WithClear : false
                    }
                });
                FormOperation({
                    Operation : "IgnoreField" ,
                    FormElement : FormTarget ,
                    ClonePart : {
                        ElementPart : StartEnd ,
                        WithClear : false
                    }
                });
            }

            function ExceptValueNotApply(EleTarget = HTMLElement) {
                const SelectorType = $(EleTarget).find("#VacationNaturalID").get(0) ;
                const StartDate = $(SelectorType).next().get(0) ;
                const StartEnd = $(StartDate).next().get(0) ;
                $(SelectorType).css("display" , "initial") ;
                $(StartDate).css("display" , "none") ;
                $(StartEnd).css("display" , "none") ;
                FormOperation({
                    Operation : "NotIgnoreField" ,
                    FormElement : FormTarget ,
                    ClonePart : {
                        ElementPart : SelectorType ,
                        WithClear : false
                    }
                });
                FormOperation({
                    Operation : "NotIgnoreField" ,
                    FormElement : FormTarget ,
                    ClonePart : {
                        ElementPart : StartDate ,
                        WithClear : false
                    }
                });
                FormOperation({
                    Operation : "NotIgnoreField" ,
                    FormElement : FormTarget ,
                    ClonePart : {
                        ElementPart : StartEnd ,
                        WithClear : false
                    }
                });
            }

            function InitVacationListPage() {
                setTimeout(() => {
                    let CountClone = 1 ;
                    let IsMainCloneLabelView = false ;
                    $(VacationList).find(".ButtonCloneForm").click(() => {
                        if(!IsMainCloneLabelView) {
                            $(TargetElement).find(".ListData__GroupTitle .Title").text(`الاجازة رقم ${CountClone++}`) ;
                            IsMainCloneLabelView = true ;
                        }
                        const LastClone = $(TargetParentClone).find(".ListData__Group")
                            .last().get(0) ;
                        const SelectorVisibility = $(LastClone).find(".VisibilityOption").get(0) ;
                        const AttributeLastClone = $(SelectorVisibility).attr("data-ElementsTargetName") ;
                        $(SelectorVisibility).attr("data-ElementsTargetName"
                            , `${AttributeLastClone}__${CountClone}`) ;
                        $(LastClone).find(".VisibilityTarget").each((_ , Value) => {
                            $(Value).attr("data-TargetName" ,
                                `${$(Value).attr("data-TargetName")}__${CountClone}`);
                        });
                        $(LastClone).find(".ListData__GroupTitle .Title").text(`الاجازة رقم ${CountClone++}`) ;
                        initializeFieldsVisibility({
                            Operation : "InitializeVisibilityOption" ,
                            VisibilityOption : SelectorVisibility ,
                            VisibilityTarget : undefined ,
                        });
                    });
                } , 1) ;
            }

        });

    });

    $("#AddEmployeePage").ready(function () {

        const PageAddEmployee = $("#AddEmployeePage").get(0) ;

        $(PageAddEmployee).find(".Taps__Item").each((_ , Item) => {
            $(Item).off();
        });

        $(PageAddEmployee).find(`.Taps__Panel .Form__Button Button.Next`).each((_ , Button) => {
           $(Button).click(() => {
               CheckValidation(Button , "After") ;
           });
        });

        $(PageAddEmployee).find(`.Taps__Panel .Form__Button Button.Previous`).each((_ , Button) => {
            $(Button).click(() => {
                CheckValidation(Button , "Before") ;
            });
        });

        function CheckValidation(ButtonCheck = HTMLButtonElement
                                 , Move = "Before" | "After") {
            const TapElement = $(ButtonCheck).closest(".Taps__Panel").get(0) ;
            if(Move === "After") {
                let IsAllCurrent = true ;
                $(TapElement).find("input , textarea").each((_ , Field) => {
                    if(!$(Field).valid())
                        IsAllCurrent = false ;
                });
                if(IsAllCurrent)
                    NextTab(TapElement , Move) ;
            } else
                NextTab(TapElement , Move) ;
        }

        function NextTab(CurrentTap = HTMLElement
                         , Move = "Before" | "After") {
            $(CurrentTap).removeClass("Active") ;
            const CurrentPanelName = $(CurrentTap).attr("data-panel") ;
            const CurrentButtonPanel = $(PageAddEmployee)
                .find(`.Taps__Item[data-content="${CurrentPanelName}"]`).get(0);
            let NextPanelName  , NextButtonPanel , NextPanel ;
            if(Move === "After")
                NextPanel = $(CurrentTap).next() ;
            else
                NextPanel = $(CurrentTap).prev() ;
            NextPanelName = $(NextPanel).attr("data-panel") ;
            NextButtonPanel = $(PageAddEmployee).find(`.Taps__Item[data-content="${NextPanelName}"]`)
                .get(0);
            $(CurrentButtonPanel).removeClass("Active") ;
            $(NextButtonPanel).addClass("Active") ;
            $(NextPanel).addClass("Active") ;
        }

    });

    $("#State").ready(function () {
        const StateElement = $("#State").get(0);
        const URLGetCities = $(StateElement).attr("data-CityURL");
        const Cities = $("#City").get(0);
        const DefaultData = $(StateElement).attr("data-StateDefault");


        if(DefaultData) {
            ClickOption(DefaultData) ;
        } else
            $(Cities).hide() ;

        $(StateElement).find(".Selector__Option").each((_, Option) => {
            const ValueOption = $(Option).attr("data-option");
            $(Option).click(() => {
                ClickOption(ValueOption);
            });
        });

        function ClickOption(ValueOption = String) {
            LoaderView() ;
            $.ajax({
                url : `${URLGetCities}?id_country=${ValueOption}` ,
                method : "GET" ,
                success : function (Response) {
                    const ArrayData = [] ;
                    for(let i in Response)
                        ArrayData[i] = Response[i];
                    InsertCities(ArrayData) ;
                    LoaderHidden() ;
                } ,

                error : function () {
                    InsertCities([]) ;
                    LoaderHidden() ;
                }
            });
        }

        function InsertCities(CitiesInfo = Array) {
            const CitySelector = $(Cities).find(".Selector").get(0) ;
            SelectorOperation({
                Operation : "RemoveAllOption" ,
                Selector : CitySelector ,
            }) ;
            if(CitiesInfo.length > 0) {
                CitiesInfo.forEach((Value , Index) => {
                    SelectorOperation({
                        Operation : "SetOption" ,
                        Selector : CitySelector ,
                        InsertOption : {
                            Label : Value ,
                            Value : Index
                        }
                    });
                }) ;
                $(Cities).show() ;
            } else {
                $(Cities).hide() ;
            }
        }

    });
});

window.onload = function (){

    /*===========================================
	=           Loader Page       =
    =============================================*/
    $(".Loader--Page").ready(function () {
        $(this).find(".Loader--Page").remove();
    });

    GetFullParams() ;
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

function GetFullParams() {
    const URL = window.location.href ;
    return URL.split("?")[1] ;
}

function IsValueContentInArray(ArrayList = Array , Value) {
    for (let i = 0; i < ArrayList.length ; i++)
        if(ArrayList[i] === Value)
            return true ;
    return false ;
}


/*===========================================
=           Notes       =
=============================================*/

/*
    * Solution About "closeOutSide" Function for create more one Event When Click Same Menu Button
    *
 */
