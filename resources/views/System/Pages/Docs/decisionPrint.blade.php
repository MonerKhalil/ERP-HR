<!doctype html>
@if(app()->getLocale()==="en")
<html lang="en" dir="ltr">
@else
<html lang="ar" dir="rtl">
@endif

    <head>
        {{-- Title Page System --}}
        <title>HR System</title>
        {{-- Logo System --}}
        <link rel="icon" href="{{asset('System/Assets/Images/Logo.png')}}">
        {{-- Icons System --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        {{-- Normalize System --}}
        <link rel="stylesheet" href='{{asset('System/Assets/CSS/Normalize.css')}}' type="text/css" />
        {{-- Libraries System --}}
        <link rel="stylesheet" href='{{asset('System/Assets/Lib/Libraries.css')}}' type="text/css" />
        {{-- Main CSS System --}}
        <link rel="stylesheet" href='{{asset('System/Assets/CSS/Style.css')}}' type="text/css" />
        {{-- CSS Extra--}}
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap");
            *,
            *::after,
            *::before {
                margin: 0;
                padding: 0;
                box-sizing: inherit;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                box-sizing: border-box;
                background-color: #242C3F;
            }

            ul {
                list-style: none;
            }

            h1, h2, h3,
            h4, h5, h6 {
                margin: 0;
            }

            p {
                margin-top: 0;
                margin-bottom: 1.6rem;
            }

            a {
                transition: all 0.3s !important;
            }

            img {
                width: 100%;
                height: 100%;
            }

            .NoWrap {
                white-space: nowrap;
            }

            .Container--Header {
                width: 100%;
                margin: 0 auto;
            }
            @media only screen and (max-width: 74.99em) {
                .Container--Header {
                    padding: 0 1.4rem;
                }
            }
            @media only screen and (max-width: 61.99em) {
                .Container--Header {
                    padding: 0 2.2rem;
                }
            }
            @media only screen and (max-width: 35.99em) {
                .Container--Header {
                    padding: 0 0.4rem;
                }
            }
            @media only screen and (min-width: 75em) {
                .Container--Header {
                    padding: 0 1.4rem;
                }
            }
            @media print {
                .Container--Header {
                    padding: 0 2.2rem;
                }
            }

            .Container--MainContent {
                width: 100%;
                margin: 0 auto;
            }
            @media only screen and (max-width: 74.99em) {
                .Container--MainContent {
                    padding: 0 3.4rem;
                }
            }
            @media only screen and (max-width: 61.99em) {
                .Container--MainContent {
                    padding: 0 4.2rem;
                }
            }
            @media only screen and (max-width: 35.99em) {
                .Container--MainContent {
                    padding: 0 2.4rem;
                }
            }
            @media only screen and (min-width: 75em) {
                .Container--MainContent {
                    padding: 0 3.4rem;
                }
            }
            @media print {
                .Container--MainContent {
                    padding: 0 4.2rem;
                }
            }

            .IconClick {
                font-size: 2rem;
                border-radius: 50%;
                padding: 0.6rem;
                color: #fff;
                cursor: pointer;
                transition: all 0.3s;
            }
            .IconClick:hover, .IconClick.Active {
                background-color: rgba(0, 0, 0, 0.35);
            }

            .UserImage {
                position: relative;
                width: 3rem;
                height: 3rem;
            }
            .UserImage > img {
                width: 100%;
                height: 100%;
                border-radius: 50%;
            }

            .Logo > a {
                display: flex;
                align-items: center;
                column-gap: 1rem;
            }
            .Logo__Image {
                width: 4rem;
                height: 4rem;
                border-radius: 50%;
            }
            .Logo__SystemName {
                color: #fff;
                font-weight: bold;
                white-space: nowrap;
            }

            .ArrowRight {
                transform: rotate(180deg);
            }

            .Center {
                text-align: center;
            }

            .Left {
                text-align: left;
            }

            .Right {
                text-align: right;
            }

            .Justify-Content-End {
                justify-content: end !important;
            }

            .Justify-Content-Center {
                justify-content: center !important;
            }

            .Overflow-Hidden {
                overflow: hidden;
            }

            .ReplaceOldBackGround {
                background-color: #542426;
                color: #fff;
            }

            .ReplaceNewBackGround {
                background-color: #1C4428;
                color: #fff;
            }

            .Visible-phonePortrait,
            .Visible-phoneLandscape,
            .Visible-tablet,
            .Visible-desktop,
            .Visible-desktopLarge {
                display: none;
            }

            .Hidden-phonePortrait,
            .Hidden-phoneLandscape,
            .Hidden-tablet,
            .Hidden-desktop,
            .Hidden-desktopLarge {
                display: initial;
            }

            @media only screen and (max-width: 74.99em) {
                .Visible-desktop {
                    display: initial !important;
                }
                .Hidden-desktop {
                    display: none !important;
                }
            }
            @media only screen and (max-width: 61.99em) {
                .Visible-tablet {
                    display: initial !important;
                }
                .Hidden-tablet {
                    display: none !important;
                }
            }
            @media only screen and (max-width: 47.99em) {
                .Visible-phoneLandscape {
                    display: initial !important;
                }
                .Hidden-phoneLandscape {
                    display: none !important;
                }
            }
            @media only screen and (max-width: 35.99em) {
                .Visible-phonePortrait {
                    display: initial !important;
                }
                .Hidden-phonePortrait {
                    display: none !important;
                }
            }
            @media only screen and (min-width: 75em) {
                .Visible-desktopLarge {
                    display: initial !important;
                }
                .Hidden-desktopLarge {
                    display: none !important;
                }
            }
            html[lang=ar] .Left {
                text-align: right;
            }
            html[lang=ar] .Right {
                text-align: left;
            }

            @media only screen and (max-width: 74.99em) {
                html {
                    font-size: 62.5%;
                }
            }
            @media only screen and (max-width: 61.99em) {
                html {
                    font-size: 56.25%;
                }
            }
            @media only screen and (max-width: 47.99em) {
                html {
                    font-size: 50%;
                }
            }
            @media only screen and (max-width: 35.99em) {
                html {
                    font-size: 50%;
                }
            }
            @media only screen and (min-width: 75em) {
                html {
                    font-size: 70%;
                }
            }
            @media print {
                html {
                    font-size: 56.25%;
                }
            }

            body {
                font-family: Roboto, sans-serif;
                color: #b2b2b2;
                font-size: 1.6rem;
                font-weight: 400;
                line-height: 1.5;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            h2, .h2 {
                font-size: 2.5rem;
                font-weight: 600;
            }

            h3, .h3 {
                font-size: 1.8rem;
            }

            h4, .h4 {
                font-size: 1.6rem;
            }

            p {
                font-size: 1.5rem;
            }

            .material-icons {
                font-size: 1.99rem;
            }

            .Dropdown {
                position: relative;
                background-color: #1b2633;
                transition: all 0.3s;
            }
            .Dropdown__Item {
                cursor: pointer;
                transition: all 0.3s;
            }

            .Form {
                position: relative;
            }
            .Form__Group {
                position: relative;
                width: 100%;
            }
            .Form__Input, .Form__Date, .Form__Search {
                position: relative;
                width: 100%;
            }
            .Form__Input .Date__Area,
            .Form__Input .Input__Area,
            .Form__Input .Search__Area, .Form__Date .Date__Area,
            .Form__Date .Input__Area,
            .Form__Date .Search__Area, .Form__Search .Date__Area,
            .Form__Search .Input__Area,
            .Form__Search .Search__Area {
                position: relative;
                border: 1px solid #96A2B4;
                border-radius: 5px;
            }
            .Form__Input .Date__Area.Error,
            .Form__Input .Input__Area.Error,
            .Form__Input .Search__Area.Error, .Form__Date .Date__Area.Error,
            .Form__Date .Input__Area.Error,
            .Form__Date .Search__Area.Error, .Form__Search .Date__Area.Error,
            .Form__Search .Input__Area.Error,
            .Form__Search .Search__Area.Error {
                border-color: #f93542;
            }
            .Form__Input .Date__Area.Error .Input__Label,
            .Form__Input .Input__Area.Error .Input__Label,
            .Form__Input .Search__Area.Error .Input__Label, .Form__Date .Date__Area.Error .Input__Label,
            .Form__Date .Input__Area.Error .Input__Label,
            .Form__Date .Search__Area.Error .Input__Label, .Form__Search .Date__Area.Error .Input__Label,
            .Form__Search .Input__Area.Error .Input__Label,
            .Form__Search .Search__Area.Error .Input__Label {
                color: #f93542;
            }
            .Form__Input .Date__Field,
            .Form__Input .Input__Field,
            .Form__Input .Search__Field, .Form__Date .Date__Field,
            .Form__Date .Input__Field,
            .Form__Date .Search__Field, .Form__Search .Date__Field,
            .Form__Search .Input__Field,
            .Form__Search .Search__Field {
                display: block;
                width: 100%;
                font-family: inherit;
                font-size: 1.5rem;
                outline: none;
                border: none;
                padding: 1.3rem 2rem;
                border-radius: 4px;
                transition: all 0.4s;
            }
            .Form__Input .Date__Label,
            .Form__Input .Input__Label,
            .Form__Input .Search__Label, .Form__Date .Date__Label,
            .Form__Date .Input__Label,
            .Form__Date .Search__Label, .Form__Search .Date__Label,
            .Form__Search .Input__Label,
            .Form__Search .Search__Label {
                position: absolute;
                top: 1rem;
                left: 2rem;
                font-size: 1.5rem;
                font-weight: 700;
                transition: all 0.3s;
            }
            .Form__Input .Input__Field {
                /* Chrome, Safari, Edge, Opera */
                /* Firefox */
            }
            .Form__Input .Input__Field:-internal-autofill-selected {
                background-color: transparent !important;
            }
            .Form__Input .Input__Field::-webkit-outer-spin-button, .Form__Input .Input__Field::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            .Form__Input .Input__Field[type=number] {
                -moz-appearance: textfield;
            }
            .Form__Input .Input__Field:focus ~ .Input__Label, .Form__Input .Input__Field:not(:placeholder-shown) ~ .Input__Label {
                top: 0;
                left: 1.5rem;
                transform: translateY(-50%);
                font-size: 1.3rem;
                padding: 0 0.5rem;
            }
            .Form__Input--Password .Input__Field {
                padding: 1.3rem 4rem 1.3rem 2rem;
            }
            .Form__Input--Password .Input__Icon {
                position: absolute;
                right: 1rem;
                top: 50%;
                cursor: pointer;
                transform: translateY(-50%);
            }
            .Form__Date .Date__Field:not(:placeholder-shown) ~ .Date__Label {
                top: 0;
                left: 1.5rem;
                transform: translateY(-50%);
                font-size: 1.3rem;
                padding: 0 0.5rem;
            }
            .Form__CheckBox {
                position: relative;
            }
            .Form__CheckBox .CheckBox__Input {
                display: none;
            }
            .Form__CheckBox .CheckBox__Input:checked ~ .CheckBox__Label .IconChecked > .material-icons {
                display: inline-block;
            }
            .Form__CheckBox .CheckBox__Label {
                display: flex;
                gap: 1rem;
                align-items: center;
            }
            .Form__CheckBox .CheckBox__Label .TextCheckBox {
                font-size: 1.6rem;
                cursor: pointer;
            }
            .Form__Textarea .Textarea__Label {
                display: inline-block;
                margin-bottom: 1rem;
            }
            .Form__Link .Link__Anchor {
                font-size: 1.4rem;
            }
            .Form__Error .Error__Area {
                list-style: initial;
                color: #f93542;
            }
            .Form__Button .Send {
                background-color: #3F51B5;
                color: #fff;
            }
            .Form__Button .Cancel {
                background-color: #f93542;
                color: #fff;
            }
            .Form__Button .Clear {
                background-color: #10C093;
                color: #fff;
            }
            .Form--Dark .Form__Input .Input__Field,
            .Form--Dark .Form__Input .Date__Field,
            .Form--Dark .Form__Input .Search__Field, .Form--Dark .Form__Date .Input__Field,
            .Form--Dark .Form__Date .Date__Field,
            .Form--Dark .Form__Date .Search__Field, .Form--Dark .Form__Search .Input__Field,
            .Form--Dark .Form__Search .Date__Field,
            .Form--Dark .Form__Search .Search__Field {
                color: #96A2B4;
                background-color: transparent;
            }
            .Form--Dark .Form__Input .Input__Field::placeholder,
            .Form--Dark .Form__Input .Date__Field::placeholder,
            .Form--Dark .Form__Input .Search__Field::placeholder, .Form--Dark .Form__Date .Input__Field::placeholder,
            .Form--Dark .Form__Date .Date__Field::placeholder,
            .Form--Dark .Form__Date .Search__Field::placeholder, .Form--Dark .Form__Search .Input__Field::placeholder,
            .Form--Dark .Form__Search .Date__Field::placeholder,
            .Form--Dark .Form__Search .Search__Field::placeholder {
                color: transparent;
            }
            .Form--Dark .Form__Input .Input__Field:focus ~ .Input__Label, .Form--Dark .Form__Input .Input__Field:not(:placeholder-shown) ~ .Input__Label {
                background-color: #1B202D;
            }
            .Form--Dark .Form__Date .Date__Field:not(:placeholder-shown) ~ .Date__Label {
                background-color: #1B202D;
            }
            .Form--Dark .Form__CheckBox .CheckBox__Input:checked ~ .CheckBox__Label .IconChecked {
                background-color: #3F51B5;
                border-color: #3F51B5;
            }
            .Form--Dark .Form__CheckBox .CheckBox__Label .IconChecked {
                color: #fff;
            }
            .Form--Dark .Form__Select .Selector__WordLabel,
            .Form--Dark .Form__Select .MultiSelector__WordLabel {
                background-color: #1A202E;
            }
            .Form--Dark .Form__Select .Selector__Options,
            .Form--Dark .Form__Select .MultiSelector__Options {
                background-color: #1A202E;
                border: 1px solid #96A2B4;
            }
            .Form--Dark .Form__Select .Selector__Option:hover,
            .Form--Dark .Form__Select .MultiSelector__Option:hover {
                background-color: #3F51B5;
                color: #fff;
            }
            .Form--Dark .Form__Search .Search__Field::placeholder {
                color: inherit;
            }
            .Form--Dark .Form__Link .Link__Anchor {
                color: #96A2B4;
            }
            .Form--Dark .Form__Link .Link__Anchor:hover {
                color: #10C093;
            }

            html[lang=ar] .Form__Input .Input__Label,
            html[lang=ar] .Form__Input .Date__Label, html[lang=ar] .Form__Date .Input__Label,
            html[lang=ar] .Form__Date .Date__Label {
                left: initial;
                right: 2rem;
            }
            html[lang=ar] .Form__Input .Input__Field:focus ~ .Input__Label, html[lang=ar] .Form__Input .Input__Field:not(:placeholder-shown) ~ .Input__Label {
                top: 0;
                left: initial;
                right: 1.5rem;
            }
            html[lang=ar] .Form__Input--Password .Input__Field {
                padding: 1.3rem 2rem 1.3rem 4rem;
            }
            html[lang=ar] .Form__Input--Password .Input__Icon {
                right: initial;
                left: 1rem;
            }
            html[lang=ar] .Form__Date .Date__Field:not(:placeholder-shown) ~ .Date__Label {
                left: initial;
                right: 1.5rem;
            }

            .Button, .Button:link, .Button:visited {
                position: relative;
                display: inline-block;
                border-radius: 5px;
                border: none;
                font-size: 1.6rem;
                padding: 1rem 2rem;
                outline: none;
                cursor: pointer;
                transition: all 0.3s;
            }
            .Button:hover {
                transform: translateY(-0.3rem);
                box-shadow: 0 0 1.5rem 0 rgba(0, 0, 0, 0.35);
            }
            .Button:active, .Button:focus {
                transform: translateY(-0.1rem);
                box-shadow: 0 0 1.5rem 0 rgba(0, 0, 0, 0.25);
            }
            .Button--Primary {
                background-color: #3F51B5;
                color: #fff;
            }
            .Button--Danger {
                background-color: #f93542;
                color: #fff;
            }
            .Button.Size-2 {
                padding: 0.6rem 2rem;
            }

            .Selector {
                position: relative;
                width: 100%;
                font-size: 1.5rem;
            }
            .Selector__Main {
                position: relative;
                display: block;
                width: 100%;
                padding: 1.1rem 2rem;
                outline: 1px solid #96A2B4;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.3s;
            }
            .Selector__WordLabel {
                font-weight: 700;
                transition: all 0.3s;
            }
            .Selector__WordChoose {
                display: none;
                font-size: 1.5rem;
                color: #96A2B4;
            }
            .Selector__Options {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                max-height: 0;
                border-radius: 5px;
                background-color: #000;
                visibility: hidden;
                opacity: 0;
                overflow-x: hidden;
                overflow-y: auto;
                box-shadow: 0 0 1.5rem 0 rgba(0, 0, 0, 0.35);
                transition: all 0.3s;
            }
            .Selector__Options::-webkit-scrollbar {
                width: 0.4rem;
            }
            .Selector__Options::-webkit-scrollbar-track, .Selector__Options::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 10px;
                transition: all 0.3s;
            }
            .Selector__Options:hover::-webkit-scrollbar-track {
                background-color: rgba(24, 24, 24, 0.8705882353);
            }
            .Selector__Options:hover::-webkit-scrollbar-thumb {
                background-color: rgba(255, 255, 255, 0.2705882353);
            }
            .Selector__Option {
                padding: 1rem 2rem;
                cursor: pointer;
                transition: all 0.3s;
            }
            .Selector__Option:hover {
                background-color: #1EE0AC;
            }
            .Selector__Arrow {
                position: absolute;
                top: 50%;
                right: 1rem;
                transform: translateY(-50%);
            }
            .Selector.Open .Selector__Main {
                z-index: 2;
            }
            .Selector.Open .Selector__Options {
                top: calc(100% + 0.5rem);
                visibility: visible;
                opacity: 1;
                max-height: 21rem;
                z-index: 1;
            }
            .Selector.Selected .Selector__WordLabel {
                position: absolute;
                top: 0;
                left: 1.5rem;
                transform: translateY(-50%);
                font-size: 1.3rem;
                padding: 0 0.5rem;
            }
            .Selector.Selected .Selector__WordChoose {
                display: initial;
            }
            .Selector.Size-2 {
                font-size: 1.3rem;
            }
            .Selector.Size-2 .Selector__Main {
                min-width: 12rem;
                padding: 0.5rem 3rem 0.5rem 1rem;
            }
            .Selector.Size-2 .Selector__WordLabel {
                font-size: 1rem;
                left: 0.5rem;
            }
            .Selector.Size-2 .Selector__WordChoose {
                font-size: inherit;
            }

            html[lang=ar] .Selector__Arrow {
                right: initial;
                left: 1rem;
            }
            html[lang=ar] .Selector.Selected .Selector__WordLabel {
                left: initial;
                right: 1.5rem;
            }
            html[lang=ar] .Selector.Size-2 .Selector__Main {
                padding: 0.5rem 1rem 0.5rem 3rem;
            }
            html[lang=ar] .Selector.Size-2 .Selector__WordLabel {
                left: initial;
                right: 0.5rem;
            }

            .MultiSelector {
                position: relative;
                width: 100%;
                font-size: 1.5rem;
            }
            .MultiSelector__Main {
                position: relative;
                display: block;
                width: 100%;
                padding: 1.1rem 2rem;
                outline: 1px solid #96A2B4;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.3s;
            }
            .MultiSelector__WordLabel {
                font-weight: 700;
                transition: all 0.3s;
            }
            .MultiSelector__WordChoose {
                display: none;
                font-size: 1.5rem;
                color: #96A2B4;
            }
            .MultiSelector__Options {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                max-height: 0;
                border-radius: 5px;
                background-color: #000;
                visibility: hidden;
                opacity: 0;
                overflow-x: hidden;
                overflow-y: auto;
                box-shadow: 0 0 1.5rem 0 rgba(0, 0, 0, 0.35);
                transition: all 0.3s;
            }
            .MultiSelector__Options::-webkit-scrollbar {
                width: 0.4rem;
            }
            .MultiSelector__Options::-webkit-scrollbar-track, .MultiSelector__Options::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 10px;
                transition: all 0.3s;
            }
            .MultiSelector__Options:hover::-webkit-scrollbar-track {
                background-color: rgba(24, 24, 24, 0.8705882353);
            }
            .MultiSelector__Options:hover::-webkit-scrollbar-thumb {
                background-color: rgba(255, 255, 255, 0.2705882353);
            }
            .MultiSelector__CheckBox {
                width: 1.9rem !important;
                height: 1.9rem !important;
            }
            .MultiSelector__CheckBox > .material-icons {
                font-size: 1.7rem !important;
                left: 0 !important;
                top: 0 !important;
            }
            .MultiSelector__InputCheckBox:checked + .MultiSelector__Label .MultiSelector__CheckBox {
                background-color: #10C093;
            }
            .MultiSelector__InputCheckBox:checked + .MultiSelector__Label .MultiSelector__CheckBox > .material-icons {
                display: inline-block;
                color: #fff;
            }
            .MultiSelector__Label {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                width: 100%;
                padding: 1rem 2rem;
                cursor: pointer;
                transition: all 0.3s;
            }
            .MultiSelector__Label:hover {
                background-color: #3F51B5;
                color: #fff;
            }
            .MultiSelector__Label:hover .MultiSelector__CheckBox {
                border-color: #fff;
            }
            .MultiSelector__Arrow {
                position: absolute;
                top: 50%;
                right: 1rem;
                transform: translateY(-50%);
            }
            .MultiSelector.Open .MultiSelector__Main {
                z-index: 2;
            }
            .MultiSelector.Open .MultiSelector__Options {
                top: calc(100% + 0.5rem);
                visibility: visible;
                opacity: 1;
                max-height: 21rem;
                z-index: 1;
            }
            .MultiSelector.Selected .MultiSelector__WordLabel {
                position: absolute;
                top: 0;
                left: 1.5rem;
                transform: translateY(-50%);
                font-size: 1.3rem;
                padding: 0 0.5rem;
            }
            .MultiSelector.Selected .MultiSelector__WordChoose {
                display: initial;
            }

            html[lang=ar] .MultiSelector__Arrow {
                right: initial;
                left: 1rem;
            }
            html[lang=ar] .MultiSelector.Selected .MultiSelector__WordLabel {
                left: initial;
                right: 1.5rem;
            }

            .SocialMedia {
                position: relative;
                display: flex;
                flex-direction: column;
            }
            .SocialMedia__Item a {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 1rem 0;
                color: #6c7a87;
                transition: all 0.3s;
            }
            .SocialMedia__Item a:hover {
                color: #10C093;
            }
            .SocialMedia__Icon {
                width: 3rem;
            }

            .Card {
                position: relative;
                width: 100%;
                border-radius: 10px;
                background-color: #1A202E;
            }
            .Card__InnerGroup {
                border-bottom: 1px solid #23364e;
            }
            .Card__InnerGroup .Card__Inner:not(:last-child) {
                border-bottom: 1px solid #23364e;
            }
            .Card__Inner {
                padding: 2.4rem;
            }
            .Card__Inner.p0 {
                padding: 0;
            }
            .Card__Inner.pl0 {
                padding-left: 0;
            }
            .Card__Inner.pr0 {
                padding-right: 0;
            }
            .Card__Inner.pt0 {
                padding-top: 0;
            }
            .Card__Inner.pb0 {
                padding-bottom: 0;
            }
            .Card__Inner.py0 {
                padding-top: 0;
                padding-bottom: 0;
            }
            .Card__Inner.px0 {
                padding-right: 0;
                padding-left: 0;
            }
            .Card__Inner.py1 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
            .Card__ToolsGroup {
                position: relative;
                display: flex;
                width: 100%;
                justify-content: space-between;
                align-items: center;
            }
            .Card__SearchTools .SearchTools {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            .Card__SearchTools .SearchTools__Separate {
                margin: 0 1rem;
                border-right: 1px solid #96A2B4;
            }
            .Card__SearchTools .SearchTools__FilterIcon.Note, .Card__SearchTools .SearchTools__SearchIcon.Note {
                position: relative;
            }
            .Card__SearchTools .SearchTools__FilterIcon.Note::after, .Card__SearchTools .SearchTools__SearchIcon.Note::after {
                content: "";
                position: absolute;
                width: 4px;
                height: 4px;
                background-color: #10C093;
                border-radius: 50%;
            }
            .Card__Pagination {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .Card__Header {
                margin-bottom: 1.5rem;
            }
            .Card__Title {
                text-transform: capitalize;
                color: #fff;
            }
            .Card:not(:last-child) {
                margin-bottom: 1rem;
            }
            .Card--Taps .Taps__List {
                padding: 0 1.6rem;
            }
            .Card--Border {
                border: 1px solid #23364e;
            }
            .Card--Dark {
                background-color: #1A202E;
            }
            @media only screen and (max-width: 35.99em) {
                .Card__Pagination {
                    justify-content: center;
                }
                .Card__Pagination .Pagination--Numbers {
                    display: none;
                }
            }

            .Loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                z-index: 5;
            }
            .Loader--Page {
                background-color: #1A202E;
            }
            .Loader--Upload {
                display: none;
                background-color: rgba(26, 32, 46, 0.6);
            }
            .Loader__SvgCircle {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                display: inline-block;
                width: 10rem;
                height: 10rem;
            }

            .Popup {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                visibility: hidden;
                opacity: 0;
                z-index: 4;
                transition: all 0.4s;
            }
            .Popup__Title {
                position: relative;
                text-align: center;
            }
            .Popup__Title .Title {
                position: relative;
                background-color: #1B2633;
                padding: 0 2rem;
            }
            .Popup__Title::before {
                content: "";
                position: absolute;
                top: 50%;
                left: 0;
                width: 100%;
                height: 1px;
                transform: translateY(-50%);
                background-color: #96A2B4;
            }
            .Popup__Content {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100vh;
                padding: 0 2rem;
            }
            .Popup__Inner {
                padding: 2.4rem;
            }
            .Popup__Inner:not(:first-child) {
                padding-top: 0;
            }
            .Popup__Card {
                position: relative;
                max-width: 70rem;
                width: 100%;
                padding: 3rem;
                border-radius: 5px;
            }
            .Popup__CardContent {
                max-height: calc(100vh - 20rem);
                overflow-y: auto;
            }
            .Popup__CardContent::-webkit-scrollbar {
                width: 0.4rem;
            }
            .Popup__CardContent::-webkit-scrollbar-track, .Popup__CardContent::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 10px;
                transition: all 0.3s;
            }
            .Popup__CardContent:hover::-webkit-scrollbar-track {
                background-color: rgba(24, 24, 24, 0.8705882353);
            }
            .Popup__CardContent:hover::-webkit-scrollbar-thumb {
                background-color: rgba(255, 255, 255, 0.2705882353);
            }
            .Popup__Close {
                position: absolute;
                top: 0;
                left: 50%;
                transform: translate(-50%, -50%);
                cursor: pointer;
                background-color: #3F51B5;
                color: #fff;
                padding: 1rem;
                border-radius: 50%;
                transition: all 0.4s;
            }
            .Popup.Open {
                visibility: visible;
                opacity: 1;
            }
            .Popup--Dark {
                background-color: rgba(26, 32, 46, 0.6);
            }
            .Popup--Dark .Popup__Card {
                background-color: #1B2633;
                box-shadow: 0 0 1.5rem 0 rgba(0, 0, 0, 0.35);
            }
            .Popup--Dark .Popup__Card .Form--Dark .Form__Input .Input__Field:focus ~ .Input__Label, .Popup--Dark .Popup__Card .Form--Dark .Form__Input .Input__Field:not(:placeholder-shown) ~ .Input__Label {
                background-color: #1B2633;
            }
            .Popup--Dark .Popup__Card .Form--Dark .Form__Date .Date__Field:not(:placeholder-shown) ~ .Date__Label {
                background-color: #1B2633;
            }
            .Popup--Dark .Popup__Card .Form--Dark .Form__Select .Selector__WordLabel {
                background-color: #1B2633;
            }
            .Popup--Dark .Popup__Card .Form--Dark .Form__Select .Selector__Options {
                background-color: #1B2633;
            }
            .Popup--Dark .Popup__Close:hover {
                background-color: #252f69;
            }

            .Skills {
                position: relative;
            }
            .Skills__List {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 1rem;
            }
            .Skills__List .Skill {
                font-size: 1.2rem;
                background-color: #3F51B5;
                padding: 0 1rem;
                border-radius: 5px;
                color: #fff;
            }
            @media only screen and (max-width: 47.99em) {
                .Skills__List {
                    justify-content: center;
                    flex-wrap: wrap;
                }
            }

            .CheckBoxNormal, .Table__Table .Item__Col--Check .CheckBoxRow, .Form__CheckBox .CheckBox__Label .IconChecked, .MultiSelector__CheckBox {
                position: relative;
                display: inline-block;
                width: 2.5rem;
                height: 2.5rem;
                border: 1px solid #96A2B4;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.3s;
            }
            .CheckBoxNormal > .material-icons, .Table__Table .Item__Col--Check .CheckBoxRow > .material-icons, .Form__CheckBox .CheckBox__Label .IconChecked > .material-icons, .MultiSelector__CheckBox > .material-icons {
                position: absolute;
                display: none;
                width: 100%;
                height: 100%;
                font-size: 2rem;
                left: 0.2rem;
                top: 0.1rem;
            }

            .DragDrop__Zone.Empty {
                position: relative;
                width: 100%;
                height: 20rem;
                border: 1px solid #23364e;
                border-radius: 5px;
            }
            .DragDrop__Zone.Empty .DragDrop__Tip {
                display: block;
            }
            .DragDrop__Tip {
                display: none;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                opacity: 0.6;
                font-size: 3rem;
            }

            .Pagination {
                position: relative;
            }
            .Pagination--Select .Pagination__List {
                gap: 1.5rem;
            }
            .Pagination--Select .Pagination__PageWord, .Pagination--Select .Pagination__PageOf {
                font-size: 1.2rem;
            }
            .Pagination--Select .Input__Field {
                min-width: 7rem;
                padding: 0.5rem 1rem;
            }
            .Pagination__List {
                position: relative;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
            }
            .Pagination__Number a, .Pagination__Previous a, .Pagination__Next a, .Pagination__Points {
                display: block;
                font-size: 1.2rem;
                font-weight: 600;
                padding: 0.5rem 1rem;
                border: 1px solid #23364e;
                color: #96A2B4;
            }
            .Pagination__Number a, .Pagination__Previous a, .Pagination__Next a {
                cursor: pointer;
                transition: all 0.3s;
            }
            .Pagination__Number a:hover, .Pagination__Previous a:hover, .Pagination__Next a:hover {
                background-color: #3F51B5;
                color: #fff;
            }
            .Pagination__Previous a {
                border-bottom-left-radius: 5px;
                border-top-left-radius: 5px;
            }
            .Pagination__Next a {
                border-bottom-right-radius: 5px;
                border-top-right-radius: 5px;
            }

            .MessageProcessContainer {
                position: relative;
                width: 100%;
                border-radius: 5px;
                overflow: hidden;
            }

            .MessageProcess {
                position: relative;
                visibility: hidden;
                opacity: 0;
                width: 100%;
                background-color: #1A202E;
                transition: all 0.3s;
            }
            .MessageProcess__MainContent {
                padding: 1rem;
                border-radius: 5px;
            }
            .MessageProcess__Header {
                display: flex;
                justify-content: space-between;
                align-items: baseline;
            }
            .MessageProcess__Title {
                display: flex;
                align-items: center;
                gap: 1rem;
            }
            .MessageProcess__Title .Title {
                font-size: 1.8rem;
            }
            .MessageProcess__Close {
                cursor: pointer;
                color: #3F51B5;
                transition: all 0.3s;
            }
            .MessageProcess__Close:hover {
                color: #252f69;
            }
            .MessageProcess__Separate {
                clear: both;
                border: 0;
                height: 1px;
                margin: 1rem 0;
                background-image: -webkit-linear-gradient(left, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
            }
            .MessageProcess__Body {
                padding: 0 1rem;
            }
            .MessageProcess--Success .MessageProcess__MainContent {
                color: #51cb53;
            }
            .MessageProcess--Error .MessageProcess__MainContent {
                color: #f93542;
            }
            .MessageProcess--Warning .MessageProcess__MainContent {
                color: #d9a242;
            }
            .MessageProcess--Info .MessageProcess__MainContent {
                color: #38a9e1;
            }
            .MessageProcess.Show {
                visibility: visible;
                opacity: 1;
            }

            .TextEditorContent__Content ul {
                list-style: initial;
            }

            html[lang=ar] .TextEditorContent__Content li {
                margin-right: 1.7rem;
            }

            html[lang=en] .TextEditorContent__Content li {
                margin-left: 1.7rem;
            }

            .HeaderPage {
                position: sticky;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 2;
                transition: padding 0.4s;
            }
            .HeaderPage__Wrap {
                width: 100%;
                background-color: #1B202D;
            }
            .HeaderPage__Content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 5rem;
            }
            .HeaderPage__MenusOpening .MenusOpening {
                display: flex;
                align-items: center;
            }
            .HeaderPage__MenusOpening .MenusOpening > * {
                padding: 0 0.8rem;
            }
            .HeaderPage__MenusOpening .MenusOpening .MenuIcon {
                visibility: visible;
                opacity: 1;
                transition: all 0.3s;
            }
            .HeaderPage__AccountAlerts .AccountAlerts {
                display: flex;
                align-items: center;
            }
            .HeaderPage__AccountAlerts .AccountAlerts > .UserImage .Dropdown,
            .HeaderPage__AccountAlerts .AccountAlerts .Alert .Dropdown {
                position: absolute;
                top: calc(100% + 0.9rem);
                border-bottom-left-radius: 10px;
                transform: scale(0.95);
                opacity: 0;
                visibility: hidden;
                overflow: hidden;
            }
            .HeaderPage__AccountAlerts .AccountAlerts > .UserImage .Dropdown.Show,
            .HeaderPage__AccountAlerts .AccountAlerts .Alert .Dropdown.Show {
                opacity: 1;
                visibility: visible;
                transform: scale(1);
            }
            .HeaderPage__AccountAlerts .AccountAlerts > .UserImage {
                margin: 0 0.8rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts > .UserImage > img {
                cursor: pointer;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown {
                right: 0;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown > * {
                width: 25rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Header {
                display: flex;
                align-items: flex-start;
                gap: 1.5rem;
                padding: 1.5rem 2rem;
                border-bottom: 1px solid #23364e;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Header .UserImage {
                width: 4rem;
                height: 4rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Header .UserDetails {
                flex: 1;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Header .UserDetails .UserName {
                font-size: 1.4rem;
                font-weight: 500;
                color: #fff;
                margin-bottom: 0.2rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Header .UserDetails .UserEmail {
                font-size: 1.2rem;
                color: #969ca2;
                word-break: break-word;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Content {
                padding: 1rem 2rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Item a {
                display: flex;
                align-items: flex-end;
                padding: 1rem 0;
                gap: 0.5rem;
                color: #6c7a87;
                transition: all 0.3s;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Item a i {
                font-size: 2rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Item a span {
                flex: 1;
                font-size: 1.4rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown__Item a:hover {
                color: #10C093;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts {
                display: flex;
                align-items: center;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert {
                position: relative;
                padding: 0 0.8rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert .Dropdown {
                right: 0.8rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Language .Dropdown__Item > a {
                display: block;
                width: 15rem;
                padding: 1rem 1.5rem;
                color: #fff;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Language .Dropdown__Item > a:hover {
                background-color: #171a21;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown > * {
                width: 33rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Header {
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                padding: 1.5rem 2rem;
                border-bottom: 1px solid #23364e;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Header .Title {
                color: #b6c6e3;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Header .ReadAll {
                text-align: right;
                font-size: 1.2rem;
                cursor: pointer;
                transition: color 0.3s;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Header .ReadAll:hover {
                color: #10C093;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Content {
                max-height: 20rem;
                overflow-y: auto;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Content::-webkit-scrollbar {
                width: 0.4rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Content::-webkit-scrollbar-track, .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Content::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 10px;
                transition: all 0.3s;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Content:hover::-webkit-scrollbar-track {
                background-color: rgba(24, 24, 24, 0.8705882353);
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Content:hover::-webkit-scrollbar-thumb {
                background-color: rgba(255, 255, 255, 0.2705882353);
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification {
                padding: 1rem 1.5rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification__Icon {
                width: 4rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification__Icon i {
                font-size: 2rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification__Details .NotificationTitle {
                font-size: 1.2rem;
                font-weight: 500;
                margin-bottom: 0.5rem;
                line-height: 1.4;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification__Details .NotificationDescription {
                font-size: 1.1rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification__Details .NotificationDate {
                font-size: 1rem;
                font-weight: 400;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Item .Notification__Remove i {
                font-size: 1.4rem;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Footer {
                padding: 1rem 2rem;
                text-align: center;
                border-top: 1px solid #23364e;
            }
            .HeaderPage__AccountAlerts .AccountAlerts .Alerts > .Alert--Notification .Dropdown__Footer a {
                font-size: 1.2rem;
                color: #10C093;
            }
            @media only screen and (max-width: 47.99em) {
                .HeaderPage__Content {
                    flex-direction: column;
                    height: 5rem;
                    padding: 0.5rem 0;
                }
                .HeaderPage__MenusOpening {
                    width: 100%;
                }
                .HeaderPage__MenusOpening .MenusOpening {
                    justify-content: space-between;
                }
                .HeaderPage__AccountAlerts {
                    display: none;
                    width: 100%;
                }
                .HeaderPage__AccountAlerts.Open {
                    display: block;
                }
                .HeaderPage__AccountAlerts .AccountAlerts {
                    justify-content: flex-end;
                }
                .HeaderPage.OpenMenu .HeaderPage__MenusOpening .MenusOpening .MenuIcon {
                    visibility: hidden;
                    opacity: 0;
                }
            }
            @media only screen and (min-width: 75em) {
                .HeaderPage:not(.HeaderPage--Print) {
                    padding-left: 7rem;
                }
                .HeaderPage:not(.HeaderPage--Print).OpenMenu {
                    padding-left: 26rem;
                }
                .HeaderPage:not(.HeaderPage--Print) .HeaderPage__MenusOpening .MenusOpening .Logo {
                    display: none;
                }
            }

            html[lang=ar] .HeaderPage {
                top: 0;
                left: initial;
                right: 0;
            }
            html[lang=ar] .HeaderPage__AccountAlerts .AccountAlerts .UserImage .Dropdown {
                right: initial;
                left: 0;
            }
            html[lang=ar] .HeaderPage__AccountAlerts .AccountAlerts .Alerts .Dropdown {
                right: initial;
                left: 0.8rem;
            }
            @media only screen and (min-width: 75em) {
                html[lang=ar] .HeaderPage:not(.HeaderPage--Print) {
                    padding-left: 0;
                    padding-right: 7rem;
                }
                html[lang=ar] .HeaderPage:not(.HeaderPage--Print).OpenMenu {
                    padding-left: 0;
                    padding-right: 26rem;
                }
                html[lang=ar] .HeaderPage:not(.HeaderPage--Print) .HeaderPage__MenusOpening .MenusOpening .Logo {
                    display: none;
                }
            }

            .NavigationsMenu {
                position: fixed;
                top: 0;
                left: 0;
                transform: translateX(-100%);
                z-index: 3;
                transition: all 0.3s;
            }
            .NavigationsMenu__Wrap {
                background-color: #1B202D;
            }
            .NavigationsMenu__Content {
                width: 26rem;
                height: 100vh;
                transition: all 0.4s;
            }
            .NavigationsMenu__Content > * {
                padding: 0 1.5rem;
            }
            .NavigationsMenu__Header {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                height: 5rem;
            }
            .NavigationsMenu__CloseMenu {
                position: absolute;
                display: none;
                top: 50%;
                right: 1rem;
                font-size: 1.6rem;
                padding: 0.5rem;
                transform: translateY(-50%);
            }
            .NavigationsMenu__Navigations {
                padding-top: 2rem;
                max-height: calc(100vh - 5rem - 15vh);
                overflow-y: auto;
                border-top: 1px solid #23364e;
            }
            .NavigationsMenu__Navigations::-webkit-scrollbar {
                width: 0.4rem;
            }
            .NavigationsMenu__Navigations::-webkit-scrollbar-track, .NavigationsMenu__Navigations::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 10px;
                transition: all 0.3s;
            }
            .NavigationsMenu__Navigations:hover::-webkit-scrollbar-track {
                background-color: rgba(24, 24, 24, 0.8705882353);
            }
            .NavigationsMenu__Navigations:hover::-webkit-scrollbar-thumb {
                background-color: rgba(255, 255, 255, 0.2705882353);
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__Title {
                margin: 1.5rem 0 1.5rem 0.5rem;
                color: #b6c6e3;
                font-size: 1.2rem;
                text-transform: uppercase;
                font-weight: 600;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem {
                position: relative;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem:not(:last-child), .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem:not(:last-child) {
                margin-bottom: 0.5rem;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title {
                position: relative;
                cursor: pointer;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title .NavName, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title .NavName {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                gap: 0.5rem;
                color: #fff;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title .NavName .Label, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title .NavName .Label {
                font-size: 1.5rem;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title .NavName .Icon, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title .NavName .Icon {
                font-size: 1.8rem;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .NavName, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title {
                padding: 1rem 1.8rem 1rem 0.5rem;
                border-radius: 8px;
                transition: all 0.3s;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .NavName:hover, .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title:hover {
                background-color: #3F51B5;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__SubItems {
                max-height: 0;
                padding-left: 2.2rem;
                overflow: hidden;
                margin-top: 1rem;
                visibility: hidden;
                opacity: 0;
                transition: all 0.5s;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title .ArrowRight {
                position: absolute;
                top: 50%;
                right: 0.3rem;
                transform: translateY(-50%);
                color: #fff;
                font-size: 1.8rem;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem.Open > .Title {
                background-color: #3F51B5;
            }
            .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem.Open .NavigationsGroup__SubItems {
                max-height: 100vh;
                visibility: visible;
                opacity: 1;
            }
            @media only screen and (max-width: 74.99em) {
                .NavigationsMenu {
                    box-shadow: 0 0.8rem 1.5rem 0 rgba(0, 0, 0, 0.35);
                }
                .NavigationsMenu.Open {
                    transform: translateX(0);
                }
                .NavigationsMenu.Open ~ .MainContent::after {
                    visibility: visible;
                    opacity: 1;
                }
                .NavigationsMenu.Open .NavigationsMenu__CloseMenu {
                    display: initial;
                }
            }
            @media only screen and (max-width: 35.99em) {
                .NavigationsMenu__Content {
                    width: 100vw;
                }
                .NavigationsMenu__CloseMenu {
                    right: 3rem;
                }
            }
            @media only screen and (min-width: 75em) {
                .NavigationsMenu {
                    border-right: 2px solid #23364e;
                    transform: translateX(0);
                }
                .NavigationsMenu ~ .MainContent {
                    padding-left: 26rem;
                }
                .NavigationsMenu:not(.Open) ~ .MainContent {
                    padding-left: 7rem;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__Content {
                    width: 7rem;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__Header .Logo__SystemName {
                    display: none;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__Title {
                    display: none;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title .NavName, .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title .NavName {
                    justify-content: center;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title .NavName .Label, .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title .NavName .Label {
                    display: none;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .Title .NavName .Icon, .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem .Title .NavName .Icon {
                    font-size: 2rem;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .NavName, .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title {
                    padding: 1rem 0;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title .ArrowRight {
                    display: none;
                }
                .NavigationsMenu:not(.Open) .NavigationsMenu__NavigationsGroup .NavigationsGroup__SubItems {
                    display: none;
                }
            }

            html[lang=ar] .NavigationsMenu {
                left: initial;
                right: 0;
                transform: translateX(100%);
            }
            html[lang=ar] .NavigationsMenu__CloseMenu {
                right: initial;
                left: 1rem;
            }
            html[lang=ar] .NavigationsMenu__NavigationsGroup .NavigationsGroup__Title {
                margin: 1.5rem 0.5rem 1.5rem 0;
            }
            html[lang=ar] .NavigationsMenu__NavigationsGroup .NavigationsGroup__NavItem .NavName, html[lang=ar] .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title {
                padding: 1rem 0.5rem 1rem 1.8rem;
            }
            html[lang=ar] .NavigationsMenu__NavigationsGroup .NavigationsGroup__SubItems {
                padding-left: 0;
                padding-right: 2.2rem;
            }
            html[lang=ar] .NavigationsMenu__NavigationsGroup .NavigationsGroup__GroupItem > .Title .ArrowRight {
                right: initial;
                left: 0.3rem;
                transform: translateY(-50%) rotate(180deg);
            }
            @media only screen and (max-width: 74.99em) {
                html[lang=ar] .NavigationsMenu.Open {
                    transform: translateX(0);
                }
            }
            @media only screen and (max-width: 35.99em) {
                html[lang=ar] .NavigationsMenu__CloseMenu {
                    right: initial;
                    left: 3rem;
                }
            }
            @media only screen and (min-width: 75em) {
                html[lang=ar] .NavigationsMenu {
                    border-right: none;
                    border-left: 2px solid #23364e;
                    transform: translateX(0);
                }
                html[lang=ar] .NavigationsMenu ~ .MainContent {
                    padding-right: 26rem;
                    padding-left: 0;
                }
                html[lang=ar] .NavigationsMenu:not(.Open) ~ .MainContent {
                    padding-left: 0;
                    padding-right: 7rem;
                }
            }

            .Breadcrumb {
                position: relative;
                width: 100%;
            }
            .Breadcrumb__Header {
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                margin-bottom: 1rem;
            }
            .Breadcrumb__Title {
                color: #b6c6e3;
                text-transform: capitalize;
            }
            .Breadcrumb__Path {
                display: flex;
                flex-direction: row;
                gap: 1rem;
                font-size: 1.4rem;
                color: #96A2B4;
            }
            .Breadcrumb__Path a {
                color: #96A2B4;
            }
            .Breadcrumb__Summery .Summery {
                font-size: 1.4rem;
                color: #96A2B4;
            }
            @media only screen and (max-width: 35.99em) {
                .Breadcrumb__Header {
                    flex-direction: column-reverse;
                    row-gap: 1rem;
                    align-items: flex-start;
                }
            }

            .ListData {
                position: relative;
            }
            .ListData__Head {
                background-color: #212a3f;
                padding: 0.5rem 1rem;
                border-radius: 5px;
            }
            .ListData__Title {
                text-transform: uppercase;
                font-weight: 800;
                color: #96A2B4;
            }
            .ListData__Item .Data_Col {
                flex-grow: 1;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 2.5rem 1rem;
                transition: all 0.3s;
            }
            .ListData__Item .Data_Col .Data_Label {
                width: 50%;
            }
            .ListData__Item .Data_Col .Data_Value {
                width: 50%;
                text-align: left;
                word-break: break-word;
            }
            .ListData__Item .Data_Col--End {
                justify-content: flex-end;
                flex-grow: 0;
                min-width: 10rem;
            }
            .ListData__Item--Action, .ListData__Item--NoAction {
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: #6c7a87;
            }
            .ListData__Item--Action {
                cursor: pointer;
            }
            .ListData__Item:hover .Data_Col {
                color: #fff;
            }
            .ListData__Item:not(:last-child) {
                border-bottom: 1px solid #23364e;
            }
            .ListData__CustomItem {
                padding: 2.5rem 1rem;
            }
            .ListData:not(:last-child) {
                margin-bottom: 3rem;
            }
            @media only screen and (max-width: 47.99em) {
                .ListData:not(.NotResponsive) .ListData__Item .Data_Col {
                    flex-direction: column;
                }
                .ListData:not(.NotResponsive) .ListData__Item .Data_Col .Data_Label {
                    width: 100%;
                }
                .ListData:not(.NotResponsive) .ListData__Item .Data_Col .Data_Value {
                    width: 100%;
                }
            }

            html[lang=ar] .ListData__Item .Data_Col .Data_Value {
                text-align: right;
            }

            .Row {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }
            .Row > * {
                width: 100%;
                max-width: 100%;
                margin-top: 2rem;
            }
            .Row.m0 > * {
                margin-top: 0;
            }
            .Row .Col {
                flex: 0 1 auto;
                max-width: 100%;
            }
            .Row.Gap-0 > * {
                padding: 0;
            }
            .Row.GapR-0 > * {
                padding-top: 0;
                padding-bottom: 0;
            }
            .Row.GapC-0 > * {
                padding-left: 0;
                padding-right: 0;
            }
            .Row.GapC-0, .Row.Gap-0 {
                margin-left: 0;
                margin-right: 0;
            }
            .Row.Gap-1 > * {
                padding: 1rem;
            }
            .Row.GapR-1 > * {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
            .Row.GapC-1 > * {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .Row.GapC-1, .Row.Gap-1 {
                margin-left: -1rem;
                margin-right: -1rem;
            }
            .Row.Gap-1-5 > * {
                padding: 1.5rem;
            }
            .Row.GapR-1-5 > * {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .Row.GapC-1-5 > * {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
            .Row.GapC-1-5, .Row.Gap-1-5 {
                margin-left: -1.5rem;
                margin-right: -1.5rem;
            }
            .Row.Gap-2 > * {
                padding: 2rem;
            }
            .Row.GapR-2 > * {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
            .Row.GapC-2 > * {
                padding-left: 2rem;
                padding-right: 2rem;
            }
            .Row.GapC-2, .Row.Gap-2 {
                margin-left: -2rem;
                margin-right: -2rem;
            }
            .Row.Gap-3 > * {
                padding: 3rem;
            }
            .Row.GapR-3 > * {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
            .Row.GapC-3 > * {
                padding-left: 3rem;
                padding-right: 3rem;
            }
            .Row.GapC-3, .Row.Gap-3 {
                margin-left: -3rem;
                margin-right: -3rem;
            }
            .Row.justify-flex-start {
                justify-content: flex-start;
            }
            .Row.justify-flex-end {
                justify-content: flex-end;
            }
            .Row.justify-space-between {
                justify-content: space-between;
            }
            .Row.justify-space-around {
                justify-content: space-around;
            }
            .Row.justify-space-evenly {
                justify-content: space-evenly;
            }
            .Row.justify-center {
                justify-content: center;
            }
            .Row.alignItem-center {
                align-items: center;
            }
            @media only screen and (min-width: 0em) {
                .Row .Col-1-xs {
                    flex: 0 1 auto;
                    max-width: 8.3333333333%;
                }
                .Row .Col-2-xs {
                    flex: 0 1 auto;
                    max-width: 16.6666666667%;
                }
                .Row .Col-3-xs {
                    flex: 0 1 auto;
                    max-width: 25%;
                }
                .Row .Col-4-xs {
                    flex: 0 1 auto;
                    max-width: 33.3333333333%;
                }
                .Row .Col-5-xs {
                    flex: 0 1 auto;
                    max-width: 41.6666666667%;
                }
                .Row .Col-6-xs {
                    flex: 0 1 auto;
                    max-width: 50%;
                }
                .Row .Col-7-xs {
                    flex: 0 1 auto;
                    max-width: 58.3333333333%;
                }
                .Row .Col-8-xs {
                    flex: 0 1 auto;
                    max-width: 66.6666666667%;
                }
                .Row .Col-9-xs {
                    flex: 0 1 auto;
                    max-width: 75%;
                }
                .Row .Col-10-xs {
                    flex: 0 1 auto;
                    max-width: 83.3333333333%;
                }
                .Row .Col-11-xs {
                    flex: 0 1 auto;
                    max-width: 91.6666666667%;
                }
                .Row .Col-12-xs {
                    flex: 0 1 auto;
                    max-width: 100%;
                }
            }
            @media only screen and (min-width: 36em) {
                .Row .Col-1-sm {
                    flex: 0 1 auto;
                    max-width: 8.3333333333%;
                }
                .Row .Col-2-sm {
                    flex: 0 1 auto;
                    max-width: 16.6666666667%;
                }
                .Row .Col-3-sm {
                    flex: 0 1 auto;
                    max-width: 25%;
                }
                .Row .Col-4-sm {
                    flex: 0 1 auto;
                    max-width: 33.3333333333%;
                }
                .Row .Col-5-sm {
                    flex: 0 1 auto;
                    max-width: 41.6666666667%;
                }
                .Row .Col-6-sm {
                    flex: 0 1 auto;
                    max-width: 50%;
                }
                .Row .Col-7-sm {
                    flex: 0 1 auto;
                    max-width: 58.3333333333%;
                }
                .Row .Col-8-sm {
                    flex: 0 1 auto;
                    max-width: 66.6666666667%;
                }
                .Row .Col-9-sm {
                    flex: 0 1 auto;
                    max-width: 75%;
                }
                .Row .Col-10-sm {
                    flex: 0 1 auto;
                    max-width: 83.3333333333%;
                }
                .Row .Col-11-sm {
                    flex: 0 1 auto;
                    max-width: 91.6666666667%;
                }
                .Row .Col-12-sm {
                    flex: 0 1 auto;
                    max-width: 100%;
                }
            }
            @media only screen and (min-width: 48em) {
                .Row .Col-1-md {
                    flex: 0 1 auto;
                    max-width: 8.3333333333%;
                }
                .Row .Col-2-md {
                    flex: 0 1 auto;
                    max-width: 16.6666666667%;
                }
                .Row .Col-3-md {
                    flex: 0 1 auto;
                    max-width: 25%;
                }
                .Row .Col-4-md {
                    flex: 0 1 auto;
                    max-width: 33.3333333333%;
                }
                .Row .Col-5-md {
                    flex: 0 1 auto;
                    max-width: 41.6666666667%;
                }
                .Row .Col-6-md {
                    flex: 0 1 auto;
                    max-width: 50%;
                }
                .Row .Col-7-md {
                    flex: 0 1 auto;
                    max-width: 58.3333333333%;
                }
                .Row .Col-8-md {
                    flex: 0 1 auto;
                    max-width: 66.6666666667%;
                }
                .Row .Col-9-md {
                    flex: 0 1 auto;
                    max-width: 75%;
                }
                .Row .Col-10-md {
                    flex: 0 1 auto;
                    max-width: 83.3333333333%;
                }
                .Row .Col-11-md {
                    flex: 0 1 auto;
                    max-width: 91.6666666667%;
                }
                .Row .Col-12-md {
                    flex: 0 1 auto;
                    max-width: 100%;
                }
            }
            @media only screen and (min-width: 62em) {
                .Row .Col-1-lg {
                    flex: 0 1 auto;
                    max-width: 8.3333333333%;
                }
                .Row .Col-2-lg {
                    flex: 0 1 auto;
                    max-width: 16.6666666667%;
                }
                .Row .Col-3-lg {
                    flex: 0 1 auto;
                    max-width: 25%;
                }
                .Row .Col-4-lg {
                    flex: 0 1 auto;
                    max-width: 33.3333333333%;
                }
                .Row .Col-5-lg {
                    flex: 0 1 auto;
                    max-width: 41.6666666667%;
                }
                .Row .Col-6-lg {
                    flex: 0 1 auto;
                    max-width: 50%;
                }
                .Row .Col-7-lg {
                    flex: 0 1 auto;
                    max-width: 58.3333333333%;
                }
                .Row .Col-8-lg {
                    flex: 0 1 auto;
                    max-width: 66.6666666667%;
                }
                .Row .Col-9-lg {
                    flex: 0 1 auto;
                    max-width: 75%;
                }
                .Row .Col-10-lg {
                    flex: 0 1 auto;
                    max-width: 83.3333333333%;
                }
                .Row .Col-11-lg {
                    flex: 0 1 auto;
                    max-width: 91.6666666667%;
                }
                .Row .Col-12-lg {
                    flex: 0 1 auto;
                    max-width: 100%;
                }
            }
            @media only screen and (min-width: 75em) {
                .Row .Col-1-xl {
                    flex: 0 1 auto;
                    max-width: 8.3333333333%;
                }
                .Row .Col-2-xl {
                    flex: 0 1 auto;
                    max-width: 16.6666666667%;
                }
                .Row .Col-3-xl {
                    flex: 0 1 auto;
                    max-width: 25%;
                }
                .Row .Col-4-xl {
                    flex: 0 1 auto;
                    max-width: 33.3333333333%;
                }
                .Row .Col-5-xl {
                    flex: 0 1 auto;
                    max-width: 41.6666666667%;
                }
                .Row .Col-6-xl {
                    flex: 0 1 auto;
                    max-width: 50%;
                }
                .Row .Col-7-xl {
                    flex: 0 1 auto;
                    max-width: 58.3333333333%;
                }
                .Row .Col-8-xl {
                    flex: 0 1 auto;
                    max-width: 66.6666666667%;
                }
                .Row .Col-9-xl {
                    flex: 0 1 auto;
                    max-width: 75%;
                }
                .Row .Col-10-xl {
                    flex: 0 1 auto;
                    max-width: 83.3333333333%;
                }
                .Row .Col-11-xl {
                    flex: 0 1 auto;
                    max-width: 91.6666666667%;
                }
                .Row .Col-12-xl {
                    flex: 0 1 auto;
                    max-width: 100%;
                }
            }

            .Taps {
                position: relative;
            }
            .Taps__List {
                position: relative;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                column-gap: 2.5rem;
                border-bottom: 1px solid #23364e;
            }
            .Taps__Item {
                position: relative;
                padding: 1.5rem;
                color: #b6c6e3;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
            }
            .Taps__Item:hover {
                color: #fff;
            }
            .Taps__Item::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                transform: translateY(50%);
                width: 100%;
                height: 2px;
                border-radius: 10px;
                background-color: transparent;
                transition: all 0.3s;
            }
            .Taps__Item--Icon {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            .Taps__Item.Active {
                color: #10C093;
            }
            .Taps__Item.Active::after {
                background-color: #10C093;
            }
            .Taps__Panel {
                display: none;
            }
            .Taps__Panel.Active {
                display: block;
            }

            .Table {
                position: relative;
            }
            .Table__BulkTools {
                visibility: hidden;
                opacity: 0;
                transition: all 0.3s;
            }
            .Table__BulkTools.Show {
                visibility: visible;
                opacity: 1;
            }
            .Table__BulkTools .BulkTools {
                position: relative;
            }
            .Table__BulkTools .BulkTools .Form {
                display: flex;
                gap: 1rem;
                align-items: center;
            }
            .Table__PrintMenu {
                position: relative;
            }
            .Table__PrintMenu .PrintMenu__Menu {
                position: absolute;
                border-radius: 5px;
                visibility: hidden;
                opacity: 0;
                top: 100%;
                right: 0;
                overflow: hidden;
                z-index: 2;
            }
            .Table__PrintMenu .PrintMenu__Menu .Dropdown__Item {
                padding: 1rem 1.5rem;
                white-space: nowrap;
            }
            .Table__PrintMenu .PrintMenu__Menu .Dropdown__Item:hover {
                background-color: #2d3f54;
                color: #fff;
            }
            .Table__PrintMenu .PrintMenu__Menu.Show {
                visibility: visible;
                opacity: 1;
            }
            .Table__ContentTable {
                position: relative;
                width: 100%;
                max-width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
            }
            .Table__Table {
                display: table;
                width: 100%;
                font-size: 1.3rem;
                border-collapse: collapse;
            }
            .Table__Table .GroupRows {
                display: table-row-group;
            }
            .Table__Table .GroupRows__MainRow.Show {
                background-color: #3F51B5;
                color: #fff;
            }
            .Table__Table .GroupRows__SubRows {
                display: none;
                background-color: #11151e;
            }
            .Table__Table .Item {
                display: table-row;
            }
            .Table__Table .Item__Col {
                position: relative;
                display: table-cell;
                vertical-align: middle;
                padding: 0.8rem;
                border-bottom: 1px solid #23364e;
            }
            .Table__Table .Item__Col.Link a:hover {
                color: #10C093;
            }
            .Table__Table .Item__Col.fitContent {
                width: 1%;
            }
            .Table__Table .Item__Col--Check {
                line-height: 1;
            }
            .Table__Table .Item__Col--Check .CheckBoxItem:checked + .CheckBoxRow {
                background-color: #10C093;
            }
            .Table__Table .Item__Col--Check .CheckBoxItem:checked + .CheckBoxRow > .material-icons {
                display: inline-block;
                color: #fff;
            }
            .Table__Table .Item__Col--Check .CheckBoxRow {
                width: 1.5rem;
                height: 1.5rem;
            }
            .Table__Table .Item__Col--Check .CheckBoxRow > .material-icons {
                font-size: 1.4rem;
                left: 0;
                top: 0;
            }
            .Table__Table .Item__Col--Tools .Tools {
                position: relative;
                visibility: hidden;
                opacity: 0;
                transition: all 0.3s;
            }
            .Table__Table .Item__Col--Tools .Tools .IconClick {
                position: relative;
                font-size: 1.6rem;
                color: #96A2B4;
            }
            .Table__Table .Item__Col--Tools .Tools .IconClick.View:hover {
                color: #10C093;
            }
            .Table__Table .Item__Col--Tools .Tools .IconClick.Remove:hover {
                color: #f93542;
            }
            .Table__Table .Item__Col--Details .Details__Button {
                cursor: pointer;
                transition: all 0.3s;
            }
            .Table__Table .Item__Col--Details .Details__Button:hover {
                color: #10C093;
            }
            .Table__Table .Item:hover .Item__Col--Tools .Tools {
                visibility: visible;
                opacity: 1;
            }

            html[lang=en] .Table__Table .Item__Col:first-child {
                padding-left: 2.4rem;
            }
            html[lang=en] .Table__Table .Item__Col:last-child {
                padding-right: 2.4rem;
            }

            html[lang=ar] .Table__PrintMenu .PrintMenu__Menu {
                right: initial;
                left: 0;
            }
            html[lang=ar] .Table__Table .Item__Col:first-child {
                padding-right: 2.4rem;
            }
            html[lang=ar] .Table__Table .Item__Col:last-child {
                padding-left: 2.4rem;
            }

            .Cookies {
                position: fixed;
                right: 0;
                bottom: 5rem;
                max-width: 34.5rem;
                width: 100%;
                border-radius: 5px;
                transform: translateX(100%);
                padding: 1.5rem 2.5rem 2.2rem;
                box-shadow: 0 0 1.5rem 0 rgba(0, 0, 0, 0.35);
                visibility: hidden;
                opacity: 0;
                transition: all 0.3s;
            }
            .Cookies__Header {
                display: flex;
                align-items: center;
                column-gap: 1.5rem;
                color: #3F51B5;
                margin-bottom: 1.5rem;
            }
            .Cookies__Icon {
                font-size: 3.2rem;
            }
            .Cookies__Content {
                margin-bottom: 2.5rem;
            }
            .Cookies__ReadMore {
                color: #10C093;
            }
            .Cookies__ReadMore:hover {
                color: #fff;
            }
            .Cookies__Buttons {
                display: flex;
                width: 100%;
                justify-content: space-between;
                align-items: center;
            }
            .Cookies--Dark {
                background-color: #1B2633;
            }
            .Cookies.Show {
                right: 2rem;
                transform: translateX(0);
                visibility: visible;
                opacity: 1;
            }
            @media only screen and (max-width: 35.99em) {
                .Cookies {
                    right: 50%;
                    transform: translateX(50%);
                }
            }

            html[lang=ar] .Cookies {
                right: initial;
                left: 0;
            }
            html[lang=ar] .Cookies.Show {
                right: initial;
                left: 2rem;
            }

            .NoData__Content {
                text-align: center;
            }
            .NoData__Image img {
                max-width: 25rem;
                width: 100%;
            }
            .NoData__Title {
                color: #b6c6e3;
                letter-spacing: 3px;
                text-shadow: 2px 2px rgba(0, 0, 0, 0.35);
            }

            .Notification {
                position: relative;
                transition: all 0.3s;
            }
            .Notification__Content {
                display: flex;
            }
            .Notification__Icon {
                width: 7rem;
            }
            .Notification__Icon i {
                font-size: 4rem;
                padding: 0.5rem;
                border-radius: 50%;
            }
            .Notification__Icon--Send i {
                color: #1EE0AC;
                background-color: #193E40;
            }
            .Notification__Icon--Receive i {
                color: #F4BD0E;
                background-color: #393828;
            }
            .Notification__Details {
                flex: 1;
            }
            .Notification__Details > *:not(:last-child) {
                margin-bottom: 0.5rem;
            }
            .Notification__Details > *:last-child {
                margin: 0;
            }
            .Notification__Details .NotificationTitle {
                font-size: 1.6rem;
                font-weight: 600;
                line-height: 1.4;
                color: #dadada;
            }
            .Notification__Details .NotificationDescription {
                font-size: 1.3rem;
                font-weight: 400;
            }
            .Notification__Details .NotificationDate {
                font-size: 1.2rem;
                font-weight: 400;
                color: #6c7a87;
            }
            .Notification__Remove {
                cursor: pointer;
            }
            .Notification__Remove i {
                font-size: 2rem;
                transition: color 0.3s;
            }
            .Notification__Remove:hover i {
                color: #10C093;
            }
            .Notification:hover {
                background-color: #202738;
            }

            .FooterPage {
                position: relative;
                width: 100%;
                z-index: 3;
                transition: padding 0.4s;
            }
            .FooterPage__Wrap {
                background-color: #1B202D;
            }
            .FooterPage__Content {
                padding: 1.5rem 0;
                font-size: 1.2rem;
                color: #fff;
            }
            .FooterPage__Links {
                text-align: right;
            }
            @media only screen and (min-width: 75em) {
                .FooterPage {
                    padding-left: 7rem;
                }
                .FooterPage.OpenMenu {
                    padding-left: 26rem;
                }
            }
            .FooterPage--Print {
                padding-left: 0;
            }
            .FooterPage--Print.OpenMenu {
                padding-left: 0;
            }

            html[lang=ar] .FooterPage__Links {
                text-align: left;
            }
            @media only screen and (min-width: 75em) {
                html[lang=ar] .FooterPage {
                    padding-left: 0;
                    padding-right: 7rem;
                }
                html[lang=ar] .FooterPage.OpenMenu {
                    padding-left: 0;
                    padding-right: 26rem;
                }
            }
            html[lang=ar] .FooterPage--Print {
                padding-right: 0;
            }
            html[lang=ar] .FooterPage--Print.OpenMenu {
                padding-right: 0;
            }

            .AuthenticationPage {
                position: relative;
            }
            .AuthenticationPage__Content {
                position: relative;
                display: flex;
                height: 100vh;
                overflow: hidden;
            }
            .AuthenticationPage__Logo {
                position: absolute;
                left: 50%;
                top: 1rem;
                transform: translateX(-50%);
            }
            .AuthenticationPage__Logo .Logo__Image {
                width: 6rem;
                height: 6rem;
            }
            .AuthenticationPage__ImagePage {
                width: 50%;
            }
            .AuthenticationPage__ImagePage > img {
                object-fit: contain;
                object-position: center;
            }
            .AuthenticationPage__LoginForm {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 50%;
                padding: 0 2rem;
                background-color: #1B202D;
            }
            .AuthenticationPage__LoginForm .Content {
                max-width: 100%;
                width: 40rem;
                margin: auto 0;
            }
            .AuthenticationPage__Title {
                color: #96A2B4;
                text-transform: capitalize;
            }
            .AuthenticationPage__Text {
                margin-bottom: 2.5rem;
            }
            .AuthenticationPage__Text .LoginPage__Title {
                margin-bottom: 0.5rem;
            }
            .AuthenticationPage__Form .Form__Button .Button {
                width: 100%;
            }
            @media only screen and (max-width: 61.99em) {
                .AuthenticationPage__Content {
                    height: auto;
                    min-height: 100vh;
                    overflow: initial;
                }
                .AuthenticationPage__Logo {
                    top: 0;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
                .AuthenticationPage__Logo .Logo > a {
                    justify-content: center;
                }
                .AuthenticationPage__ImagePage {
                    display: none;
                }
                .AuthenticationPage__LoginForm {
                    width: 100%;
                }
                .AuthenticationPage__LoginForm .Content {
                    position: relative;
                    width: 55rem;
                    border: 1px solid #96A2B4;
                    border-radius: 5px;
                    padding: 6rem 3rem 3rem;
                }
            }

            .MainContent {
                position: relative;
                min-height: calc(100vh - 5rem);
                z-index: 0;
                transition: all 0.4s;
            }
            .MainContent::after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(26, 32, 46, 0.6);
                visibility: hidden;
                opacity: 0;
                z-index: 4;
                transition: all 0.4s;
            }
            .MainContent__Section {
                padding: 1.5rem 0;
            }
            .MainContent__Section--Login {
                padding: 0;
            }
            .MainContent .RowPage {
                display: flex;
                flex-wrap: wrap;
            }
            .MainContent .RowPage > * {
                flex: 1;
            }

            .ProfilePage__Image {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            .ProfilePage__Image .UserImage {
                width: 10rem;
                height: 10rem;
            }
            .ProfilePage__Image .Text {
                text-align: center;
            }
            .ProfilePage__Image .Text > *:not(:last-child) {
                margin-bottom: 0.8rem;
            }
            .ProfilePage__Image .Text .UserName {
                color: #96A2B4;
                font-weight: 600;
                font-size: 1.8rem;
            }
            .ProfilePage__Image .Text .Specialization {
                font-size: 1.4rem;
            }
            .ProfilePage__Image .Text .Date {
                font-size: 1.4rem;
            }
            .ProfilePage__Connection .SocialMedia {
                flex-direction: row;
                justify-content: space-between;
            }
            .ProfilePage__PasswordChange .PasswordChange,
            .ProfilePage__PasswordChange .DeleteAccount, .ProfilePage__DeleteAccount .PasswordChange,
            .ProfilePage__DeleteAccount .DeleteAccount {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                row-gap: 1.5rem;
            }
            .ProfilePage__PasswordChange .PasswordChange__Label > *,
            .ProfilePage__PasswordChange .DeleteAccount__Label > *, .ProfilePage__DeleteAccount .PasswordChange__Label > *,
            .ProfilePage__DeleteAccount .DeleteAccount__Label > * {
                margin-bottom: 0.5rem;
            }
            .ProfilePage__PasswordChange .PasswordChange__Title,
            .ProfilePage__PasswordChange .DeleteAccount__Title, .ProfilePage__DeleteAccount .PasswordChange__Title,
            .ProfilePage__DeleteAccount .DeleteAccount__Title {
                color: #fff;
            }
            .ProfilePage__PasswordChange .PasswordChange__Text,
            .ProfilePage__PasswordChange .DeleteAccount__Text, .ProfilePage__DeleteAccount .PasswordChange__Text,
            .ProfilePage__DeleteAccount .DeleteAccount__Text {
                color: #96A2B4;
            }
            .ProfilePage__PasswordChange .PasswordChange__LastChange,
            .ProfilePage__PasswordChange .DeleteAccount__LastChange, .ProfilePage__DeleteAccount .PasswordChange__LastChange,
            .ProfilePage__DeleteAccount .DeleteAccount__LastChange {
                font-size: 1.2rem;
            }
            .ProfilePage--My .ProfilePage__Image .UserImage {
                cursor: pointer;
            }
            .ProfilePage--My .ProfilePage__Image .UserImage__Edit {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #3F51B5;
                border-radius: 50%;
                visibility: hidden;
                opacity: 0;
                transition: all 0.4s;
            }
            .ProfilePage--My .ProfilePage__Image .UserImage__Edit .EditIcon {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #fff;
            }
            .ProfilePage--My .ProfilePage__Image .UserImage .LockOpenIcon {
                position: absolute;
                bottom: 0;
                left: 0;
                background-color: #3F51B5;
                color: #fff;
                padding: 0.5rem;
                border-radius: 50%;
                visibility: visible;
                opacity: 1;
                transition: all 0.4s;
            }
            .ProfilePage--My .ProfilePage__Image .UserImage:hover .UserImage__Edit {
                visibility: visible;
                opacity: 1;
            }
            .ProfilePage--My .ProfilePage__Image .UserImage:hover .LockOpenIcon {
                visibility: hidden;
                opacity: 0;
            }
            .ProfilePage--My .ProfilePage__Connection .Card__Header {
                display: flex;
                align-items: center;
                gap: 1rem;
            }
            .ProfilePage--My .ProfilePage__Connection .EditIcon {
                visibility: hidden;
                opacity: 0;
            }
            .ProfilePage--My .ProfilePage__Connection:hover .EditIcon {
                visibility: visible;
                opacity: 1;
            }
            @media only screen and (max-width: 47.99em) {
                .ProfilePage__Connection .SocialMedia {
                    justify-content: center;
                    gap: 1rem;
                    flex-wrap: wrap;
                }
            }

            html[lang=ar] .ProfilePage--My .ProfilePage__Image .UserImage .LockOpenIcon {
                left: initial;
                right: 0;
            }

            .MessagePage {
                position: relative;
            }
            .MessagePage__Content {
                max-width: 55rem;
                width: 100%;
                margin: auto;
            }
            .MessagePage__Image {
                width: 100%;
            }
            .MessagePage__Title {
                text-align: center;
                letter-spacing: 3px;
                text-shadow: 2px 2px rgba(0, 0, 0, 0.35);
                margin-bottom: 2rem;
                color: #b6c6e3;
            }
            .MessagePage__Title h2 {
                font-size: 3rem;
            }
            .MessagePage__Description {
                text-align: center;
            }
            .MessagePage--404 .MessagePage__Image {
                max-height: 45rem;
                height: 100%;
            }
            .MessagePage--ComingSoon .MessagePage__Image {
                max-height: 36rem;
                height: 100%;
            }

            .PrintPage__CompanyInfo {
                display: flex;
                align-items: center;
                gap: 2rem;
                padding: 1rem;
            }
            .PrintPage__CompanyInfo .ImageCompany {
                width: 10rem;
            }
            .PrintPage__CompanyInfo .ImageCompany > img {
                width: 100%;
                border-radius: 50%;
            }
            .PrintPage__CompanyInfo .DescriptionCompany {
                flex: 1;
            }
            .PrintPage__CompanyInfo .DescriptionCompany .Text {
                display: flex;
                flex-wrap: wrap;
            }
            .PrintPage__CompanyInfo .DescriptionCompany .Text > * {
                width: 50%;
                padding: 1rem;
                margin-bottom: 0.5rem;
                font-size: 1.6rem;
                font-weight: 600;
                color: #b6c6e3;
            }
            .PrintPage__TextEditorContent {
                padding: 1.5rem 1rem;
                color: #fff;
            }
            .PrintPage__TextEditorContent .TextEditorContent__Content .Content {
                background-color: #1B2633;
            }
            .PrintPage .ListData--CustomPrint .ListData__Head {
                margin-bottom: 1rem;
            }
            .PrintPage .ListData--CustomPrint .ListData__Item {
                color: #fff;
            }
            .PrintPage .ListData--CustomPrint .ListData__Item .Data_Col {
                padding: 1.5rem 1rem;
            }
            .PrintPage .Table__Table .Item__Col {
                width: 1%;
            }

            .NotificationPage {
                position: relative;
            }
            .NotificationPage__Buttons {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                gap: 1rem;
            }
            .NotificationPage__NotificationList .Notification:not(:last-child)::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 2px;
                border-radius: 5px;
                background-color: #000;
                background-color: #35393f;
            }

            /**
 * Trumbowyg v2.27.3 - A lightweight WYSIWYG editor
 * Default stylesheet for Trumbowyg editor
 * ------------------------
 * @link https://alex-d.github.io/Trumbowyg/
 * @license MIT
 * @author Alexandre Demode (Alex-D)
 *         Twitter : @AlexandreDemode
 *         Website : alex-d.fr
 */
            #trumbowyg-icons,
            .trumbowyg-icons {
                overflow: hidden;
                visibility: hidden;
                height: 0;
                width: 0;
            }
            #trumbowyg-icons svg,
            .trumbowyg-icons svg {
                height: 0;
                width: 0;
            }

            .trumbowyg-box *,
            .trumbowyg-box *::before,
            .trumbowyg-box *::after,
            .trumbowyg-modal *,
            .trumbowyg-modal *::before,
            .trumbowyg-modal *::after {
                box-sizing: border-box;
            }
            .trumbowyg-box svg,
            .trumbowyg-modal svg {
                width: 17px;
                height: 100%;
                color: #222;
                fill: #222;
            }

            .trumbowyg-box {
                display: flex;
                flex-direction: column;
                min-height: 300px;
            }

            .trumbowyg-editor-box {
                display: block;
                flex: 1;
            }

            .trumbowyg-box,
            .trumbowyg-editor-box {
                position: relative;
                width: 100%;
                border: 1px solid #d7e0e2;
            }

            .trumbowyg-box .trumbowyg-editor {
                min-height: 100%;
                margin: 0 auto;
            }

            .trumbowyg-box.trumbowyg-fullscreen {
                background: #fefefe;
                border: none !important;
            }

            .trumbowyg-editor-box,
            .trumbowyg-textarea {
                position: relative;
                box-sizing: border-box;
                padding: 20px;
                width: 100%;
                border-style: none;
                resize: none;
                outline: none;
                overflow: auto;
                user-select: text;
            }
            .trumbowyg-editor-box.trumbowyg-autogrow-on-enter,
            .trumbowyg-textarea.trumbowyg-autogrow-on-enter {
                transition: height 300ms ease-out;
            }

            .trumbowyg-editor-box {
                padding: 0;
            }

            .trumbowyg-editor {
                outline: none;
                padding: 20px;
            }

            .trumbowyg-box-blur .trumbowyg-editor *, .trumbowyg-box-blur .trumbowyg-editor::before {
                color: transparent !important;
                text-shadow: 0 0 7px #333;
            }
            @media screen and (min-width: 0 \0 ) {
                .trumbowyg-box-blur .trumbowyg-editor *, .trumbowyg-box-blur .trumbowyg-editor::before {
                    color: rgba(200, 200, 200, 0.6) !important;
                }
            }
            @supports (-ms-accelerator: true) {
                .trumbowyg-box-blur .trumbowyg-editor *, .trumbowyg-box-blur .trumbowyg-editor::before {
                    color: rgba(200, 200, 200, 0.6) !important;
                }
            }
            .trumbowyg-box-blur .trumbowyg-editor img,
            .trumbowyg-box-blur .trumbowyg-editor hr {
                opacity: 0.2;
            }

            .trumbowyg-textarea {
                position: relative;
                display: block;
                overflow: auto;
                border: none;
                font-size: 14px;
                font-family: "Consolas", "Courier", "Courier New", monospace;
                line-height: 18px;
            }

            .trumbowyg-box.trumbowyg-editor-visible .trumbowyg-textarea {
                height: 1px !important;
                width: 25%;
                min-height: 0 !important;
                padding: 0 !important;
                background: none;
                opacity: 0 !important;
            }

            .trumbowyg-box.trumbowyg-editor-hidden .trumbowyg-textarea {
                display: block;
                flex: 1;
                margin-bottom: 1px;
            }
            .trumbowyg-box.trumbowyg-editor-hidden .trumbowyg-editor-box {
                display: none;
            }

            .trumbowyg-box.trumbowyg-disabled .trumbowyg-textarea {
                opacity: 0.8;
                background: none;
            }

            .trumbowyg-editor-box[contenteditable=true]:empty:not(:focus)::before {
                content: attr(placeholder);
                color: #999;
                pointer-events: none;
                white-space: break-spaces;
            }

            .trumbowyg-button-pane {
                display: flex;
                flex-wrap: wrap;
                width: 100%;
                min-height: 36px;
                background: #ecf0f1;
                border-bottom: 1px solid #d7e0e2;
                margin: 0;
                padding: 0 5px;
                position: relative;
                list-style-type: none;
                line-height: 10px;
                backface-visibility: hidden;
                overflow: hidden;
                z-index: 11;
            }
            .trumbowyg-button-pane::before, .trumbowyg-button-pane::after {
                content: " ";
                display: block;
                position: absolute;
                top: 35px;
                left: 0;
                right: 0;
                width: 100%;
                height: 1px;
                background: #d7e0e2;
            }
            .trumbowyg-button-pane::after {
                top: 71px;
            }
            .trumbowyg-button-pane .trumbowyg-button-group {
                display: flex;
                flex-wrap: wrap;
            }
            .trumbowyg-button-pane .trumbowyg-button-group .trumbowyg-fullscreen-button svg {
                color: transparent;
            }
            .trumbowyg-button-pane .trumbowyg-button-group::after {
                content: " ";
                display: block;
                width: 1px;
                background: #d7e0e2;
                margin: 0 5px;
                height: 35px;
                vertical-align: top;
            }
            .trumbowyg-button-pane .trumbowyg-button-group:last-child::after {
                content: none;
            }
            .trumbowyg-button-pane button {
                display: block;
                position: relative;
                width: 35px;
                height: 35px;
                padding: 1px 6px !important;
                margin-bottom: 1px;
                overflow: hidden;
                border: none;
                cursor: pointer;
                background: none;
                vertical-align: middle;
                transition: background-color 150ms, opacity 150ms;
            }
            .trumbowyg-button-pane button.trumbowyg-textual-button {
                width: auto;
                line-height: 35px;
                user-select: none;
            }
            .trumbowyg-button-pane.trumbowyg-disable button:not(.trumbowyg-not-disable):not(.trumbowyg-active),
            .trumbowyg-button-pane button.trumbowyg-disable, .trumbowyg-disabled .trumbowyg-button-pane button:not(.trumbowyg-not-disable):not(.trumbowyg-viewHTML-button) {
                opacity: 0.2;
                cursor: default;
                pointer-events: none;
            }
            .trumbowyg-button-pane.trumbowyg-disable .trumbowyg-button-group::before, .trumbowyg-disabled .trumbowyg-button-pane .trumbowyg-button-group::before {
                background: #e3e9eb;
            }
            .trumbowyg-button-pane button:not(.trumbowyg-disable):hover,
            .trumbowyg-button-pane button:not(.trumbowyg-disable):focus,
            .trumbowyg-button-pane button.trumbowyg-active {
                background-color: #fff;
                outline: none;
            }
            .trumbowyg-button-pane .trumbowyg-open-dropdown::after {
                display: block;
                content: " ";
                position: absolute;
                top: 27px;
                right: 3px;
                height: 0;
                width: 0;
                border: 3px solid transparent;
                border-top-color: #555;
            }
            .trumbowyg-button-pane .trumbowyg-open-dropdown.trumbowyg-textual-button {
                padding-left: 10px !important;
                padding-right: 18px !important;
            }
            .trumbowyg-button-pane .trumbowyg-open-dropdown.trumbowyg-textual-button::after {
                top: 17px;
                right: 7px;
            }
            .trumbowyg-button-pane .trumbowyg-right {
                margin-left: auto;
            }

            .trumbowyg-dropdown {
                max-width: 300px;
                max-height: 250px;
                overflow-y: auto;
                overflow-x: hidden;
                white-space: nowrap;
                border: 1px solid #d7e0e2;
                padding: 5px 0;
                border-top: none;
                background: #fff;
                color: #222;
                margin-left: -1px;
                box-shadow: rgba(0, 0, 0, 0.1) 0 2px 3px;
                z-index: 12;
            }
            .trumbowyg-dropdown button {
                display: block;
                width: 100%;
                height: 35px;
                line-height: 35px;
                text-decoration: none;
                background: #fff;
                padding: 0 20px 0 10px;
                color: #222;
                border: none;
                cursor: pointer;
                text-align: left;
                font-size: 15px;
                transition: all 150ms;
            }
            .trumbowyg-dropdown button:hover, .trumbowyg-dropdown button:focus {
                background: #ecf0f1;
            }
            .trumbowyg-dropdown button svg {
                float: left;
                margin-right: 14px;
            }

            /* Modal box */
            .trumbowyg-modal {
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                max-width: 520px;
                width: 100%;
                height: 350px;
                z-index: 12;
                overflow: hidden;
                backface-visibility: hidden;
            }

            .trumbowyg-modal-box {
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                max-width: 500px;
                width: calc(100% - 20px);
                padding-bottom: 45px;
                z-index: 1;
                background-color: #fff;
                text-align: center;
                font-size: 14px;
                font-family: "Trebuchet MS", Helvetica, Verdana, sans-serif;
                box-shadow: rgba(0, 0, 0, 0.2) 0 2px 3px;
                backface-visibility: hidden;
            }
            .trumbowyg-modal-box .trumbowyg-modal-title {
                font-size: 24px;
                font-weight: bold;
                margin: 0 0 20px;
                padding: 15px 0 13px;
                display: block;
                border-bottom: 1px solid #d7e0e2;
            }
            .trumbowyg-modal-box .trumbowyg-progress {
                width: 100%;
                height: 3px;
                position: absolute;
                top: 58px;
            }
            .trumbowyg-modal-box .trumbowyg-progress .trumbowyg-progress-bar {
                background: #2BC06A;
                width: 0;
                height: 100%;
                transition: width 150ms linear;
            }
            .trumbowyg-modal-box .trumbowyg-input-row {
                position: relative;
                margin: 15px 12px;
                border: 1px solid #dedede;
                overflow: hidden;
            }
            .trumbowyg-modal-box .trumbowyg-input-infos {
                text-align: left;
                transition: all 150ms;
                width: 150px;
                border-right: 1px solid #dedede;
                padding: 0 7px;
                background-color: #fbfcfc;
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
            }
            .trumbowyg-modal-box .trumbowyg-input-infos label {
                color: #69878f;
                overflow: hidden;
                height: 27px;
                line-height: 27px;
            }
            .trumbowyg-modal-box .trumbowyg-input-infos label, .trumbowyg-modal-box .trumbowyg-input-infos label span {
                display: block;
                height: 27px;
                line-height: 27px;
                transition: all 150ms;
            }
            .trumbowyg-modal-box .trumbowyg-input-infos .trumbowyg-msg-error {
                color: #e74c3c;
            }
            .trumbowyg-modal-box .trumbowyg-input-html {
                padding: 1px 1px 1px 152px;
            }
            .trumbowyg-modal-box .trumbowyg-input-html, .trumbowyg-modal-box .trumbowyg-input-html input, .trumbowyg-modal-box .trumbowyg-input-html textarea, .trumbowyg-modal-box .trumbowyg-input-html select {
                font-size: 14px;
            }
            .trumbowyg-modal-box .trumbowyg-input-html input, .trumbowyg-modal-box .trumbowyg-input-html textarea, .trumbowyg-modal-box .trumbowyg-input-html select {
                transition: all 150ms;
                height: 27px;
                line-height: 27px;
                border: 0;
                width: 100%;
                padding: 0 7px;
            }
            .trumbowyg-modal-box .trumbowyg-input-html input:hover, .trumbowyg-modal-box .trumbowyg-input-html input:focus, .trumbowyg-modal-box .trumbowyg-input-html textarea:hover, .trumbowyg-modal-box .trumbowyg-input-html textarea:focus, .trumbowyg-modal-box .trumbowyg-input-html select:hover, .trumbowyg-modal-box .trumbowyg-input-html select:focus {
                outline: 1px solid #95a5a6;
            }
            .trumbowyg-modal-box .trumbowyg-input-html input:focus, .trumbowyg-modal-box .trumbowyg-input-html textarea:focus, .trumbowyg-modal-box .trumbowyg-input-html select:focus {
                background: #fbfcfc;
            }
            .trumbowyg-modal-box .trumbowyg-input-html input[type=checkbox] {
                width: 16px;
                height: 16px;
                padding: 0;
            }
            .trumbowyg-modal-box .trumbowyg-input-html-with-checkbox {
                text-align: left;
                padding: 3px 1px 1px 3px;
            }
            .trumbowyg-modal-box .trumbowyg-input-error input, .trumbowyg-modal-box .trumbowyg-input-error select, .trumbowyg-modal-box .trumbowyg-input-error textarea {
                outline: 1px solid #e74c3c;
            }
            .trumbowyg-modal-box .trumbowyg-input-error .trumbowyg-input-infos label span:first-child {
                margin-top: -27px;
            }
            .trumbowyg-modal-box .error {
                margin-top: 25px;
                display: block;
                color: red;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button {
                position: absolute;
                bottom: 10px;
                right: 0;
                text-decoration: none;
                color: #fff;
                display: block;
                width: 100px;
                height: 35px;
                line-height: 33px;
                margin: 0 10px;
                background-color: #333;
                border: none;
                cursor: pointer;
                font-family: "Trebuchet MS", Helvetica, Verdana, sans-serif;
                font-size: 16px;
                transition: all 150ms;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit {
                right: 110px;
                background: #2bc06a;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit:hover, .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit:focus {
                background: #40d47e;
                outline: none;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit:active {
                background: #25a25a;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset {
                color: #555;
                background: #e6e6e6;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset:hover, .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset:focus {
                background: #fbfbfb;
                outline: none;
            }
            .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset:active {
                background: #d5d5d5;
            }

            .trumbowyg-overlay {
                position: absolute;
                background-color: rgba(255, 255, 255, 0.5);
                height: 100%;
                width: 100%;
                left: 0;
                display: none;
                top: 0;
                z-index: 10;
            }

            /**
 * Fullscreen
 */
            body.trumbowyg-body-fullscreen {
                overflow: hidden;
            }

            .trumbowyg-fullscreen {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                z-index: 99999;
            }
            .trumbowyg-fullscreen.trumbowyg-box,
            .trumbowyg-fullscreen .trumbowyg-editor-box {
                border: none;
            }
            .trumbowyg-fullscreen .trumbowyg-editor-box,
            .trumbowyg-fullscreen .trumbowyg-textarea {
                height: auto !important;
                overflow: auto;
            }
            .trumbowyg-fullscreen .trumbowyg-overlay {
                height: 100% !important;
            }
            .trumbowyg-fullscreen .trumbowyg-button-group .trumbowyg-fullscreen-button svg {
                color: #222;
                fill: transparent;
            }

            .trumbowyg-editor {
                /*
   * For resetCss option
   */
            }
            .trumbowyg-editor object,
            .trumbowyg-editor embed,
            .trumbowyg-editor video,
            .trumbowyg-editor img {
                max-width: 100%;
            }
            .trumbowyg-editor video,
            .trumbowyg-editor img {
                height: auto;
            }
            .trumbowyg-editor img {
                cursor: move;
            }
            .trumbowyg-editor canvas:focus {
                outline: none;
            }
            .trumbowyg-editor.trumbowyg-reset-css {
                background: #fefefe !important;
                font-family: "Trebuchet MS", Helvetica, Verdana, sans-serif !important;
                font-size: 14px !important;
                line-height: 1.45em !important;
                color: #333 !important;
                font-weight: normal !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css a {
                color: #15c !important;
                text-decoration: underline !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css div,
            .trumbowyg-editor.trumbowyg-reset-css p,
            .trumbowyg-editor.trumbowyg-reset-css ul,
            .trumbowyg-editor.trumbowyg-reset-css ol,
            .trumbowyg-editor.trumbowyg-reset-css blockquote {
                box-shadow: none !important;
                background: none !important;
                margin: 0 !important;
                margin-bottom: 15px !important;
                line-height: 1.4em !important;
                font-family: "Trebuchet MS", Helvetica, Verdana, sans-serif !important;
                font-size: 14px !important;
                border: none !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css iframe,
            .trumbowyg-editor.trumbowyg-reset-css object,
            .trumbowyg-editor.trumbowyg-reset-css hr {
                margin-bottom: 15px !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css blockquote {
                margin-left: 32px !important;
                font-style: italic !important;
                color: #555 !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css ul {
                list-style: disc !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css ol {
                list-style: decimal !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css ul,
            .trumbowyg-editor.trumbowyg-reset-css ol {
                padding-left: 20px !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css ul ul,
            .trumbowyg-editor.trumbowyg-reset-css ol ol,
            .trumbowyg-editor.trumbowyg-reset-css ul ol,
            .trumbowyg-editor.trumbowyg-reset-css ol ul {
                border: none !important;
                margin: 2px !important;
                padding: 0 !important;
                padding-left: 24px !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css hr {
                display: block !important;
                height: 1px !important;
                border: none !important;
                border-top: 1px solid #CCC !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css h1,
            .trumbowyg-editor.trumbowyg-reset-css h2,
            .trumbowyg-editor.trumbowyg-reset-css h3,
            .trumbowyg-editor.trumbowyg-reset-css h4 {
                color: #111 !important;
                background: none !important;
                margin: 0 !important;
                padding: 0 !important;
                font-weight: bold !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css h1 {
                font-size: 32px !important;
                line-height: 38px !important;
                margin-bottom: 20px !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css h2 {
                font-size: 26px !important;
                line-height: 34px !important;
                margin-bottom: 15px !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css h3 {
                font-size: 22px !important;
                line-height: 28px !important;
                margin-bottom: 7px !important;
            }
            .trumbowyg-editor.trumbowyg-reset-css h4 {
                font-size: 16px !important;
                line-height: 22px !important;
                margin-bottom: 7px !important;
            }

            /*
 * Dark theme
 */
            .trumbowyg-dark .trumbowyg-textarea {
                background: #222;
                color: #fff;
                border-color: #343434;
            }
            .trumbowyg-dark .trumbowyg-box {
                border: 1px solid #343434;
            }
            .trumbowyg-dark .trumbowyg-box.trumbowyg-fullscreen {
                background: #111;
            }
            .trumbowyg-dark .trumbowyg-box.trumbowyg-box-blur .trumbowyg-editor *, .trumbowyg-dark .trumbowyg-box.trumbowyg-box-blur .trumbowyg-editor::before {
                text-shadow: 0 0 7px #ccc;
            }
            @media screen and (min-width: 0 \0 ) {
                .trumbowyg-dark .trumbowyg-box.trumbowyg-box-blur .trumbowyg-editor *, .trumbowyg-dark .trumbowyg-box.trumbowyg-box-blur .trumbowyg-editor::before {
                    color: rgba(20, 20, 20, 0.6) !important;
                }
            }
            @supports (-ms-accelerator: true) {
                .trumbowyg-dark .trumbowyg-box.trumbowyg-box-blur .trumbowyg-editor *, .trumbowyg-dark .trumbowyg-box.trumbowyg-box-blur .trumbowyg-editor::before {
                    color: rgba(20, 20, 20, 0.6) !important;
                }
            }
            .trumbowyg-dark .trumbowyg-box svg {
                fill: #fff;
                color: #fff;
            }
            .trumbowyg-dark .trumbowyg-button-pane {
                background-color: #222;
                border-bottom-color: #343434;
            }
            .trumbowyg-dark .trumbowyg-button-pane::before, .trumbowyg-dark .trumbowyg-button-pane::after {
                background: #343434;
            }
            .trumbowyg-dark .trumbowyg-button-pane .trumbowyg-button-group:not(:empty)::after {
                background-color: #343434;
            }
            .trumbowyg-dark .trumbowyg-button-pane .trumbowyg-button-group:not(:empty) .trumbowyg-fullscreen-button svg {
                color: transparent;
            }
            .trumbowyg-dark .trumbowyg-button-pane.trumbowyg-disable .trumbowyg-button-group::after {
                background-color: #2a2a2a;
            }
            .trumbowyg-dark .trumbowyg-button-pane button:not(.trumbowyg-disable):hover,
            .trumbowyg-dark .trumbowyg-button-pane button:not(.trumbowyg-disable):focus,
            .trumbowyg-dark .trumbowyg-button-pane button.trumbowyg-active {
                background-color: #333;
            }
            .trumbowyg-dark .trumbowyg-button-pane .trumbowyg-open-dropdown::after {
                border-top-color: #fff;
            }
            .trumbowyg-dark .trumbowyg-fullscreen .trumbowyg-button-pane .trumbowyg-button-group:not(:empty) .trumbowyg-fullscreen-button svg {
                color: #ecf0f1;
                fill: transparent;
            }
            .trumbowyg-dark .trumbowyg-dropdown {
                border-color: #343434;
                background: #333;
                box-shadow: rgba(0, 0, 0, 0.3) 0 2px 3px;
            }
            .trumbowyg-dark .trumbowyg-dropdown button {
                background: #333;
                color: #fff;
            }
            .trumbowyg-dark .trumbowyg-dropdown button:hover, .trumbowyg-dark .trumbowyg-dropdown button:focus {
                background: #222;
            }
            .trumbowyg-dark .trumbowyg-modal-box {
                background-color: #333;
                color: #fff;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-title {
                border-bottom: 1px solid #555;
                color: #fff;
                background: #3c3c3c;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-row {
                border-color: #222;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-infos {
                color: #eee;
                background-color: #2f2f2f;
                border-right-color: #222;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-infos span {
                color: #eee;
                background-color: #2f2f2f;
                border-color: #343434;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-infos span.trumbowyg-msg-error {
                color: #e74c3c;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-row.trumbowyg-input-error input,
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-row.trumbowyg-input-error select,
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-input-row.trumbowyg-input-error textarea {
                border-color: #e74c3c;
            }
            .trumbowyg-dark .trumbowyg-modal-box input,
            .trumbowyg-dark .trumbowyg-modal-box select,
            .trumbowyg-dark .trumbowyg-modal-box textarea {
                border-color: #343434;
                color: #fff;
                background: #222;
            }
            .trumbowyg-dark .trumbowyg-modal-box input:hover, .trumbowyg-dark .trumbowyg-modal-box input:focus,
            .trumbowyg-dark .trumbowyg-modal-box select:hover,
            .trumbowyg-dark .trumbowyg-modal-box select:focus,
            .trumbowyg-dark .trumbowyg-modal-box textarea:hover,
            .trumbowyg-dark .trumbowyg-modal-box textarea:focus {
                border-color: #626262;
            }
            .trumbowyg-dark .trumbowyg-modal-box input:focus,
            .trumbowyg-dark .trumbowyg-modal-box select:focus,
            .trumbowyg-dark .trumbowyg-modal-box textarea:focus {
                background-color: #2f2f2f;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit {
                background: #1b7943;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit:hover, .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit:focus {
                background: #25a25a;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-submit:active {
                background: #176437;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset {
                background: #333;
                color: #ccc;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset:hover, .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset:focus {
                background: #444;
            }
            .trumbowyg-dark .trumbowyg-modal-box .trumbowyg-modal-button.trumbowyg-modal-reset:active {
                background: #111;
            }
            .trumbowyg-dark .trumbowyg-overlay {
                background-color: rgba(15, 15, 15, 0.6);
            }

            .trumbowyg-box {
                z-index: 0;
                border-radius: 5px;
            }
            .trumbowyg-box .trumbowyg-editor {
                min-height: 26.1rem;
            }

            .trumbowyg-dark .trumbowyg-box {
                border: 1px solid #96A2B4;
            }
            .trumbowyg-dark .trumbowyg-box svg {
                fill: #96A2B4;
                color: #96A2B4;
            }
            .trumbowyg-dark .trumbowyg-button-pane {
                background-color: #1A202E;
                border-bottom-color: #96A2B4;
            }
            .trumbowyg-dark .trumbowyg-button-pane button:not(.trumbowyg-disable):hover,
            .trumbowyg-dark .trumbowyg-button-pane button:not(.trumbowyg-disable):focus,
            .trumbowyg-dark .trumbowyg-button-pane button.trumbowyg-active {
                background-color: #111620;
            }
            .trumbowyg-dark .trumbowyg-dropdown {
                border-color: #1A202E;
                background: #1A202E;
            }
            .trumbowyg-dark .trumbowyg-dropdown button {
                background: #1A202E;
            }

            /* Custom CSS */

            .FooterPage .RowFooter{
                display: flex;
                justify-content: space-between;
                align-content: center;
            }

            /*# sourceMappingURL=Style.css.map */

        </style>
    </head>

    <body>
        <div id="Wrapper">
            {{--  Main Content  --}}
            <main class="MainContent">
                <section class="MainContent__Section MainContent__Section--Print">
                    <div class="PrintPage">
                        <div class="PrintPage__Content">
                            <div class="Container--MainContent">
                                <div class="Row">
                                    <div class="Col">
                                        <div class="Card">
                                            <div class="PrintPage__CompanyInfo">
                                                <div class="ImageCompany">
                                                    <img src="{{asset("System/Assets/Images/Logo.png")}}"
                                                         alt="Company Image" />
                                                </div>
                                                <div class="DescriptionCompany">
                                                    <div class="Text">
                                                        <div class="CompanyName">Company : ERP Epic</div>
                                                        <div class="Address">Address : Damascus</div>
                                                        <div class="Telephone">Tel : 123123123</div>
                                                        <div class="Email">Email : Amir@Amir.com</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Col">
                                        <div class="Card">
                                            <div class="Card__Inner">
                                                <div class="ListData NotResponsive ListData--CustomPrint">
                                                    <div class="ListData__Head">
                                                        <h4 class="ListData__Title">
                                                            Main Information
                                                        </h4>
                                                    </div>
                                                    <div class="PrintPage__Data">
                                                        <div class="ListData__Item ListData__Item--NoAction">
                                                            <div class="Data_Col">
                                                                <span class="Data_Label">
                                                                    Name 1
                                                                </span>
                                                                <span class="Data_Value">
                                                                        Value 1
                                                                </span>
                                                            </div>
                                                            <div class="Data_Col Data_Col--End">
                                                                <i class="material-icons">
                                                                    verified
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div class="ListData__Item ListData__Item--NoAction">
                                                            <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                Name 1
                                                            </span>
                                                                <span class="Data_Value">
                                                                    Value 1
                                                            </span>
                                                            </div>
                                                            <div class="Data_Col Data_Col--End">
                                                                <i class="material-icons">
                                                                    verified
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div class="ListData__Item ListData__Item--NoAction">
                                                            <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                Name 1
                                                            </span>
                                                                <span class="Data_Value">
                                                                    Value 1
                                                            </span>
                                                            </div>
                                                            <div class="Data_Col Data_Col--End">
                                                                <i class="material-icons">
                                                                    verified
                                                                </i>
                                                            </div>
                                                        </div>
                                                        <div class="ListData__Item ListData__Item--NoAction">
                                                            <div class="Data_Col">
                                                            <span class="Data_Label">
                                                                Name 1
                                                            </span>
                                                                <span class="Data_Value">
                                                                    Value 1
                                                            </span>
                                                            </div>
                                                            <div class="Data_Col Data_Col--End">
                                                                <i class="material-icons">
                                                                    verified
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Col">
                                        <div class="Card">
                                            <div class="Card__Inner">
                                                <div class="ListData NotResponsive ListData--CustomPrint">
                                                    <div class="ListData__Head">
                                                        <h4 class="ListData__Title">
                                                            Decision Content
                                                        </h4>
                                                    </div>
                                                    <div class="PrintPage__Data">
                                                        <div class="PrintPage__TextEditorContent">
                                                            <div class="TextEditorContent">
                                                                <div class="TextEditorContent__Content">
                                                                    <div class="Card Content">
                                                                        <div class="Card__Inner">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur
                                                                                adipisicing elit. Aliquid animi aut
                                                                                autem, delectus dolorum eaque eligendi
                                                                                eos et facilis fugit magnam numquam
                                                                                perferendis perspiciatis provident quam
                                                                                quos saepe tempora voluptas.</p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            {{--  Footer  --}}
            <footer class="FooterPage FooterPage--Print">
                <div class="FooterPage__Wrap">
                    <div class="Container--MainContent">
                        <div class="FooterPage__Content">
                            <div class="RowFooter">
                                <div class="FooterPage__CopyRight">
                                    Copyright © 2022
                                </div>
                                <div class="FooterPage__Links">
                                    Designed by <span class="SystemName"> ERP Epic </span> All rights reserved
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>

</html>
