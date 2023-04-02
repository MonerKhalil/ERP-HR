<!doctype html>
<html lang="en" dir="ltr">
{{--<html lang="ar" dir="rtl">--}}

    <head>
        @include('System.Layouts.head.head')
    </head>

    <body>
        <div id="Wrapper">
            @yield("MainContent")
        </div>
            {{-- Scripts --}}
            @include("System.Layouts.Footer.footerScript")
    </body>

</html>
